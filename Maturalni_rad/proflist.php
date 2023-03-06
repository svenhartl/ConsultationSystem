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

$result = mysqli_query($db,"SELECT id,name,surname,email FROM users WHERE role='profesor'");

echo "
<p style='font-size: 2em;'>
<b>Popis nastavnika:</b>
</p>
<div class='table-wrapper'>
<table class='fl-table' border='1  '>
<tr>
<th>Profesor</th>
<th>E-mail</th>
<th>Termini</th>
</tr>
</div>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . " ". $row['surname'] ."</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo"<td>";

echo "<form class='form1' method='post' action='ProfTermini.php'>";
echo   '<input value="'.$row['id'].'" name="idd" hidden>';
 echo   "<button class='bn3' type='submit' class='proftermini'>Pregledaj</button>
</form></td>";

}

echo "</table>";

mysqli_close($db);
?>

</body>
</html>