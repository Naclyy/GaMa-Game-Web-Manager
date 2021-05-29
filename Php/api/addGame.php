<?php
//Headers

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);

$html=file_get_html($_POST['url']);
$category=$html->find(".glance_tags.popular_tags",0)->first_child()->plaintext;
$category = preg_replace("/\s+/", "", $category);
$title = $html->find(".apphub_AppName",0)->plaintext;
$url = str_replace(" ", "", $_POST["url"]);


$result = $game->addGame($title,$url,$category);

echo json_encode($result);

?>