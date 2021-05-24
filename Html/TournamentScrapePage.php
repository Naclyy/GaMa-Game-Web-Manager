<?php
 session_start();
 include "../Php/api/getTournamentInfo.php";
 $_POST['id']=$_SESSION['tournament'][0]['game_id'];
 include "../Php/api/getGameInfo.php";
 ?>
<!DOCTYPE html>
<html>
    <head>

      <title>play? - Tournamets</title>
      <meta charset="UTF-8" />
      <link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
      <link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href = "../css/tournament_scrape_page.css" rel = "stylesheet">
    </head>

<body>

    <div class="disk disk_opened_right"></div>

    <div class="disk disk_opened_left">
      <div class="topnav">
        <a href="../Html/next_page_play.php">Go Back</a>
       </div>
        <div class="content">
          <div class="title"> 
              <h1> <?php echo $_SESSION['tournament'][0]['name']?></h1>
          </div>
          <div class="tournament_info">
              <?php echo "<img src='{$_SESSION['game_image_src']}'' alt = '{$_SESSION['tournament'][0]['name']}'>" ?> </p>
              <p> email : <?php echo $_SESSION['tournament'][0]['email']?> </p>
              <p> phone : <?php echo $_SESSION['tournament'][0]['phone']?> </p>
              <p> organizer : <?php echo $_SESSION['tournament'][0]['organizer']?> </p>
              <p> begin_date : <?php echo $_SESSION['tournament'][0]['begin_date']?> </p>
              <p> end_date : <?php echo $_SESSION['tournament'][0]['end_date']?> </p>
              
          </div>
            
        </div>
    </div>


 
</body>
</html>