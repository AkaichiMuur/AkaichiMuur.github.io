<?php

require_once "connection.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Сделаем лучше вместе!</title>
</head>
<body>
    <header>
        <a href="main.php"><img class="logo" src="logo.png"></a>
        <div class="logs">
            <p class="log_1"> Сделаем лучше вместе! </p>
            <p class="log_2"> портал добрых дел </p>
        </div>
    </header>

    <main>
        <div class="main_box_1">
            <div class="box_user_1">
                <p class="username">USERNAME</p>
            </div>
            <div class="box_user_2">
                <a href="main.php" class="auth"> ВЫХОД </a>
            </div>
        </div>

        <div class="main_box_user_1">
            <div class="cont_user">
                <div class="box_user_3">
                    <a href="#" class="sort"> Новые </a>
                    <a href="#" class="sort"> Решенные </a>
                    <a href="#" class="sort"> Отклоненные </a>
                </div>
                <div class="box_user_4">
                    <a href="#" class="new_appl"> Создать заявку </a>
                </div>
            </div>

            <div class="box_user_5">
                <div class="box_4">
                    <p class="status"> РЕШЕНА </p>
                    <div class="info">
                        <a class="name"> Название заявки </a>
                        <div class="data_from">
                            <p class="data"> Дата </p>
                            <p class="from"> От кого </p>
                        </div>
                        <p class="text"> Описание заявки "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque."</p>
                    </div>
                </div>

                <div class="box_4">
                    <p class="status"> ОТКЛОНЕНА </p>
                    <div class="info">
                        <a class="name"> Название заявки </a>
                        <div class="data_from">
                            <p class="data"> Дата </p>
                            <p class="from"> От кого </p>
                        </div>
                        <p class="text"> Описание заявки "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque."</p>
                    </div>
                </div>
            </div>
        </div>

        
    </main>

    <footer>
        <p class="let_7"> Свяжитесь с нами </p>
        <p class="let_8"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam omnis reprehenderit illo voluptatum laudantium libero laboriosam hic adipisci. </p>
        <div class="conts">
            <div class="cont">
                <img src="styles/pl.png" class="mini_pic">
                <p class="let_9"> Москва, ул. Новый Арбат, д.34, ст.1 </p>
            </div>
            <div class="cont">
                <img src="styles/tel.png" class="mini_pic">
                <p class="let_9"> Тел.: 88005553535 </p>
            </div>
            <div class="cont">
                <img src="styles/email.png" class="mini_pic">
                <p class="let_9"> E-mail: name@gmail.com </p>
            </div>
        </div>
    </footer>
</body>
</html>