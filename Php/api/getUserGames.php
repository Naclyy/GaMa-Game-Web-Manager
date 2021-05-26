<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/game.php';
include_once dirname(__FILE__) . '/../models/user_game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);
$user_game=new User_game($db);
$user_id=$_SESSION['user_id'];
$result_games = $user_game->getGamesAssigned($user_id);

$num = $result_games->rowCount();

$games=array();
  
  if($num > 0) {
   
    while($row = $result_games->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      array_push($games,$game_id);
    }

  } 


$_SESSION['all_user_games']= array();

  foreach($games as $game_id)
  {
    
    $result= $game->getGameInfo($game_id);
    if($num > 0) {
        
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
    
          $post_item = array(
            'id' => $id,
            'title' => $title,
            'url' => $url,
            'category' => $category
          );
    
          array_push($_SESSION['all_user_games'],$post_item);
        }
          
    
       
    
      } 
         
       
  
}


?>

