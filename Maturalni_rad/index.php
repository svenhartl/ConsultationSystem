<?php
   session_start();
   include('dbconn.php');

      if ($_SESSION['role'] == 'admin') {
        header("Location: indexpageAdmin.php");
      	 }if($_SESSION['role'] == 'profesor'){ 
      		header("Location: indexpageProf.php");
      	 } 
           if($_SESSION['role'] == 'student'){ 
            header("Location: indexpageStudent.php");
         
 } ?>
      





