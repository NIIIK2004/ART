<?php
require_once('includes/db.php');
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: authorization.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$selectQuery = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($selectQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    header("Location: error_page.php");
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>АРТСПЕКТР | Редактирование профиля</title>
    <link rel="icon" href="../assets/images/icons/favicon.svg" type="images/x-icon">
    <link rel="shortcut icon" href="../assets/images/icons/favicon.svg" type="images/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:wght@100;200;300;400;500;600&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="body">
<main>
    <section class="edit-profile">
        <div class="container">
            <div class="edit-profile__wrapper">
                <h1 class="title" style="text-align: center">Редактирование профиля</h1>
                <form method="post" action="update-profile.php" enctype="multipart/form-data">
                    <div class="edit-pr-wrapper">
                        <div class="edit-pr-block">
                            <label for="new_name">Новое имя:</label>
                            <input type="text" id="new_name" name="new_name" value="<?php echo $user['name']; ?>"
                                   required>
                        </div>
                        <div class="edit-pr-block">

                            <label for="new_email">Новая почта:</label>
                            <input type="email" id="new_email" name="new_email" value="<?php echo $user['email']; ?>"
                                   required>
                        </div>
                        <div class="edit-pr-block">
                            <label for="new_login">Новый логин:</label>
                            <input type="text" id="new_login" name="new_login" value="<?php echo $user['login']; ?>"
                                   required>
                        </div>

                        <div class="edit-pr-block">
                            <label for="new_avatar">Выберите новую аватарку:</label>
                            <input type="file" id="new_avatar" name="new_avatar" accept="image/*">
                        </div>

                    </div>
                    <button type="submit" class="edit-pr-bnt">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=""></script>
</html>