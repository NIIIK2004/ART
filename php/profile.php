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
    <title>АРТСПЕКТР | Профиль</title>
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

    <section class="profile">
        <div class="container">
            <div class="profile__wrapper">
                <h1 class="title" style="text-align: center">Мой профиль</h1>
                <div class="profile__tools">
                    <a href="edit-profile.php" class="profile__tools-editprofile">Редактировать</a>
                    <img class="profile__tools-ava"
                         src="<?php echo !empty($_SESSION['user_avatar']) ? $_SESSION['user_avatar'] : '../assets/images/avatar.jpg' ?>"
                         alt="Аватар пользователя">
                    <a href="logout.php" class="profile__tools-logoutprofile">Выйти из аккаунта</a>
                </div>
                <h2 class="profile__name"><?php echo $user['name']; ?></h2>
                <h3 class="profile__email"><?php echo $user['email']; ?></h3>
                <div class="profile__panel">
                    <div class="profile__panel-block">
                        <span class="profile__panel-block-title">
                            Мои избранные (15)
                        </span>
                    </div>

                    <div class="profile__panel-block">
                        <span class="profile__panel-block-title">
                           Мои покупки (0)
                        </span>
                    </div>

                    <div class="profile__panel-block">
                        <span class="profile__panel-block-title">
                           Любимые Художники (скоро)
                        </span>
                    </div>

                    <div class="profile__panel-block">
                        <span class="profile__panel-block-title">
                          Добавить свои работы (скоро)
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>