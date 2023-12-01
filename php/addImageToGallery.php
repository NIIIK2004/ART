<?php
session_start();

require_once('includes/db.php');

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    echo "Ошибка подключения к базе данных: " . $mysqli->connect_error;
    exit();
}

$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_picture'])) {

    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $country = $_POST['country'];
    $academic_drawing = $_POST['academic_drawing'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    // Обработка загрузки изображения
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_path = '../uploads/' . $image_name;

        if (move_uploaded_file($image_tmp_name, $image_path)) {
            $stmt = $mysqli->prepare("INSERT INTO pictures (title, artist, genre, country, academic_drawing, year, price, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssds", $title, $artist, $genre, $country, $academic_drawing, $year, $price, $image_path);

            if ($stmt->execute()) {
                echo "Картина успешно добавлена.";
            } else {
                echo "Ошибка при сохранении данных в базу данных.";
            }

            $stmt->close();
        } else {
            echo "Ошибка при сохранении изображения.";
        }
    }
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Название картины">
    <input type="file" name="image" accept="image/*">
    <input type="text" name="artist" placeholder="Художник">
    <input type="text" name="genre" placeholder="Жанр">
    <input type="text" name="country" placeholder="Страна">
    <input type="text" name="academic_drawing" placeholder="Академический рисунок">
    <input type="text" name="year" placeholder="Год">
    <input type="text" name="price" placeholder="Цена">
    <button type="submit" name="add_picture">Добавить</button>
</form>
