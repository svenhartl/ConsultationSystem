<?php

include("dbconn.php");
session_start();

if ($_SESSION['role'] == 'admin') {
    header("Location: Admindb.php");
       }if($_SESSION['role'] == 'profesor'){ 
          header("Location: Profdb.php");
       } 
       if($_SESSION['role'] == 'student'){ 
        header("Location: Studentdb.php");
     
}


?>