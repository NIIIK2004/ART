<?php
require_once('includes/db.php');
session_start();
// Получение идентификатора картинки из параметров запроса
$id = $_GET['id'];

// Создаем подключение к базе данных
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Проверяем, удалось ли подключиться к базе данных
if ($mysqli->connect_errno) {
    echo "Ошибка подключения к базе данных: " . $mysqli->connect_error;
    exit();
}

// Получаем информацию о картине из базы данных
$stmt = $mysqli->prepare("SELECT * FROM pictures WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$picture = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>АРТСПЕКТР | Галерея</title>
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
    <header class="header">
        <div class="container">
            <a href="index.php">
                <img src="../assets/images/logotype.svg">
            </a>
        </div>
    </header>

    <section class="gallery-details">

        <div class="container">
            <div class="gallery-details-title">
                <h1 class="title"><?php echo $picture['title']; ?></h1>
                <a href="#" class="gallery-details-back">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M12.9428 8.39052C13.4635 8.91122 13.4635 9.75544 12.9428 10.2761L7.21895 16L12.9428 21.7239C13.4635 22.2446 13.4635 23.0888 12.9428 23.6095C12.4221 24.1302 11.5779 24.1302 11.0572 23.6095L4.39052 16.9428C3.86983 16.4221 3.86983 15.5779 4.39052 15.0572L11.0572 8.39052C11.5779 7.86983 12.4221 7.86983 12.9428 8.39052Z"
                              fill="black"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M4 16.0001C4 15.2637 4.59695 14.6667 5.33333 14.6667H21.3333C23.1014 14.6667 24.7971 15.3691 26.0474 16.6194C27.2976 17.8696 28 19.5653 28 21.3334V24.0001C28 24.7365 27.403 25.3334 26.6667 25.3334C25.9303 25.3334 25.3333 24.7365 25.3333 24.0001V21.3334C25.3333 20.2725 24.9119 19.2551 24.1618 18.505C23.4116 17.7548 22.3942 17.3334 21.3333 17.3334H5.33333C4.59695 17.3334 4 16.7365 4 16.0001Z"
                              fill="black"/>
                    </svg>
                </a>
            </div>
            <div class="gallery-details-wrapper">
                <div class="gallery-details-picture">
                    <img src="https://new-science.ru/wp-content/uploads/2019/04/99848-2.jpg"
                         alt="Искусство в большом виде" width="700" height="700">
                </div>
                <div class="gallery-details-info">
                    <h2 class="gallery-details-info-title"><?php echo $picture['title']; ?></h2>
                    <p class="gallery-details-info-description"><?php echo $picture['description']; ?></p>
                    <ul class="gallery-details-info-list">
                        <li>Художники: <?php echo $picture['artist']; ?></li>
                        <li>Жанр: <?php echo $picture['genre']; ?></li>
                        <li>Страна: <?php echo $picture['country']; ?></li>
                        <li>Академический рисунок: <?php echo $picture['academic_drawing']; ?></li>
                        <li>Год выпуска: <?php echo $picture['year']; ?></li>
                        <li>Приблизительная цена: <?php echo $picture['price']; ?></li>
                    </ul>
                    <div class="gallery-details-info-btns">
                        <button class="gallery-details-info-btn-like">В избранное</button>
                        <button class="gallery-details-info-btn-basket">Хочу приобрести</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <div class="line"></div>
        <div class="container">
            <div class="footer__wrapper">
                <span>© 2023 АРТСПЕКТР™</span>
            </div>
        </div>
    </section>
</main>
<script src="../assets/js/main.js"></script>
</body>

</html>