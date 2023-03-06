<?php 


include('dbconn.php');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  

<form class="form" action="login.php" method="POST">
  <div class="imgcontainer">
    <img src="avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Korisničko ime</b></label>
    <input type="text" name="username" required placeholder="Unesite korisničko ime">

    <label><b>Lozinka</b></label>
    <input type="password" name="pwd" placeholder="Unesite lozinku">
        
    <button type="submit" class="button" name="submit">Prijava</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Zapamti korisničko ime
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Odustani</button>
    <span class="psw">Zaboravili ste <a href="#">lozinku?</a></span> 

    <?php
        if(isset($_GET["error"]))
        {
            if($_GET["error"]=="emptyinput")
            {
                echo"<p>Ispunite sva polja</p>";

            }elseif($_GET["error"]=="wronglogin")
            {
                echo"<p>Neispravni login podaci</p>";
            }
           
        }
        ?>

  </div>

 

</form>


</body>
</html>

