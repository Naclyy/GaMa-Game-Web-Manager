<?php
//Headers

session_start();


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);

$result = $game->getGameInfo($_POST["id"]);

$num = $result->rowCount();

  
  if($num == 1) {
    
   
   

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'title' => $title,
        'url' => $url
      );
    }

    $html = file_get_html($url);
    
    $postDiv=$html->find('.game_header_image_full',0);
    $src=$postDiv->attr['src'];
    $info=$html->find('#game_area_description',0)->innertext;
    $system=$html->find('.game_page_autocollapse.sys_req',0)->innertext;
    $video=$html->find('.highlight_player_item.highlight_movie',0)->attr['data-mp4-hd-source'];

    $_SESSION['game_title'] = $title ;
    $_SESSION['game_image_src'] = $src;
    $_SESSION['game_info'] = $info;
    $_SESSION['game_video_src'] = $video;
    $_SESSION['game_system_req'] = $system;
    $_SESSION['game_screenshots_src'] = array();


  
  
 
    
    foreach($html->find('.highlight_player_item.highlight_screenshot') as $a)
    {
      $img=$a->find('.screenshot_holder',0)->find('.highlight_screenshot_link',0)->attr['href'];
      array_push($_SESSION['game_screenshots_src'],$img);
    }
 
  
    header("Location: ../../Html/GameScrapePage.php", true, 301);
    
 
      
    

    

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Games Found')
    );

}
  ?>
