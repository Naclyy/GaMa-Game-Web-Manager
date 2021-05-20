<?php
//Headers

session_start();


include_once '../config/database.php';
include_once '../models/game.php';
include_once '../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);

$result = $game->getGames();

$num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'title' => $title,
        'url' => $url
      );

    $html = file_get_html($url);

    $postDiv=$html->find('.game_header_image_full',0);
    $src=$postDiv->attr['src'];
    echo "<img src='{$src}'>";
 
    

      
    }

    

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

