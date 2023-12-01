<?php
session_start();

// Проверяем, был ли выполнен выход (logout)
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    // Уничтожаем сессию
    session_destroy();
    // Перенаправляем пользователя на главную страницу
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>АРТСПЕКТР | Главная</title>
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
            <a href="index.html">
                <img src="../assets/images/logotype.svg">
            </a>
        </div>
    </header>

    <?php include 'includes/header.php'; ?>

    <section class="popularity">
        <div class="container">
            <h1 class="title">Популярное в этом месяце</h1>
            <div class="popularity__wrapper">
                <div class="popularity_row">
                    <a href="#" class="popularity_item">
                        <img src="">
                        <h2 class="popularity_item-author">Фредерик Мальпоне</h2>
                        <div class="popularity_item-bottom">
                            <span class="popularity_item-title">Лунная соната</span>
                            <span class="popularity_item-location">Россия</span>
                        </div>
                    </a>

                    <a href="#" class="popularity_item popularity_item--long">
                        <img src="">
                        <h2 class="popularity_item-author">Фредерик Мальпоне</h2>
                        <div class="popularity_item-bottom">
                            <span class="popularity_item-title">Лунная соната</span>
                            <span class="popularity_item-location">Россия</span>
                        </div>
                    </a>
                </div>

                <div class="popularity_row">
                    <a href="#" class="popularity_item popularity_item--long">
                        <img src="">
                        <h2 class="popularity_item-author">Фредерик Мальпоне</h2>
                        <div class="popularity_item-bottom">
                            <span class="popularity_item-title">Лунная соната</span>
                            <span class="popularity_item-location">Россия</span>
                        </div>
                    </a>

                    <a href="#" class="popularity_item">
                        <img src="">
                        <h2 class="popularity_item-author">Фредерик Мальпоне</h2>
                        <div class="popularity_item-bottom">
                            <span class="popularity_item-title">Лунная соната</span>
                            <span class="popularity_item-location">Россия</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="artists">
        <div class="container">
            <h1 class="title">Художники</h1>
            <div class="artists__wrapper">
                <div class="artist">
                    <img src="" alt="artist" class="artist_ava">
                    <h3 class="artists_name">Эль Пачино</h3>
                </div>

                <div class="artist">
                    <img src="" alt="artist" class="artist_ava">
                    <h3 class="artists_name">Люка Весна</h3>
                </div>

                <div class="artist">
                    <img src="" alt="artist" class="artist_ava">
                    <h3 class="artists_name">Иван Русский</h3>
                </div>

                <div class="artist">
                    <img src="" alt="artist" class="artist_ava">
                    <h3 class="artists_name">Пачка сигарет</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="because">
        <div class="container">
            <h1 class="title">Потому что</h1>
            <div class="because__wrapper">
                <div class="because_item">
                    <h2 class="because_item-title because_item-title--like">Любимые работы!</h2>
                    <p class="because_item-description">
                        Поиск по похожим изображениям и умным фильтрам
                    </p>
                </div>

                <div class="because_item">
                    <h2 class="because_item-title because_item-title--choose">Эксклюзивный выбор</h2>
                    <p class="because_item-description">
                        Коллекции от экспертов арт-рынка
                    </p>
                </div>

                <div class="because_item">
                    <h2 class="because_item-title because_item-title--geo">Геолокация по городу</h2>
                    <p class="because_item-description">
                        Найдите близких вам художников!
                    </p>
                </div>

                <div class="because_item">
                    <h2 class="because_item-title because_item-title--dostup">Международный доступ</h2>
                    <p class="because_item-description">
                        Подтвержденные и начинающие художники из 193 стран
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="theme">
        <div class="container">
            <h1 class="title">Темы месяца</h1>
            <div class="theme__wrapper">
                <a class="theme_block" href="#">
                    <h2 class="theme_name">Реализм</h2>
                </a>

                <a href="#" class="theme_block block-2">
                    <h2 class="theme_name">Америка</h2>
                </a>

                <a href="#" class="theme_block block-3">
                    <h2 class="theme_name">Насекомые</h2>
                </a>

                <a href="#" class="theme_block block-4">
                    <h2 class="theme_name">Лето</h2>
                </a>
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