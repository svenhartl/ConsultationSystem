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



<div class="row">
  <div class="column1">
    
    
  </div>
  <div class="column2">
      <h1>Vaši slobodni termini: </h1>

      <?php
include("dbconn.php");

$id= $_SESSION['ID'];

$result = mysqli_query($db,"SELECT termini.datum,  termini.time, users.name, termini.id, users.surname,termini.kabinet, termini.users_id FROM users INNER JOIN termini on  users.id=termini.users_id
WHERE users_id=$id");

echo "
<div class='table-wrapper'>
<table class='fl-table' border='1' style='width: 100%; height: auto'>
<tr>
<th>Profesor</th>
<th>Datum</th>
<th>Vrijeme</th>
<th>Kabinet</th>
<th>Brisanje</th>
</tr>
</div>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td style='padding: 7px'>" . $row['name'] ." ". $row['surname'] ."</td>";
    echo "<td>" . $row['datum'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['kabinet'] . "</td>";
    echo '<td>
                <form class="form2" method="post" action="insertTermini.php">
                <button type="submit" name="delete" class="bn33">Obriši</button>
                <input value="'.$row['id'].'" name="id1" hidden>
                </form></td>';
}
echo "</table>";

mysqli_close($db);

?>
  <?php
     
     echo '<form class="form1" method="post" action="unosTermina.php">
     <button type="submit" value="'.$id.'" name="id" class="bn31">Unesi termin</button>
 </form>';
     ?>   

  </div>
  <div class="column3">
  
  </div>
</div>


</body>
</html>