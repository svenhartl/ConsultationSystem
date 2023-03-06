
<?php

function emptyInputSignup($name,$surname,$username,$email,$pwd,$pwdrep){

    $result;
    
    if(empty($username) || empty($email) || empty($pwd) || empty($pwdrep)){

        $result=true;
    }else{
        $result=false;
    }
    return $result;
}


function invalidName($name){

    $result;
    
    if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){

        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidSurname($surname){

    $result;
    
    if(!preg_match("/^([a-zA-Z' ]+)$/",$surname)){

        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidUid($username){

    $result;
    
    if(!preg_match("/^[a-zA-Z0-9]+.*$/",$username)){

        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){

    $result;
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdrep){

    $result;
    
    if($pwd !== $pwdrep){

        $result=true;
    }else{
        $result=false;
    }
    return $result;
}


function uidExists($db,$username,$email){

    $sql="SELECT * FROM users WHERE username=? OR email=?;";
    $stmt=mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt,$sql)){

        header("Location: ../Maturalni_rad/usersignup.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if($row= mysqli_fetch_assoc($resultData)){

        return $row;

    }else{
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($db,$role,$name,$surname,$username,$pwd,$email){

    $sql="INSERT INTO users(role,name,surname,username,password,email) VALUES(?, ?, ?, ?, ?, ?);";
    $stmt=mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt,$sql)){

        header("Location: ../Maturalni_rad/usersignup.php?error=statementfailed");
        exit();
    }

    $hashedPwd= password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssssss",$role,$name,$surname,$username,$hashedPwd,$email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../Maturalni_rad/usersignup.php?error=none");
    exit();
}


function updateUser($db,$name,$surname,$username,$newpwd,$email){

    $userid=$_SESSION["ID"];

    $select= "SELECT * from users where id='$userid'";
    $sql = mysqli_query($db,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    if($res === $userid)
    {
   
       $update = "UPDATE users SET name='$name',surname='$surname',email='$email',username='$username',password='$newpwd' where id='$userid'";
       $sql2=mysqli_query($db,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:profilepage.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:profilepage.php');
       }
    }
    
 }


    

   /* $sql="UPDATE users SET name=$name,surname=$surname,username=$username,password=$newpwd, email=$email WHERE id=$userid";*/



function emptyInputLogin($username,$pwd){

    $result;
    
    if(empty($username) || empty($pwd)){ 

        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function checkPwd($db,$pwd){
    $pwdHashed = $usernameExists["password"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false)
    {
        header("Location: ../Maturalni_rad/profilepage?error=wrongpass");
         exit();
    }else{
        
    }
}

function loginUser($db,$username,$pwd)
{   
    $usernameExists = uidExists($db,$username,$username);

    if($usernameExists===false)
    {
        header("Location: ../Maturalni_rad/loginpage.php?error=wronglogin");
         exit();
    }

    $pwdHashed = $usernameExists["password"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false)
    {
        header("Location: ../Maturalni_rad/loginpage.php?error=wronglogin");
         exit();
    }elseif($checkPwd===true)
    {
        session_start();
        $_SESSION["ID"]=$usernameExists["id"];
        $_SESSION["username"]=$usernameExists["username"];
        $_SESSION["role"]=$usernameExists["role"];
        

        $_SESSION["name"]=$usernameExists["name"];
        $_SESSION["surname"]=$usernameExists["surname"];
        $_SESSION["email"]=$usernameExists["email"];
        $_SESSION["password"]=$usernameExists["password"];
        
        
        if($_SESSION["role"]=="admin"){

            header("location:indexpageAdmin.php");

        }else if($_SESSION["role"]=="profesor"){
            header("location:indexpageProf.php");
        }else if($_SESSION["role"]=="student"){
            header("location:indexpageStudent.php");
        }
        
       
         exit();

         
    }

    
}


