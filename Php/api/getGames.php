<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);

$result = $game->getGames();

$num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    $_SESSION['all_games']= array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'title' => $title,
        'url' => $url,
        'category' => $category
      );

      array_push($_SESSION['all_games'],$post_item);
    }
      

    // header("Location: ../../Html/main_page_play.php", true, 301);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Games Found')
    );

}
?>

<!DOCTYPE html>
<html>
    <head>

      <title>test</title>

    </head>

<body>

</body>
</html>

