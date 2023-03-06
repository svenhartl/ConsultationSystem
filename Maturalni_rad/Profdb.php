<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    
<header>
    <?php
		include("navbar.php");
        ?>
	</header> 

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
<th>Termin</th>
</tr>
</div>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td style='padding: 7px'>" . $row['name'] ." ". $row['surname'] ."</td>";
    echo "<td>" . $row['datum'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['kabinet'] . "</td>";
    echo '<td>
                <form class="form2" id="delete" method="post" action="insertTermini.php">
                <button type="submit" name="delete" class="bn33">Otkaži</button>
                <input value="'.$row['id'].'" name="id1" hidden>
                </form></td>';
}
echo "</table>";

mysqli_close($db);

?>
  <?php
     
     echo '<form class="form1" method="post" action="unosTermina.php">
     <button onclick="" type="submit" value="'.$id.'" name="id" class="bn31">Unesi termin</button>
 </form>';
     ?>   
<script>
      


    

</script>
  </div>
  <div class="column3">
  
  </div>
</div>

    <?php
include("dbconn.php");

$result = mysqli_query($db,"SELECT termini.termin_name, termini.termin_surname, termini.time,termini.id,termini.datum, users.name, users.surname, termini.kabinet, termini.users_id FROM users INNER JOIN termini on  users.id=termini.users_id
WHERE rezerviran=1 AND users_id=$id");



echo "
<p style='font-size: 2em;'>
<b>Rezervirani termini:</b>
</p>
<div class='table-wrapper'>
<table class='fl-table' border='1  '>
<tr>
<th>Ucenik</th>
<th>Kabinet</th>
<th>Vrijeme</th>
<th>Termin</th>
</tr>
</div>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['termin_name'] . " " . $row['termin_surname'] . "</td>";
    echo "<td>" . $row['kabinet'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo"<td>";

echo "<form class='form333' method='post' action='deleteTermin.php'>";
echo   '<input value="'.$row['id'].'" name="terminId" hidden>';
echo   '<input value="'.$row['users_id'].'" name="users_id" hidden>';
echo"<input value='$loggedinuser' name='termin_name' hidden>";
 echo   "<button class='bn33' name='submit333' type='submit'>Obriši</button>
</form></td>";

}

echo "</table>";
echo "</div>";
mysqli_close($db);
?>


</body>


</html>