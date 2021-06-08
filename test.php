<?php
include_once dirname(__FILE__) . '../Php/HtmlParse/simple_html_dom.php';
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
$url='https://store.steampowered.com/app/381210/Dead_by_Daylight/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: birthtime=943999201 wants_mature_content=1 lastagecheckage=1-0-2000"));
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
));
$str = curl_exec($ch);

// Create a DOM object
$html = new simple_html_dom();
// Load HTML from a string
$html->load($str);

// $html = json_encode($string);
// echo $html;
$category=$html->find(".glance_tags.popular_tags",0)->first_child()->plaintext;
$category = preg_replace("/\s+/", "", $category);
$title = $html->find(".apphub_AppName",0)->plaintext;
$url = str_replace(" ", "", $url);
$test = $html->find(".game_rating_icon",0);
curl_close($ch);

echo $category;

?>