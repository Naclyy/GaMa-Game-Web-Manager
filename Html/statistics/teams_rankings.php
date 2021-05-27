
<?php
include '../../Php/api/getUsersByScore.php';
?>
<!DOCTYPE html>
<html>
<head>

<title>play?</title>
<meta charset="UTF-8" />
<link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
<link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href = "../../Css/adminpages.css" rel = "stylesheet">
<style>
   


  </style>
</head>

<body>

    <div class="content">
        <div class="logo">

        </div>
    <div class="navbar">
        <ul>
            
            <li><a  href="../statistics/game_rankings.php">Stars</a></li>
            <li><a href="../statistics/game_number_rankings.php">Comments Number</a></li>
            <li><a class="active" href="../statistics/teams_rankings.php">Teams Score</a></li>
            <li><a href="../statistics/popular_game.php">Popular Game</a></li>
            
            <li><a href="../main_page_play.php">X</a></li>

          </ul>
    </div>

    <div class="everything">
        
        <p style="text-align: center;font-size: 50px;">Ranking by Score</p>

        
        <div class="w3-container" style="overflow-y: scroll;height: 300px;">
        <ul class="w3-ul w3-card-4">
          <?php   
          foreach($_SESSION['all_users_score'] as $game) {

        $title = $game['user_team_name'];
        $rating = $game['scores'];
        if($rating == NULL)
        $rating = 0;
        echo "<li class='w3-display-container'>{$title} <p class='w3-button w3-transparent w3-display-right'>{$rating}</p></li>";

        }
      ?>
          </ul>

    </div>
</div>

 

 
</body>
</html>