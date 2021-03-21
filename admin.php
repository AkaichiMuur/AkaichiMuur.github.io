<?php

session_start();
require_once "connection.php";

if (empty($_SESSION['username'])) {
    header('Location: auth.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title> Администратор - Сделаем лучше вместе!</title>
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
                <p class="username"> Панель администратора: ADMIN</p>
            </div>
            <div class="box_user_2">
                <form method="POST" action="logout.php" class="box_submit">
                    <input type="submit" class="auth" value="ВЫХОД"> 
                </form>
            </div>
        </div>

        <div class="main_box_user_1">
            <div class="cont_user">
                <div class="box_user_3"></div>
                <div class="box_user_4">
                    <a href="#" class="new_appl"> Управление категориями </a>
                </div>
            </div>

            <div class="box_user_5">

                <div class="box_4">
                    <div class="pic"></div>

                    <div class="info">
                        <a class="name"> Название заявки </a>
                        <div class="data_from">
                            <p class="data"> Дата </p>
                            <p class="from"> От кого </p>
                        </div>
                        <p class="text"> Описание заявки "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque."</p>
                    </div>

                    <div class="buttons">
                        <p class="but_stat"> Сменить статус на: </p>
                        <input type="button" class="reject_solve" value="ОТКЛОНЕНА">
                        <input type="button" class="reject_solve" value="РЕШЕНА">
                    </div>

                    <div class="buttons">
                        <p class="but_stat"> Загрузить изображение "после": </p>
                        <input type="file" accept="image/*" class="insert_pic">
                        <input type="submit" value="ОТПРАВИТЬ ИЗОБРАЖЕНИЕ" class="submit_pic">
                    </div>
                </div>

                <div class="box_4">
                        <div class="pic"></div>

                        <div class="info">
                            <a class="name"> Название заявки </a>
                            <div class="data_from">
                                <p class="data"> Дата </p>
                                <p class="from"> От кого </p>
                            </div>
                            <p class="text"> Описание заявки "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque."</p>
                        </div>

                        <div class="buttons">
                            <!-- ЕСЛИ СТАТУС УЖЕ ПРИСВОЕН, ТО МЕНЯЕТСЯ КЛАСС СSS КНОПКИ И ОНА СТАНОВИТСЯ ЧЕРНОЙ, и если статус уже присвоен, то смена статуса недоступна, вторая кнопка не появляется. НАЧАЛЬНЫЙ СТАТУС: НОВАЯ -->
                            <p class="but_stat"> Сменить статус на: </p>
                            <input type="submit" class="reject_solve" value="ОТКЛОНЕНА">
                            <input type="submit" class="reject_solve" value="РЕШЕНА">

                            <input type="submit" class="reject_solve_black" value="ОТКЛОНЕНА">
                            <input type="submit" class="reject_solve_black" value="РЕШЕНА">
                        </div>

                        <div class="buttons">
                            <p class="but_stat"> Загрузить изображение "после": </p>
                            <input type="file" accept="image/*" class="insert_pic">
                            <input type="submit" value="ОТПРАВИТЬ ИЗОБРАЖЕНИЕ" class="submit_pic">
                        </div>
                </div>

            </div>
        </div>

        
    </main>

</body>
</html>