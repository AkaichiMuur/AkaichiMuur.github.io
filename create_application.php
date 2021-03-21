<?php

session_start();
require_once "connection.php";

if (empty($_SESSION['username'])) 
{
    header('Location: auth.php');
    exit();
}

$SESSIONname = $_SESSION['username'];

$query_user = "SELECT `id_user`, `login` FROM `users` WHERE `login` = '$SESSIONname'";
$result_user = mysqli_query($link, $query_user) or die('Ошибка '. mysqli_error($link));
$row_user = mysqli_fetch_array($result_user);
$id_user = $row_user[0];



$name_input = $_POST['name_input'];
$description_input = $_POST['description_input'];
$option_one = $_POST['option_one'];
$pic_input = $_POST['pic_input'];
$name_input = $_POST['name_input'];

if (isset($_POST['submit_user'])) 
{
    $insert_app = "INSERT INTO `application` (`id_app`, `name_app`, `description_app`, `description_decline`, `id_category`, `before_img`, `after_img`, `status_app`, `date_app`, `id_user`) VALUES (NULL, '$name_input', '$description_input', NULL, '$option_one', '$pic_input', NULL, 'Новая', NOW(), '$id_user')";
    $result_insert = mysqli_query($link, $insert_app) or die("Ошибка ". mysqli_error($link));

    if ($result_insert)
    {
        header("Location: user.php");
        exit();
    }
}


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
                <p class="username"> СОЗДАНИЕ ЗАЯВКИ</p>
            </div>
            <div class="box_user_2">
                <form class="box_submit">
                    <a href="user.php" class="auth"> ЛИЧНЫЙ КАБИНЕТ </a>
                </form>
            </div>
        </div>

        <div class="box_user_5">
            <form method="POST" class="reg">
                <input type="text" name="name_input" class="input_user" placeholder="Название" pattern="[А-Яа-яЁё \- \s]{2,255}" required><br> 
                <input type="text" name="description_input" class="input_user" placeholder="Описание" required><br> 
                
				<select class="select" name="select_one">
                <? 
                
                    $query_category = "SELECT `id_category` FROM `category`";
                    $result_category = mysqli_query($link, $query_category) or die('Ошибка '. mysqli_error($link));

                ?>
					<option class="disabled" label>Выберите категорию</option>
					<option name="option_one" value="1">Ремонт дороги</option>
					<option name="option_one" value="2">Ремонт детской площадки</option>
					<option name="option_one" value="3">Ремонт здания</option>
				</select><br> 

                <input type="file" name="pic_input" id="file" accept=".png, .jpg, .jpeg, .bmp" class="pic_input" required><br> 

                <input type="submit" name="submit_user" class="input_user_submit" value="Отправить заявку на рассмотрение">
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

<script> 
// ПРОВЕРКА РАЗМЕРА КАРТИНКИ. 10Мб = 10485760 байт
    var uploadField = document.getElementById("file");

    uploadField.onchange = function() 
    {
        if (this.files[0].size > 10485760)
        {
            alert("Загружаемый файл слишком большой. Максимальный размер файла 10Мб.");
            this.value = "";
        };
    };

</script>

</body>
</html>