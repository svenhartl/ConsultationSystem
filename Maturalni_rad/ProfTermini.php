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


<?php
include("dbconn.php");

$_SESSION['idd'] = $_POST['idd'];
$idd=$_SESSION['idd'];
$loggedinusersurname=$_SESSION['surname'];

$result = mysqli_query($db,"SELECT termini.time,termini.id,termini.datum, users.name, users.surname, termini.kabinet, termini.users_id FROM users INNER JOIN termini on  users.id=termini.users_id
WHERE users_id=$idd AND rezerviran=0");


echo "
<p style='font-size: 2em;'>
<b>Slobodni termini:</b>
</p>
<div class='table-wrapper'>
<table class='fl-table' border='1'>
<tr>
<th>Profesor</th>
<th>Datum</th>
<th>Vrijeme</th>
<th>Kabinet</th>
<th>Rezervacija</th>
</tr>
";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] ." " . $row['surname'] ."</td>";
    echo "<td>" . $row['datum'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['kabinet'] . "</td>";
    echo"<td>

<form class='form1' method='post' action='rezTermin.php'>
  <input value='".$row['id']."' name='terminId' hidden>
  <input value='$idd' name='users_id' hidden>
  <input value='$loggedinuser' name='termin_name' hidden>
  <input value='$loggedinusersurname' name='termin_surname' hidden>
    <button type='submit' name='submit2' class='bn3'>Rezerviraj</button>
</form></td>";

}
echo "</table>";

mysqli_close($db);

?>

</body>
</html>