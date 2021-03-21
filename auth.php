<?php

session_start();
require_once "connection.php";

$SESSIONname = $_SESSION['username'];

if (isset($SESSIONname))
{
    $query_role = "SELECT `role` FROM `users` WHERE `login` = '$SESSIONname'";
    $result_role = mysqli_query($link, $query_role);
    $role_data = mysqli_fetch_row($result_role);
    $role = $role_data[0];

    if ($role == 1)
    {
        header('Location: user.php');
        exit();
    }
    else if ($role == 2) 
    {
        header('Location: admin.php');
        exit();
    }
}

$login_input = $_POST['login_input'];
$pass_input = $_POST['pass_input']; 
$submit = $_POST['submit_user'];

$query_user = "SELECT `login`, `password` FROM `users`";
$result_user = mysqli_query($link, $query_user);

while ($row = mysqli_fetch_row($result_user))
{
    if (($login_input == $row[0]) and ($pass_input == $row[1]))
    {
        session_start();
        $_SESSION['username'] = "$row[0]";
        header('Location: auth.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Авторизация - Сделаем лучше вместе!</title>
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
                <p class="username">АВТОРИЗАЦИЯ</p>
            </div>
            <div class="box_user_2">
                <form class="box_submit">
                    <a href="reg.php" class="auth"> РЕГИСТРАЦИЯ </a>
                </form>
            </div>
        </div>

        <form class="reg" method="POST">
            <input type="text" name="login_input" class="input_user" placeholder="Логин" pattern="[A-Za-z]{2,255}" required><br> 
            <input type="password" id="pass_first" name="pass_input" class="input_user" placeholder="Пароль" required> <br>

            <? 
            
                if (isset($submit))
                {
                    $result_login = mysqli_num_rows(mysqli_query($link, "SELECT `login`, `password` FROM `users` WHERE `login` = '$login_input'"));
                    $result_pass = mysqli_num_rows(mysqli_query($link, "SELECT `login`, `password` FROM `users` WHERE `password` = '$pass_input'"));

                    if ((!$result_login) or (!$result_pass))
                    {
                        echo "<span style='color: black;'> Неправильный логин или пароль </span>";
                    }
                }
            
            ?>

            <input type="submit" name="submit_user" class="input_user_submit" value="Войти">
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