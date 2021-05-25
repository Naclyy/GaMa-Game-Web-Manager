<?php
 session_start();
 include "../Php/api/getTournamentInfo.php";
 $_POST['id']=$_SESSION['tournament'][0]['game_id'];
 include "../Php/api/getGameInfo.php";
 include "../Php/api/getTournamentTeams.php";
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
              <?php echo "<img src='{$_SESSION['game_image_src']}'' alt = '{$_SESSION['tournament'][0]['name']}'>" ?>
              <p> email : <?php echo $_SESSION['tournament'][0]['email']?> </p>
              <p> phone : <?php echo $_SESSION['tournament'][0]['phone']?> </p>
              <p> organizer : <?php echo $_SESSION['tournament'][0]['organizer']?> </p>
              <p> begin_date : <?php echo $_SESSION['tournament'][0]['begin_date']?> </p>
              <p> end_date : <?php echo $_SESSION['tournament'][0]['end_date']?> </p>
              
          </div>

          <div class="tournament_ranking">
          <h1> Tournament Ranking </h1>
          <ul>
          <?php
               for($id = 0 ; $id < sizeof($_SESSION['teams']);$id++)
               {
                 $team_name=$_SESSION['teams'][$id]['user_team_name'];
                 $score = $_SESSION['teams'][$id]['score'];
                  if( $id == 0)
                  {
                          echo "<li class='place1'> {$team_name}<p> score : {$score} </p> </li>";
                  }
                  else { if( $id == 1)
                        {
                          echo "<li class='place2'> {$team_name}<p> score : {$score} </p> </li>";
                        }
                        else
                        { if( $id == 2)
                          {
                            echo "<li class='place3'> {$team_name}<p> score : {$score} </p> </li>";
                          }
                          else{
                            echo "<li> {$team_name}<p> score : {$score} </p> </li>";
 
                          }

                        }

                  }
                  
                  
               }
        ?>
           </ul> 
          </div>
          <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Register</button>
        </div>

       
        
        <div id="id01" class="registerTournament">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                      <form class="modal-content" action="../Php/api/addTournamentTeam.php" method="post">
                          <div class="container">
                              <h1>Register Tournament</h1>
                              <p>Please fill in this form to register Tournament.</p>
                              <hr>
                              
                              <label for="TeamName"><b>Team Name</b></label>

                              <input id = "TeamName" type="text" placeholder="Enter Team Name" name="TeamName" required>

                              <label for="IGN"><b>In game name</b></label>

                              <input id = "IGN" type="text" placeholder="Enter IGN" name="IGN" required>

                              <label for="Rank"><b>Rank</b></label>

                              <input id = "Rank" type="text" placeholder="Enter Rank" name="Rank" required>

                              <label for="phonenumber"><b>Phone Number</b></label>

                              <input id = "phonenumber" type="phonenumber" name="phonenumber"
                                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                required placeholder="Enter Phone Number">
                                <small>Nubmer Format: 123-456-7890</small>
                                <p>&nbsp;</p>         
      
                                  <div class="clearfix">
                                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                        <button type="submit" class="registerbtn">Register</button>
                                  </div>
                            </div>
                       </form>

    </div>

    <script>
  // Get the modal
  var modal = document.getElementById('id01');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
 
</body>
</html>