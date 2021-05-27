
<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_POST['id'])){
    $_POST['tournament_id']=$_POST['id'];
    $_SESSION['tournament_id']=$_POST['id'];
} 
else {
    $_POST['tournament_id']=$_SESSION['tournament_id'];
}

include "../../Php/api/getTournamentInfo.php";
include "../../Php/api/getTournamentTeams.php";
?>
<!DOCTYPE html>
<html>
<head>

<title>play?</title>

<meta charset="UTF-8" />
<link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href = "../../Css/adminpages.css" rel = "stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

    <div class="content">
        <div class="logo">

        </div>
    <div class="navbar">
        <ul>

            <li><a href="../admin/manage_tournaments_page.php">Back to Tournaments</a></li>
        </ul>
    </div>

    <div class="everything">
    <div class="w3-container" style="overflow-y: scroll;height: 300px;">
         <h1 style = " text-align:center"><?php echo $_SESSION['tournament'][0]['name'];?>  Teams </h1>

         <ul class="w3-ul w3-card-4">
          <?php
          foreach($_SESSION['teams'] as $team) {
              $name=$team['user_team_name'];
              $id=$team['id'];
              $score=$team['score'];
              $_SESSION['team_id']=$id;
           echo "<li>{$team['user_team_name']}<form action='../../Php/api/updateTeamScore.php' method='post'><label for='score'>score</label><input type='text' id='score' name='score' placeholder='{$score}'><input type='submit' value='Submit'></form></li>";

        }
      ?>
          </ul>
       </div>
    </div>
</div>

 

 
</body>
</html>