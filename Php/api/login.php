<?php
//Headers
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user.php';

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

   echo $_SESSION['user_id'];
 
}
else
{
    echo false;
}


  ?>
