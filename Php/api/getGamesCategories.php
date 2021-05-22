<?php
//Headers


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);

$result=$game->getGamesCategories();

$num=$result->rowCount();

if($num > 0) {
    $_SESSION['all_categories']= array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      array_push($_SESSION['all_categories'],$category);
    }
      

    // header("Location: ../../Html/main_page_play.php", true, 301);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Games Found')
    );

}


?>