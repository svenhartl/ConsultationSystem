<?php
require_once 'dbconn.php';
session_start();
$id=$_SESSION["ID"];
if(isset($_POST['submit1']))
{    
    
     $datum = $_POST['datum'];
     $kabinet = $_POST['kabinet'];
     $time = $_POST['time'];
   

      $result = mysqli_query($db,"SELECT termini.datum, termini.time, users.username, termini.kabinet, termini.users_id FROM users INNER JOIN termini on  users.id=termini.users_id
      WHERE users_id=$id");

     $sql = "INSERT INTO termini (users_id,datum,time,kabinet,rezerviran) VALUES ('$id','$datum','$time','$kabinet',0)";

     if (mysqli_query($db, $sql)) {
      header("Location: indexpageProf.php");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($db);
     }
     mysqli_close($db);
}

if(isset($_POST['submit2'])){
   header("Location: indexpageProf.php");
}

if(isset($_POST['delete'])){
   $id1=$_POST['id1'];
   $sql = "DELETE FROM termini WHERE termini.id = $id1";
   
     if (mysqli_query($db, $sql)) {
      header("Location: indexpageProf.php");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($db);
     }
     mysqli_close($db);
}
?>