<?php
exec ('../../Php/api/getGames.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>

      <title>play?</title>
      <meta charset="UTF-8" />
      <link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
      <link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link href = "../../Css/adminpages.css" rel = "stylesheet">
  </head>

<body>

  <div class="content">
    <div class="logo">

    </div>
    <div class="navbar">
        <ul>
            
            <li><a href="../admin/admin_page.html">Home</a></li>
            <li><a class="active"  href="../admin/manage_games_page.php">Manage Games</a></li>
            <li><a href="../admin/manage_tournaments_page.html">Manage Tournaments</a></li>
            <li><a href="../admin/manage_users_page.html">Manage Users</a></li>
            <li><a href="../admin/dashboard.html">Dashboard</a></li>
            
          </ul>
    </div>

    <div class="everything">
        <p style="text-align: center;font-size: 50px;">Games</p>

        
        <div class="w3-container" style="overflow-y: scroll;height: 300px;">
          <ul class="w3-ul w3-card-4">
          <?php   
  
          foreach($_SESSION['all_games'] as $game) {

        $title=$game['title'];
        $id=$game['id'];
        echo "<li class='w3-display-container'>{$title} <span onclick='this.parentElement.style.display='none'' class='w3-button w3-transparent w3-display-right'>&times;</span></li>";

        }
      ?>
          </ul>
       </div>

        <button onclick="document.getElementById('id01').style.display='block'" class="addbtn"> Add game</button>

       <div id="id01" class="addgameModal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="../../Php/api/addGame.php" method="post">
          <div class="container">
            <h1>Add game</h1>
            <hr>
            <label for="title"><b>game name</b></label>
            <input id = "title" type="text" placeholder="Enter Game Name" name="title" required>

            <label for="url"><b>game url</b></label>
            <input id = "url" type="text" placeholder="Enter Game Url" name="url" required>

            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="submit" class="enterbtn">Enter</button>
            </div>
          </div>
        </form>

   
    
      </div>
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