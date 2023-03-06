<?php 
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $surname=$_POST["surname"];
    $username= $_POST["username"];
    $email=$_POST["email"];
    $pwd=$_POST["pwd"];
    $pwdrep=$_POST["pwdrep"];
    $role=$_POST["role"];
    
    require_once 'dbconn.php';
    require_once 'functions.php';

    if(invalidSurname($surname)!==false){
        header("Location: ../Maturalni_rad/usersignup.php?error=invalidsurname");
        exit();

    }
    if(invalidName($name)!==false){
        header("Location: ../Maturalni_rad/usersignup.php?error=invalidname");
        exit();

    }
    if(emptyInputSignup($name,$surname,$username,$email,$pwd,$pwdrep)!==false){
        header("Location: ../Maturalni_rad/usersignup.php?error=invalidsurname");
        exit();

    }
    if(invalidUid($username)!==false){
        header("Location: ../Maturalni_rad/usersignup.php?error=invalidusername");
        exit();

    }
    if(invalidEmail($email)!==false){
        header("Location: ../Maturalni_rad/usersignup.php?error=invalidemail");
        exit();

    }
    if(pwdMatch($pwd,$pwdrep)!==false){
        header("Location: ../Maturalni_rad/usersignup.php?error=passdontmatch");
        exit();

    }
    if(uidExists($db,$username,$email)!==false){
        header("Location: ../Maturalni_rad/usersignup.php?error=usernametaken");
        exit();

    }

   createUser($db,$role,$name,$surname,$username,$pwd,$email,$pwdrep,);
    
}
else{
    header("Location: ../Maturalni_rad/usersignup.php");
    exit();
}

?>    