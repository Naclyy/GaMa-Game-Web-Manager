<?php
//Headers


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user_game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user_game = new User_game($db);

$user_id=$_SESSION['user_id'];
$game_id=$_POST['id'];

$user_game->deleteGame($user_id,$game_id);

header('Location: ../../Html/main_page_play.php', true, 301);

?>