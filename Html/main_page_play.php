<?php

session_start();
include_once "../Php/HtmlParse/simple_html_dom.php";

?>
<!DOCTYPE html>
<html>
    <head>

      <title>play? - Games</title>
      <meta charset="UTF-8" />
      <link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
      <link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href = "../css/style.css" rel = "stylesheet">
    </head>

<body>
<div class="disk disk_opened_right">
  
  <div class="itemsbar">
    <div class="searchbox">
      <input type="text" id="myInput" onkeyup="searchGameFilter()" placeholder="Search for game.." title="Type in a name">
    </div>

    <div class="dropdown">
      <button class="dropbtn">Sort</button>
    <div class="dropdown-content">
      <button class="btn" onclick="sortByName(0)"> by name asc</button>
      <button class="btn" onclick="sortByName(1)"> by name desc</button>
      <button class="btn" onclick="sortByRating(0)"> by rating asc</button>
      <button class="btn" onclick="sortByRating(1)"> by rating desc</button>
    </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Category</button>
    <div class="dropdown-content">
      <button class="btn" onclick="filterSelection('all')"> ShowAll</button>
      <button class="btn" onclick="filterSelection('cars')"> Shooters</button>
      <button class="btn" onclick="filterSelection('animals')"> RPG</button>
      <button class="btn" onclick="filterSelection('colors')"> Multyplayer</button>
    </div>
  </div>
  
  <button id="myBtnToAllGames" class="dropbtn">Add Game</button>

<!-- The Modal -->
<div id="AllGames" class="AllGames">

  <!-- Modal content -->
  <div class="AllGames-content">
    <span class="close">&times;</span>
    <div class="itemsbar">
      <div class="searchbox">
        <input type="text" id="myInput2" onkeyup="searchGameFilter()" placeholder="Search for game.." title="Type in a name">
      </div>
      <div class="ranking">
        <button onclick = "location.href ='../Chart/statistics.html'" class="dropbtn">Ranking</button>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Sort</button>
      <div class="dropdown-content">
        <button class="btn" onclick="sortByName(0)"> by name asc</button>
        <button class="btn" onclick="sortByName(1)"> by name desc</button>
        <button class="btn" onclick="sortByRating(0)"> by rating asc</button>
        <button class="btn" onclick="sortByRating(1)"> by rating desc</button>
      </div>
      </div>
      
      <div class="dropdown">
        <button class="dropbtn">Category</button>
      <div class="dropdown-content">
        <button class="btn" onclick="filterSelection('all')"> ShowAll</button>
        <button class="btn" onclick="filterSelection('cars')"> Shooters</button>
        <button class="btn" onclick="filterSelection('animals')"> RPG</button>
        <button class="btn" onclick="filterSelection('colors')"> Multyplayer</button>
      </div>
    </div>
    </div>
    <div class="games_gallery" >
      <?php   
  
    foreach($_SESSION['all_games'] as $game) {

    
    $html = file_get_html($game['url']);
    $postDiv=$html->find('.game_header_image_full',0);
    $src=$postDiv->attr['src'];
    $title=$game['title'];
    $id=$game['id'];
    echo '<div class="game">';
    echo "<img src='{$src}' alt = '{$title}'>";
    echo '<form action="../Php/api/getGameInfo.php" method="post">';
    echo '<button value="' . $id . '" type="submit" name="id" class="infobtn">Info</button>';
    echo '</form>';
    echo '<button class="addbtn">Add</button>';
    echo '</div>';

 
    

      
    }
?>
    </div>
  </div>

</div>
  

</div>
  

  <div class="content">
    <div class="left_button">
      <a href="../Html/next_page_play.html"><img id="image" src="../Poze/left_arrow.png" alt = "Left Arrow"></a>
   </div>
  <div class="games_gallery" >
    <div class="game">
      <a href="../Game_Informations_HTML/csgo_information.html"><img src="../Poze/GamesLogo/Slide_Show_CSGO.jpg" alt = "CSGO Picture"></a>
    </div>
    <div class="game">
      <a href="../Game_Informations_HTML/cyberpunk_information.html"><img src="../Poze/GamesLogo/Slide_Show_Cyberpunk.jpg" alt = "CyberPunk Picture"></a>
    </div>
    <div class="game">
      <a href="../Game_Informations_HTML/league_information.html"><img src="../Poze/GamesLogo/Slide_Show_LOL.jpg" alt = "LOL Picture"></a>
    </div>
    
    
  </div>
</div>

</div>
<div class="disk disk_opened_left">
  
    
   

</div>


<script>
  // Get the modal
  var modal = document.getElementById("AllGames");
  
  // Get the button that opens the modal
  var btn = document.getElementById("myBtnToAllGames");
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>

 
</body>
</html>