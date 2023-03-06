<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
		<?php
        include("navbar.php");
        ?>
	</header> 

      

 
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js
"></script>
<script type="text/javascript" >
$(document).ready(function()
{

$(".account").click(function()
{
var X=$(this).attr('id');
if(X==1)
{
$(".submenu").hide();
$(this).attr('id', '0');
}
else
{
$(".submenu").show();
$(this).attr('id', '1');
}

});

//Mouse click on sub menu
$(".submenu").mouseup(function()
{
return false
});

//Mouse click on my account link
$(".account").mouseup(function()
{
return false
});


//Document Click
$(document).mouseup(function()
{
$(".submenu").hide();
$(".account").attr('id', '');
});
});
</script>
<?php 
include("dbconn.php");

$id=$_SESSION["ID"];

echo "<form class='form' action='insertTermini.php' method='post'>
<div class='container'>
    <label><b>Kabinet:</b></label>
    <br>
    <br>
   <select name='kabinet' >
        <option value='Stručni'>Stručni</option>
       <option value='Matematika'>Matematika</option>
       <option value='Hrvatski'>Hrvatski</option>
       <option value='Hrvatski'>Engleski</option>
       <option value='Hrvatski'>Povijest</option>
       <option value='Hrvatski'>Geografija</option>
   </select>
    <br>
    <br>
    <label><b>Datum</b></label>
    <br>
    <br>
    <input type='date' name='datum' placeholder='Unesite datum'>
    <br>
    <br>
    <label><b>Vrijeme</b></label>
    <br>
    <br>
    <input type='time' name='time' placeholder='Unesite vrijeme'>";

    echo'<br>';
     echo '<input value="'.$id.'" hidden>';
     echo'<br>';
    echo '<button class="button1" type="submit" name="submit1">Potvrdi</button>';
    echo '<button class="button2" type="submit" name="submit2">Odustani</button>';
 
  
    
    
    
    ?>
    

<label>
</body>
</html>