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
                  echo '<button class="register" onclick="document.getElementById(\'id01\').style.display=\'block\'">Register</button>';
                  echo '<form action="../Html/TournamentScrapePage.php" method="post">';
                  echo "<button  class='infobtn' value='{$id}' name='tournament_id'>Info</button>";
                  echo '</form>';
                  echo '<p style="color:white;text-align: center;">League Of Legends</p>';
                  echo '</div>';
          
                  }

                 ?>
                  <div id="id01" class="registerTournament">
                      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                      <form class="modal-content" action="/action_page.php">
                          <div class="container">
                              <h1>Register Tournament</h1>
                              <p>Please fill in this form to registerTournament.</p>
                              <hr>
           
                              <label for="TeamName"><b>Team Name</b></label>

                              <input id = "TeamName" type="text" placeholder="Enter Team Name" name="TeamName" required>

                              <label for="IGN"><b>In game name</b></label>

                              <input id = "IGN" type="text" placeholder="Enter IGN" name="IGN" required>

                              <label for="Rank"><b>Rank</b></label>

                              <input id = "Rank" type="text" placeholder="Enter Rank" name="Rank" required>

                              <label for="phonenumber"><b>Phone Number</b></label>

                              <input id = "phonenumber" type="tel" name="phone"
                                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                required placeholder="Enter Phone Number">
                                <small>Nubmer Format: 123-456-7890</small>
                                <p>&nbsp;</p>          
            
           
      
                              <p>By registering to this tournament you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
      
                                  <div class="clearfix">
                                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                        <button type="submit" class="registerbtn">Register</button>
                                  </div>
                            </div>
                       </form>
                  </div>



                </div>

          </div>
          <div class="right_button">
              <a href="../Html/main_page_play.php"><img id="image" src="../Poze/right_arrow.png" alt = "Right Arrow"></a>
          </div>

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