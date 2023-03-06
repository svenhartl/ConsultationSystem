<?php
require_once 'dbconn.php';
session_start();

if(isset($_POST['submit333']))
{    
    $terminid=$_POST["terminId"];
    
    $sql ="UPDATE termini SET rezerviran=0,termin_name=0,termin_surname=0 WHERE id=$terminid";

    if (mysqli_query($db, $sql)) {
        header("Location: Studentdb.php");
        
       } else {
          echo "Error: " . $sql . ":-" . mysqli_error($db);
       }
       mysqli_close($db);
}

?>