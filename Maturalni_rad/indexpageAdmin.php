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
         
<form class="form" method="get" action="/Maturalni_rad/usersignup.php">
    <button type="submit" class="bn3">Unos novog korisnika</button>
</form>

<form class="form" method="get" action="/Maturalni_rad/userlist.php">
    <button type="submit" class="bn3">Korisnici</button>
</form>

</body>
</html>