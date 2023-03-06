
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Sign Up</title>
</head>
<body>
    
    <form action="signup.php" method="POST" class="form">
          <div class="imgcontainer">
    <img src="avatar.png" alt="Avatar" class="avatar">
  </div>
  <label><b>Ime</b></label>
        <input type="text" name="name" placeholder="Ime">
        <br>
        <label><b>Prezime</b></label>
        <input type="text" name="surname" placeholder="Prezime">
        <br>
        <label><b>Korisničko ime</b></label>
        <input type="text" name="username" placeholder="Korisnicko ime">
        <br>
        <label><b>E-mail</b></label>
        <input type="text" name="email" placeholder="E-mail">
        <br>
        <label><b>Lozinka</b></label>
        <input type="password" name="pwd" placeholder="Lozinka">
        <br>
        <label><b>Ponovi Lozinku</b></label>
        <input type="password" name="pwdrep" placeholder="Ponovi lozinku">
        <br>
        <label class="radio-inline">
      <input type="radio" name="role" value="admin" checked>Admin
    </label>
    <label class="radio-inline">
      <input type="radio" name="role" value="profesor">Nastavnik
    </label>
    <label class="radio-inline">
      <input type="radio" name="role" value="student">Ucenik
    </label>
    

        <button type="submit" name="submit" class="button">Prijava</button>


        <div class="container" style="background-color:#f1f1f1">

    <button type="button" class="cancelbtn" onclick="window.location.href='indexpageAdmin.php'">Odustani</button>

</div>
        <?php
        if(isset($_GET["error"]))
        {
            
            if($_GET["error"]=="emptyinput")
            {
                echo"<p>Ispunite sva polja</p>";
            }elseif($_GET["error"]=="invalidsurname")
            {
                echo"<p>Neispravno Prezime</p>";
            }
            elseif($_GET["error"]=="invalidname")
            {
                echo"<p>Neispravno Ime</p>";
            }elseif($_GET["error"]=="ivalidusername")
            {
                echo"<p>Izaberite ispravni username</p>";
            }
            elseif($_GET["error"]=="ivalidemail")
            {
                echo"<p>Izaberite ispravni email</p>";
            }
            elseif($_GET["error"]=="passdontmatch")
            {
                echo"<p>Lozinke se ne podudaraju</p>";
            }
            elseif($_GET["error"]=="usernametaken")
            {
                echo"<p>Ime je zauzeto</p>";

            }
            elseif($_GET["error"]=="statementfailed")
            {
                echo"<p>Nesto je poslo po krivu, pokusajte ponovo</p>";

            }
            elseif($_GET["error"]=="none")
            {
                echo"<p>Uspjesno ste se registrirali</p>";

            }
         
        }
        ?>
    </form>
</body>
</html>