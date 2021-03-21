<?
session_start();

unset($c_login);
unset($c_password);

unset($_SESSION['username']);
session_destroy();

header('Location: main.php');
exit();
