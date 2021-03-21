<?php

session_start();
require_once "connection.php";

$submit = $_POST['submit_user'];

if (isset($submit)) 
{
    $fio_input = $_POST['fio_input'];
    $login_input = $_POST['login_input'];
    $email_input = $_POST['email_input'];
    $pass_input = $_POST['pass_input'];
    $pass_again_input = $_POST['pass_again_input'];

    $result_login = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login_input'"));
// роль 1 - юзер
// роль 2 - админ
    if ($result_login <= 0) 
    {
        $insert_user = "INSERT INTO 
                        `users` (`id_user`, `fio`, `login`, `email`, `password`, `role`) 
                        VALUES 
                        (NULL, '$fio_input', '$login_input', '$email_input', '$pass_input', 1)";
        $result_insert = mysqli_query($link, $insert_user) or die("Ошибка ". mysqli_error($link));

        if ($result_insert)
        {
            header("Location: main.php");
            exit();
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Регистрация - Сделаем лучше вместе!</title>
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
                <p class="username">РЕГИСТРАЦИЯ</p>
            </div>
            <div class="box_user_2">
                <form class="box_submit">
                    <a href="main.php" class="auth"> ГЛАВНАЯ </a>
                </form>
            </div>
        </div>

        <form class="reg" method="POST">
            <input type="text" name="fio_input" class="input_user" placeholder="ФИО" pattern="[А-Яа-яЁё \- \s]{2,255}" required autofocus> <br>
            <input type="text" name="login_input" class="input_user" placeholder="Логин" pattern="[A-Za-z]{2,255}" required>
            <!-- НАПИСАТЬ ПРОВЕРКУ ЛОГИНА НА JS!!!!!!!!! -->
            <? 
                if ($result_login > 0)
                {
                    echo "<span style='color: black;'>Такой логин уже существует. Придумайте другой. </span>";
                }
            ?> 
            <br> 
            <input type="email" name="email_input" class="input_user" placeholder="Email" required> <br>
            <input type="password" id="pass_first" name="pass_input" class="input_user" placeholder="Пароль" required> <br>
            <input type="password" id="pass_second" name="pass_again_input" class="input_user" placeholder="Повторите пароль" required> <br>
            <!-- НАПИСАТЬ ПРОВЕРКУ ПАРОЛЕЙ НА JS!!!!!!!!! -->
            <label for="checkbox_input_data" class="input_user_checkbox"> <input type="checkbox" id="checkbox_input_data" name="checkbox_input"  required checked> Согласие на обработку персональных данных </label> <br>
            <input type="submit" name="submit_user" class="input_user_submit" value="Зарегистрироваться">
        </form>
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