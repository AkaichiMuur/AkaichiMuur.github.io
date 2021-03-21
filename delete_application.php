<?php

session_start();
require_once "connection.php";

if(isset($_GET['id'])) 
{
    $id_app_for_del = $_GET['id'];
    $query_delete = "DELETE FROM `application` WHERE `application`.`id_app` = '$id_app_for_del'";
    $result_delete = mysqli_query($link, $query_delete) or die("Ошибка" . mysqli_error($link));

    if ($result_delete)
    {
        mysqli_close($link);
        echo "<script> location.href = 'user.php' </script>";
    }
}

?>