<?php

session_start();
require_once "connection.php";

$SESSIONname = $_SESSION['username'];
$query_user = "SELECT `id_user`, `fio`, `login`, `email`, `password`, `role` FROM `users` WHERE `login` = '$SASSIONname'";
$result_user = mysqli_query($link, $query_user) or die("Ошибка ". mysqli_error($link));

$submit = $_POST['submit_user']);

if (isset($submit) 
{
    $fio_input = $_POST['fio_input']);
    $login_input = $_POST['login_input']);
    $email_input = $_POST['email_input']);
    $pass_input = $_POST['pass_input']);
    $pass_again_input = $_POST['pass_again_input']);

    $result_login = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login'"));
// роль 1 - юзер
// роль 2 - админ
    if ($result_login <= 0) 
    {
        $insert_user = "INSERT INTO `users` (`id_user`, `fio`, `login`, `email`, `password`, `role`) 
                        VALUES (NULL, '$fio_input', '$login_input', '$email_input', '$pass_input', 1)";
        $result_insert = mysqli_query($link, $insert_user) or die("Ошибка ". mysqli_error($link)); 
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
        <form class="reg" method="POST">
            <input type="text" name="fio_input" placeholder="ФИО" pattern="[А-Яа-яЁё \- \s]{2,255}" required>
            <input type="text" name="login_input" placeholder="Логин" pattern="[A-Za-z]{2,255}" required>
            <input type="email" name="email_input" placeholder="Email" required>
            <input type="password" name="pass_input" placeholder="Пароль" required>
            <input type="password" name="pass_again_input" placeholder="Повторите пароль" required>
            <input type="checkbox" id="checkbox_input_data" name="checkbox_input" required checked>
            <label for="checkbox_input_data"> Согласие на обработку персональных данных </label>
            <input type="submit" name="submit_user" value="Зарегистрироваться">
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