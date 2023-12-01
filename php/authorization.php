<?php
session_start();
require_once('includes/db.php');

if (isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['auth'])) {

// проверяем наличие пользователя с указанным юзернеймом
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `login` = :login");
$stmt->execute(['login' => $_POST['login']]);
if (!$stmt->rowCount()) {
    flash('Пароль или логин неверен');
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die;
}
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// проверяем пароль
if (password_verify($_POST['password'], $user['password'])) {
    if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
        $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = pdo()->prepare('UPDATE `users` SET `password` = :password WHERE `login` = :login');
        $stmt->execute([
            'login' => $_POST['login'],
            'password' => $newHash,
        ]);
    }
    $_SESSION['user_id'] = $user['id'];
    header('Location: profile.php');
    die;
}

flash('Пароль или логин неверен');

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
<body class="body body--auth">
<main>
    <header class="header">
        <div class="container">
            <a href="index.html">
                <img src="../assets/images/logotype-for-aboutme.svg">
            </a>
        </div>
    </header>
    <section class="auth">
        <div class="container">
            <div class="auth__inner">
                <h2 class="auth__title">Авторизация</h2>
                <form action="" method="post" class="auth__form">
                    <?php flash(); ?>
                    <ul class="auth__list">
                        <li class="auth__item">
                            <label class="label" for="login">Логин</label>
                            <input class="field" type="text" id="login" name="login" required
                                   placeholder="Введите логин">
                        </li>
                        <li class="auth__item">
                            <label class="label" for="password">Пароль</label>
                            <input class="field" type="password" id="password" required name="password"
                                   placeholder="Введите пароль">
                        </li>
                    </ul>
                    <p class="auth__text">
                        У вас нет аккаунта? Тогда <a href="registration.php">зарегистрируйтесь</a>
                    </p>
                    <button class="btn" id="auth-button" type="submit" name="auth">Войти</button>
                </form>
            </div>
        </div>
    </section>
</main>
