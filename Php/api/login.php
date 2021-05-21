<?php
//Headers

session_start();
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../models/user.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user = new User($db);

$result = $user->login($_POST["username"],$_POST["password"]);

if($result)
{   $_SESSION['user_id']=$user->getId();
    $_SESSION['user_username']=$user->getUsername();
    $_SESSION['user_password']=$user->getPassword();
    $_SESSION['user_firstname']=$user->getFirstname();
    $_SESSION['user_lastname']=$user->getLastname();
    $_SESSION['user_emailaddress']=$user->getEmailaddress();
    if($_SESSION['user_id'] == 1)
    {
     header("Location: ../../Html/admin/admin_page.html", true, 301);
    }
    else{
        
    header("Location: ../../Html/home_play.html", true, 301);
    }
    
}
else
{
    echo "Invalid User or Password";
}


  ?>
