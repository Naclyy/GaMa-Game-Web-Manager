<?php 
include '../Php/api/getTournaments.php';

?>
<!DOCTYPE html>
<html>
    <head>

      <title>play? - Tournamets</title>
      <meta charset="UTF-8" />
      <link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
      <link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href = "../css/nextpage.css" rel = "stylesheet">
    </head>

    <body>

      <div class="disk disk_opened_right"></div>

      <div class="disk disk_opened_left">
          <div class="topnav">
              <a class="active" href="">Tournamets</a>
              <a href="../Html/account_page_play.php" style="float:right;">Account</a>
          </div>
          <div class="content">
               <div class="tournament_gallery">

                 <?php
                 foreach($_SESSION['all_tournaments'] as $tournament) {

                  $name=$tournament['name'];
                  $id=$tournament['id'];
                  $email=$tournament['email'];
                  $_POST['id']=$tournament['game_id'];
                  include "../Php/api/getGameInfo.php";

                  echo '<div class="tournament">';
                  echo "<img src='{$_SESSION['game_image_src']}'' alt = '{$name}'>";
                  echo '<form action="../Html/TournamentScrapePage.php" method="post">';
                  echo "<button  class='openbtn' value='{$tournament['id']}' name='tournament_id'>open</button>";
                  echo '</form>';
                  echo "<p style='color:white;text-align: center;'>{$name}</p>";
                  echo '</div>';
          
                  }

                 ?>
                 </div>
           </div>
                 
          <div class="right_button">
              <a href="../Html/main_page_play.php"><img id="image" src="../Poze/right_arrow.png" alt = "Right Arrow"></a>
          </div>

      </div>

 
    </body>
</html>