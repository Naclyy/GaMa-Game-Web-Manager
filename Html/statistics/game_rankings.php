
<?php
include '../../Php/api/getGames.php';
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
            
            <li><a  class="active" href="../statistics/game_rankings.php">Game_Ranking</a></li>
          </ul>
    </div>

    <div class="everything">
        <p style="text-align: center;font-size: 50px;">Ranking by Stars</p>

        
        <div class="w3-container" style="overflow-y: scroll;height: 300px;">
        <ul class="w3-ul w3-card-4">
          <?php   
          foreach($_SESSION['all_games'] as $game) {

        $title = $game['title'];
        $rating = $game['rating'];
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