<?php
//Headers
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user_game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user_game = new User_game($db);

$user_id=$_SESSION['user_id'];
$game_id=$_POST['id'];

$result=$user_game->exists($user_id,$game_id);
$num = $result -> rowCount();
if($num == 0)
{
$result=$user_game->addGame($user_id,$game_id);
echo json_encode(1);
}
else
{
    echo json_encode(0);
}


?>