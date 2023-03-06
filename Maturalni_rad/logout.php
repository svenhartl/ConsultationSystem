<?php 

session_start();

unset($_SESSION['username']);
unset($_SESSION['ID']);
unset($_SESSION['name']);
unset($_SESSION['surname']);
unset($_SESSION['password']);
unset($_SESSION['role']);
unset($_SESSION['users_id']);

header("location: loginpage.php")

?>