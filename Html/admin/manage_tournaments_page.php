
<?php
include '../../Php/api/getTournaments.php';
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
            
            <li><a href="../admin/admin_page.html">Home</a></li>
            <li><a href="../admin/manage_games_page.php">Manage Games</a></li>
            <li><a class="active"  href="../admin/manage_tournaments_page.php">Manage Tournaments</a></li>
            <li><a href="../admin/manage_users_page.html">Manage Users</a></li>
            <li><a href="../admin/dashboard.html">Dashboard</a></li>
            
          </ul>
    </div>

    <div class="everything">
      <div class="everything">
        <p style="text-align: center;font-size: 50px;">Tournaments</p>

        
        <div class="w3-container" style="overflow-y: scroll;height: 300px;">
        <ul class="w3-ul w3-card-4">
          <?php   
  
          foreach($_SESSION['all_tournaments'] as $tournament) {

        $name=$tournament['name'];
        $id=$tournament['id'];
        $email=$tournament['email'];
        echo "<li class='w3-display-container'>{$name} <form action='../../Php/api/deleteTournament.php' method='post'> <button type='submit' name='id' value='{$id}' class='w3-button w3-transparent w3-display-right'>&times;</button></form></li>";

        }
      ?>
          </ul>
       </div>

        <button onclick="document.getElementById('id01').style.display='block'" class="addbtn"> Add Tournament</button>

       <div id="id01" class="addgameModal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="../../Php/api/addTournament.php" method="post">
          <div class="container">
            <h1>Add Tournament</h1>
            <hr>
            <label for="tournament"><b>Tournament Name</b></label>
            <input id = "tournament" type="text" placeholder="Enter Tournament Name" name="tournament" required>

            <label for="email"><b>Organizer's Email</b></label>
            <input id = "email" type="text" placeholder="Enter Email" name="email" required>

            <label for="phone"><b>Organizer's Phone Number</b></label>
            <input id = "phone" type="text" placeholder="Enter Phone" name="phone" required>

            <label for="tournament_organizer"><b>Tournament Organizer</b></label>
            <input id = "tournament_organizer" type="text" placeholder="Enter Tournament Organizer" name="tournament_organizer" required>

            <label for="tournament_begin"><b>Tournament Begins</b></label>
            <input id = "tournament_begin" type="text" placeholder="Enter Tournament Begin" name="tournament_begin" required>

            <label for="tournament_end"><b>Tournament Ends</b></label>
            <input id = "tournament_end" type="text" placeholder="Enter Tournament End" name="tournament_end" required>

            <label for="game"><b>Select The Game</b></label>
            <div class="custom_select">
              <select required> 
                <option value="">Select</option>
                <option value="fortnite">Fortnite</option>
                <option value="csgo">CSGO</option>
                <option value="lol">League of Legends</option>
              </select>
            </div>

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