<?php
require_once('includes/db.php');
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: authorization.php");
    exit();
}

$user_id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = $_POST['new_name'];
    $new_email = $_POST['new_email'];
    $new_login = $_POST['new_login'];

    // Обработка новой аватарки
    if ($_FILES['new_avatar']['error'] === UPLOAD_ERR_OK) {
        $avatar_tmp_name = $_FILES['new_avatar']['tmp_name'];
        $avatar_name = uniqid('avatar_') . '_' . basename($_FILES['new_avatar']['name']);
        $avatar_path = '../uploads/' . $avatar_name;

        move_uploaded_file($avatar_tmp_name, $avatar_path);

        if (file_exists($avatar_path)) {
            echo "Файл успешно перемещен в: " . $avatar_path;
        } else {
            echo "Не удалось переместить файл в: " . $avatar_path;
        }

        // Сохранение пути к новой аватарке в базе данных
        $updateQuery = "UPDATE users SET name = ?, email = ?, login = ?, avatar = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param('ssssi', $new_name, $new_email, $new_login, $avatar_path, $user_id);
    } else {
        // Если пользователь не загрузил новую аватарку
        $updateQuery = "UPDATE users SET name = ?, email = ?, login = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param('sssi', $new_name, $new_email, $new_login, $user_id);
    }

    if ($stmt->execute()) {
        $_SESSION['user_avatar'] = $avatar_path;
        header("Location: profile.php");
        exit();
    } else {
        echo json_encode(['status' => 'error']);
    }
    exit();
}

$stmt->close();
$conn->close();

// Получаем старый путь к аватарке пользователя
$selectOldAvatarQuery = "SELECT avatar FROM users WHERE id = ?";
$stmtOldAvatar = $conn->prepare($selectOldAvatarQuery);
$stmtOldAvatar->bind_param("i", $user_id);
$stmtOldAvatar->execute();
$resultOldAvatar = $stmtOldAvatar->get_result();

if ($resultOldAvatar->num_rows > 0) {
    $oldAvatar = $resultOldAvatar->fetch_assoc()['avatar'];

    // Удаляем старую аватарку
    if (!empty($oldAvatar) && file_exists($oldAvatar) && is_file($oldAvatar)) {
        if (unlink($oldAvatar)) {
            echo "Старая аватарка успешно удалена: " . $oldAvatar;
        } else {
            echo "Не удалось удалить старую аватарку: " . $oldAvatar;
        }
    } else {
        echo "Старая аватарка не существует или не является файлом: " . $oldAvatar;
    }
} else {
    echo "Не удалось получить старый путь к аватарке";
}

$stmtOldAvatar->close();

