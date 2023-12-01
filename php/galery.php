<?php
require_once('includes/db.php');
session_start();
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

$query = "SELECT * FROM pictures";
$result = $conn->query($query);
$pictures = $result->fetch_all(MYSQLI_ASSOC);
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
<header class="header">
    <div class="container">

    </div>
</header>
<main>
    <header class="header">
        <div class="container">
            <a href="index.php">
                <img src="../assets/images/logotype.svg">
            </a>
        </div>
    </header>

    <section class="gallery">
        <div class="container">
            <h2 class="title">Галерея</h2>
            <!--            --><?php //if ($is_admin): ?>
            <form method="post">
                <a href="addImageToGallery.php" type="submit" name="add_picture">Добавить картину</a>
            </form>
            <!--            --><?php //endif; ?>

            <div class="gallery__wrapper">
                <?php foreach ($pictures as $picture): ?>
                    <a href="galery-details.php?id=<?php echo $picture['id']; ?>">
                        <div class="gallery-block">
                            <img src="<?php echo $picture['image_path']; ?>" alt="<?php echo $picture['title']; ?>">
                            <h2 class="gallery-block-name"><?php echo $picture['title']; ?></h2>
                            <span class="gallery-block-year"><?php echo $picture['year']; ?> Год</span>
                        </div>
                    </a>
                <?php endforeach; ?>
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