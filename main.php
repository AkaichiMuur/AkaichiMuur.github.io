<?php

session_start();
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
            <div class="box_1">
                <p class="let_1"> ДОБРЫХ ДЕЛ СДЕЛАНО </p>
                <p class="let_2"> 755 </p>
            </div>

            <div class="box_2">

            <?php

                $SESSIONname = $_SESSION['username'];

                $query_role = "SELECT `login`, `role` FROM `users` WHERE `login` = '$SESSIONname'";
                $result_role = mysqli_query($link, $query_role) or die('Ошибка ' . mysqli_error($link));
                $row_data = mysqli_fetch_assoc($result_role);
                $role = $row_data['role'];

                if ($role == 1) 
                {
                    echo "<a href='user.php' class='reg'> ЛИЧНЫЙ КАБИНЕТ </a>";
                    echo "<form method='POST' action='logout.php' class='box_submit'>
                            <input type='submit' class='auth' value='ВЫХОД'> 
                        </form>";
                }
                else if ($role == 2)
                {
                    echo "<a href='admin.php' class='reg'> ПАНЕЛЬ АДМИНИСТРАТОРА </a>";
                    echo "<form method='POST' action='logout.php' class='box_submit'>
                            <input type='submit' class='auth' value='ВЫХОД'> 
                        </form>";
                }
                else 
                {
                    echo "<a href='reg.php' class='reg'> РЕГИСТРАЦИЯ </a>";
                    echo "<a href='auth.php' class='auth'> ВХОД </a>";
                }
            ?>
            </div>
        </div>

        <div class="main_box_2">
            <p class="let_3"> Сообщите нам </p>
            <p class="let_4"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </p>
            <div class="box_3">
                <p class="let_5"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt vitae exercitationem molestiae, atque ipsa iste dolor dignissimos at, corporis voluptatum fugiat, maiores ipsum eligendi ut veritatis accusamus rem consequatur itaque.</p>
                <a href="#" class="rep"> СООБЩИТЬ </a>
            </div>
        </div>

        <div class="main_box_3">
            <p class="let_6"> Последние добрые дела</p>

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
            </div>
            
            <div class="box_4">
                <div class="pic"></div>
                <div class="info">
                    <a class="name"> Название заявки </a>
                    <div class="data_from">
                        <p class="data"> Дата </p>
                        <p class="from"> От кого </p>
                    </div>
                    <p class="text"> Описание заявки "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam omnis reprehenderit illo voluptatum laudantium libero laboriosam hic adipisci."</p>
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