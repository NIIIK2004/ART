<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>АРТСПЕКТР | Контакты</title>
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

    <section class="gallery">
        <div class="container">
            <span class="title">Контакты</span>
            <p class="logotype-text">АРТСПЕКТР</p>

            <div class="address">
                <ul>
                    <li>Г.Белореченск, Ул Чапаева, д.69</li>
                    <li>+7-(995)-182-65-65</li>
                    <li>pochta@gmail.com</li>
                    <li>ПН-ПТ с 8:00 до 12:50</li>
                </ul>
                <ul>
                    <li>Г.Москва, Ул Космонавтов, д.56</li>
                    <li>+7-(900)-456-65-45</li>
                    <li>pochta4@gmail.com</li>
                    <li>ПН-ПТ с 8:00 до 12:50</li>
                </ul>
                <ul>
                    <li>Г.Краснодар, Ул Ленина, д.23</li>
                    <li>+7-(918)-455-12-65</li>
                    <li>pochta3@gmail.com</li>
                    <li>ПН-ПТ с 8:00 до 12:50</li>
                </ul>
            </div>

            <img src="/" alt="Картинка">
            <form action="#" class="contacts-forms">
                <h1 class="title">По поводу покупки</h1>
                <div class="contacts-forms-wrapper">
                    <div class="contacts-forms-inputs">
                        <div class="contacts-forms-input">
                            <label for="name">Ваше имя</label>
                            <input type="text" id="name" name="name" placeholder="Введите свое имя">
                        </div>

                        <div class="contacts-forms-input">
                            <label for="email">Email</label>
                            <input type="text" id="name" name="email" placeholder="Введите свою почту">
                        </div>

                        <div class="contacts-forms-input">
                            <label for="number">Телефон</label>
                            <input type="text" id="name" name="number" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <div class="contacts-forms-input">
                        <label for="text">Сообщение (Если вы хотите приобрести картину указывайте обязательно ее идентификатор)</label>
                        <textarea name="text" id="text" placeholder="Привет! хочу приобрести у вас картину вот ее ID (123 456 798 0)"></textarea>
                    </div>
                </div>
                <button class="contacts-forms-btn">Отправить</button>
            </form>
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