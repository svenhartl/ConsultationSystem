<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Vaši termini</title>
</head>
<body>
    
<header>
    <?php
		include("navbar.php");
        ?>
	</header> 
    <?php
include("dbconn.php");



$result = mysqli_query($db,"SELECT termini.time,termini.id,termini.datum, users.name, users.surname, termini.kabinet, termini.users_id FROM users INNER JOIN termini on  users.id=termini.users_id
WHERE termin_name='$loggedinuser' AND rezerviran=1");

//$result = mysqli_query($db,"SELECT id,kabinet,time FROM termini WHERE rezerviran='1' AND termin_name='$loggedinuser'");

echo "
<p style='font-size: 2em;'>
<b>Rezervirani termini:</b>
</p>
<div class='table-wrapper'>
<table class='fl-table' border='1  '>
<tr>
<th>Profesor</th>
<th>Kabinet</th>
<th>Vrijeme</th>
<th>Termin</th>
</tr>
</div>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . " " . $row['surname'] . "</td>";
    echo "<td>" . $row['kabinet'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo"<td>";

echo "<form class='form333' method='post' action='deleteTermin.php'>";
echo   '<input value="'.$row['id'].'" name="terminId" hidden>';
echo"<input value='$loggedinuser' name='termin_name' hidden>";
 echo   "<button class='bn33' name='submit333' type='submit'>Obriši</button>
</form></td>";

}

echo "</table>";

mysqli_close($db);
?>
</body>
</html>