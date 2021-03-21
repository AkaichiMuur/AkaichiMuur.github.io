<?php

session_start();
require_once "connection.php";

if (empty($_SESSION['username'])) 
{
    header('Location: auth.php');
    exit();
}

$SESSIONname = $_SESSION['username'];

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
                <p class="username"> Личный кабинет: USERNAME</p>
            </div>
            <div class="box_user_2">
                <form method="POST" action="logout.php" class="box_submit">
                    <input type="submit" class="auth" value="ВЫХОД"> 
                </form>
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
                    <a href="create_application.php" class="new_appl"> Создать новуюя заявку </a>
                </div>
            </div>

            <div class="box_user_5">
                <form method="GET" class="box_application_del">

                <?php
                    $query_user = "SELECT `id_user`, `login` FROM `users` WHERE `login` = '$SESSIONname'";
                    $result_user = mysqli_query($link, $query_user) or die('Ошибка '. mysqli_error($link));
                    $row_user = mysqli_fetch_array($result_user);
                    $id_user = $row_user[0];

                    $query_application = "SELECT `id_app`, `name_app`, `description_app`, `description_decline`, `id_category`, `before_img`, `after_img`, `status_app`, `date_app`, `id_user` 
                    FROM `application` 
                    WHERE `id_user` = '$id_user'";
                    $result_applicaton = mysqli_query($link, $query_application) or die('Ошибка '. mysqli_error($link));

                    while ($row_application = mysqli_fetch_array($result_applicaton)) 
                    {
                        
                        $id_app = $row_application[0];
                        $name_app = $row_application[1];
                        $description_app = $row_application[2];
                        $description_decline = $row_application[3];
                        $id_category = $row_application[4];
                        $before_img = $row_application[5];
                        $after_img = $row_application[6];
                        $status_app = $row_application[7];
                        $date_app = $row_application[8];
                        $id_user = $row_application[9];

                        $query_category = "SELECT `id_category`, `name_category` FROM `category` WHERE `id_category` = '$id_category'";
                        $result_category = mysqli_query($link, $query_category) or die('Ошибка '. mysqli_error($link));
                        $row_category = mysqli_fetch_assoc($result_category);
                        $name_category = $row_category['name_category'];

                        echo "<div class='box_4'>";
                            echo "<p class='status'> $status_app </p>";
                            echo "<div class='info'>";
                                echo "<a class='name'> $name_app </a>";
                                echo "<div class='data_from'>";
                                    echo "<p class='data'> $date_app </p>";
                                echo "</div>";
                                echo "<p class='text'> Описание заявки: <br> $description_app  </p>";
                            echo "</div>";
                            echo "<a href='delete_application.php?id=".$id_app."' class='del'>Удалить заявку</a>";
                        echo "</div>";
                    }
                
                ?>

                </form>
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