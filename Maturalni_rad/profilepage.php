<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit Profile</title>
</head>
<body>

<header>
    <?php
		include("navbar.php");
        ?>
	</header> 


<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
    
<?php
 include("dbconn.php");
 
 $loggedinuser=$_SESSION["name"];
 $lastname=$_SESSION["surname"];
 $username=$_SESSION["username"];
 $email=$_SESSION["email"];
 $userid=$_SESSION["ID"];
 
	echo '<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="avatar.png" class="avatar2 img-circle img-thumbnail" alt="avatar" name="img" style="width: 15%">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3 class="h3">Personal info</h3>
        
        <form class="form-horizontal" role="form" method="POST" action="#">
          <div class="form-group">
            <label class="col-lg-3 control-label" >First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="name"  placeholder='.$loggedinuser.'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text"name="surname" placeholder='.$lastname.'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="username" placeholder='.$username.'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">E-mail:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" placeholder='.$email.'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="pwd">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">New Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="newpwd" value="">
            </div>
          </div>
          <div class="form-group">
          <label class="col-lg-3 control-label">Repeat New Password:</label>
          <div class="col-lg-8">
            <input class="form-control" type="password" name="newpwdrep" value="">
          </div>
        </div>
          <div class="butt1" > 
              <button class="button11" type="submit" name="submit">Potvrdi</button>
          
              <button class="button22" type="submit" name="submit2">Odustani</button>
          </div>
        </form>
      </div>
  </div>
</div>';

if(isset($_POST['submit'])){
  include("functions.php");

  $hashedPwd=$_SESSION["password"];

  $id=$_SESSION["ID"];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $newpwd = $_POST['newpwd'];
  $newpwdrep=$_POST['newpwdrep'];
  $pwd=$_POST['pwd'];

  $newpwdhash=password_hash($pwd,PASSWORD_DEFAULT);

 if(password_verify($pwd, $hashedPwd)){
      if($newpwd==$newpwdrep){

    $hashedPwdnew= password_hash($newpwd,PASSWORD_DEFAULT);
$query = "UPDATE users SET name = '$name',
                surname = '$surname', username = '$username', email = '$email', password ='$hashedPwdnew'
                WHERE id = '$userid'";
              $result = mysqli_query($db, $query) or die(mysqli_error($db));
              ?>
               <script type="text/javascript">
      alert("Uspješno ste uredili profil");
      window.location = "indexdb.php";

      
  </script>
<?php




}else{
  //pass dont match
  header("Location: ../Maturalni_rad/profilepage.php?error=passdontmatch");
}
 }else{
    //pass not corr
    header("Location: ../Maturalni_rad/profilepage.php?error=wrongpasword");
 }
  

}


?>
<?php
if(isset($_POST['submit2'])){
  header("Location: indexpageAdmin.php");
}
?>
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

//Mouse click on sub menus
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


</body>
</html>