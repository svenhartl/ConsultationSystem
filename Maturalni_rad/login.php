<?php

  require_once 'dbconn.php';
  require_once 'functions.php';

if(isset($_POST["submit"]))
{
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    
    if(emptyInputLogin($username,$pwd)!==false){
        header("Location: ../Maturalni_rad/loginpage.php?error=emptyinput");
        exit();
    }else{

    loginUser($db,$username,$pwd);
         header("Location: ../Maturalni_rad/login.php"); 
         exit();
    }
}