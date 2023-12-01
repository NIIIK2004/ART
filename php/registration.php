<?php
require_once 'includes/db.php';
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];


    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $insertQuery = "INSERT INTO users (name, email, login, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param('ssss', $name, $email, $login, $hashedPassword);
    if ($stmt->execute()) {
        $_SESSION["user_id"] = $stmt->insert_id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_login'] = $login;
        header("Location: index.php");
        exit();
    }
}

$conn->close();
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
            <a href="index.php">
                <img src="../assets/images/logotype-for-aboutme.svg">
            </a>
        </div>
    </header>
    <section class="auth">
        <div class="container">
            <div class="auth__inner">
                <h2 class="auth__title">Регистрация</h2>
                <form class="auth__form" method="post" action="">
                    <ul class="auth__list">
                        <li class="auth__item">
                            <label class="label" for="name">Имя</label>
                            <input class="field" type="text" id="name" name="name" required placeholder="Введите имя">
                        </li>
                        <li class="auth__item">
                            <label class="label" for="email">Почта</label>
                            <input class="field" type="email" id="email" name="email" required
                                   placeholder="Введите почту">
                        </li>
                        <li class="auth__item">
                            <label class="label" for="login">Логин</label>
                            <span class="error">Логин не должен содержать кириллицу</span>
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
                        Уже существует аккаунт? Тогда <a href="authorization.php">авторизуйтесь</a>
                    </p>
                    <button class="btn" type="submit">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
</html>