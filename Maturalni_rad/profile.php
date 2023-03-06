<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <title>Document</title>
</head>
<body>
<ul>
        <li><a class="tsd" href="indexpageAdmin.php">TSD</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        
        <div class="dropdown">

<a class="account" ><p class="username">Admin</p><img class="avatar1" src="avatar.png"></a>

<div class="submenu">
<ul class="root">
<li class="li1"><a class="a1" href="#Dashboard" >Dashboard</a></li>
<li class="li1"><a class="a1" href="profile.php" >Edit profile</a></li>
<li class="li1"><a class="a1" href="logout.php" >Log out</a></li>
</ul>
</div>

</div>
      </ul>
<div class="container bootstrap snippets bootdey">
      
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="avatar.png" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <i class="fa fa-coffee"></i>
        </div>
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Ime:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="Ime">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Prezime:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="Prezime">
            </div>
          </div>
          <div class="form-group">
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="example@gmail.com">
            </div>
          </div>
          <div class="form-group">
                <button type="submit" class="button" name="submit">Potvrdi</button>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
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
</body>
</html>

