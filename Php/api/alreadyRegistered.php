<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user_tournament.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user_tournament = new User_tournament($db);

$result = $user_tournament->exists($_SESSION['user_id'],$_SESSION['tournament'][0]['id']);

$num = $result->rowCount();
if($num > 0)
{
   $_SESSION['alreadyregistered']=1;
}


?>