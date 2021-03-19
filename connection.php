<?php

$host = 'localhost';
$database = 'better_together';
$username = 'root';
$password = '';

$link = mysqli_connect($host, $username, $password, $database);

if (!$link) 
{
    die("Ошибка: Невозможно подключиться к MySQL ". mysqli_connect_error());
}

mysqli_close($link);

?>