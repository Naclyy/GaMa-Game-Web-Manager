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
if(!($game->exists($_POST['url'])))
{
$html=file_get_html($_POST['url']);
if($html->find(".glance_tags.popular_tags",0) == null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: birthtime=943999201 wants_mature_content=1 lastagecheckage=1-0-2000"));
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $_POST['url']
    ));
    $str = curl_exec($ch);
    $html = new simple_html_dom();
    $html->load($str);
    curl_close($ch);
}
$category=$html->find(".glance_tags.popular_tags",0)->first_child()->plaintext;
$category = preg_replace("/\s+/", "", $category);
$title = $html->find(".apphub_AppName",0)->plaintext;
$url = str_replace(" ", "", $_POST["url"]);
$test = $html->find(".game_rating_icon",0);
if($test != null)
{
$pegi = $test->first_child()->first_child()->src;
$pegi_age = preg_replace('/[^0-9]/', '', $pegi);
}
else
{
    $pegi_age=0;
}


$result = $game->addGame($title,$url,$category,$pegi_age);

echo json_encode($result);
}
else
{
    echo json_encode(0);
}
?>