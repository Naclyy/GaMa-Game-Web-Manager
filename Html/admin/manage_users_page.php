
<?php
include '../../Php/api/getUsers.php';
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
            <li><a href="../admin/manage_tournaments_page.php">Manage Tournaments</a></li>
            <li><a  class="active" href="../admin/manage_users_page.php">Manage Users</a></li>
            <li><a href="../admin/dashboard.php">Dashboard</a></li>
            
          </ul>
    </div>

    <div class="everything">
        <p style="text-align: center;font-size: 50px;">Tournaments</p>

        
        <div class="w3-container" style="overflow-y: scroll;height: 300px;">
        <ul class="w3-ul w3-card-4">
          <?php   
  
          foreach($_SESSION['all_users'] as $users) {

        $name=$users['username'];
        $id=$users['id'];
        echo "<li class='w3-display-container'>{$name} <form action='../../Php/api/deleteUser.php' method='post'> <button type='submit' name='id' value='{$id}' class='w3-button w3-transparent w3-display-right'>&times;</button></form></li>";

        }
      ?>
          </ul>

    </div>
</div>

 

 
</body>
</html>