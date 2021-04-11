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
                <p class="username"> Панель администратора: <? echo $SESSIONname; ?></p>
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

                <?php
                    $query_application = "SELECT `id_app`, `name_app`, `description_app`, `description_decline`, `id_category`, `before_img`, `after_img`, `status_app`, `date_app`, `id_user` 
                        FROM `application` 
                        ORDER BY `application`.`date_app` DESC";
                    $result_applicaton = mysqli_query($link, $query_application) or die('Ошибка '. mysqli_error($link));
                    $rows_application = mysqli_num_rows($result_applicaton);

                    if ($rows_application > 0) 
                    {
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

                            $query_user = "SELECT `fio` FROM `users` WHERE `id_user` = '$id_user'";
                            $result_user = mysqli_query($link, $query_user) or die ('Ошибка ' . mysqli_error($link));
                            $row_data = mysqli_fetch_assoc($result_user);
                            $fio = $row_data['fio'];

                            echo "
                            <div class='box_4'>

                                <p class='status'> $status_app </p>
                                <img src='$before_img' class='pic'>

                                <div class='info'>
                                    <a class='name'> $name_app </a>
                                    <div class='data_from'>
                                        <p class='data'> Дата: $date_app </p>
                                        <p class='from'> От кого: $fio </p>
                                    </div>
                                    <p class='text'> Описание заявки ' $description_app '</p>
                                </div> ";
                            if ($status_app === "Новая") 
                            {
                                echo "
                                <div class='buttons'>
                                    <p class='but_stat'> Сменить статус на: </p>
                                    <input type='button' class='reject_solve' value='ОТКЛОНЕНА'>
                                    <input type='button' class='reject_solve' value='РЕШЕНА'>
                                </div>

                                <div class='buttons'>
                                    <p class='but_stat'> Загрузить изображение 'после': </p>
                                    <input type='file' accept='image/*' class='insert_pic'>
                                    <input type='submit' value='ОТПРАВИТЬ ИЗОБРАЖЕНИЕ' class='submit_pic'>
                                </div> 
                                ";
                            }
                            echo "</div>";
                        }
                    }
                    else
                    {
                        echo "<span style='font-weight: 500; font-size: 25px; margin-bottom: 70px;'> Нет заявок </span>";
                    }

                ?> 
            </div>
        </div>

        
    </main>

</body>
</html>