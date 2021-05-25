<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user_tournament.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user_tournament = new User_tournament($db);

$result = $user_tournament->getTournamentTeams($_POST['tournament_id']);

$num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    $_SESSION['teams']= array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'user_id' => $user_id,
        'tournament_id' => $tournament_id,
        'user_team_name' => $user_team_name,
        'user_ign' => $user_ign,
        'user_rank' =>  $user_rank,
        'user_phone_number' => $user_phone_number,
        'score' => $score
      );

      array_push($_SESSION['teams'],$post_item);
    }
      

    // header("Location: ../../Html/main_page_play.php", true, 301);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Tournaments Found')
    );

}
?>