<div class="navigation">
    <ul>
        <li><a href="index.php">Главная</a></li>
        <li><a href="galery.php">Галерея</a></li>
        <li><a href="aboutme.php">О нас</a></li>
        <?php
        // Проверяем, установлена ли переменная сессии, обозначающая аутентификацию
        if (isset($_SESSION['user_id'])) {
            echo '<li><a href="profile.php">Профиль</a></li>';
        } else {
            echo '<li><a href="authorization.php">Войти</a></li>';
        }
        ?>
        <li><a href="contacts.php">Контакты</a></li>
    </ul>
</div>
