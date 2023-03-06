<?php
require_once 'dbconn.php';
session_start();

if(isset($_POST['submit2']))
{    
    $terminid=$_POST["terminId"];
    $loggedinuser=$_POST["termin_name"];
    $loggedinusersurname=$_POST["termin_surname"];
    $sql ="UPDATE termini SET rezerviran=1,termin_name='$loggedinuser',termin_surname='$loggedinusersurname' WHERE id=$terminid";

    if (mysqli_query($db, $sql)) {
        header("Location: Studentdb.php");
        
       } else {
          echo "Error: " . $sql . ":-" . mysqli_error($db);
       }
       mysqli_close($db);
}

?>