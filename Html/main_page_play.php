<?php

include '../Php/api/getGames.php';
include '../Php/api/getGamesCategories.php';
include '../Php/api/getUserGames.php';
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>

<body>
<div class="disk disk_opened_right">
  
  <div class="itemsbar">
    <div class="searchbox">
      <input type="text" id="myInput" onkeyup="searchGameFilter()" placeholder="Search for game.." title="Type in a name">
    </div>

    <div class="dropdown">
      <button class="dropbtn">Sort</button>
    <div class="dropdown-content sort">
      <button class="btn" onclick="sortByName(0)"> by name asc</button>
      <button class="btn" onclick="sortByName(1)"> by name desc</button>
      <button class="btn" onclick="sortByRating(0)"> by rating asc</button>
      <button class="btn" onclick="sortByRating(1)"> by rating desc</button>
    </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Category</button>
    <div id="categories" class="dropdown-content categories">
      <button class="btn active" onclick="filterSelection('all')"> ShowAll</button>

      <?php
      foreach($_SESSION['all_categories'] as $category) {
        echo "<button class='btn' onclick=\"filterSelection('{$category}')\">{$category}</button>";
        }
      ?>

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
        <button class="btn" onclick="sortbyName(0)"> by name asc</button>
        <button class="btn" onclick="sortByName(1)"> by name desc</button>
        <button class="btn" onclick="sortByRating(0)"> by rating asc</button>
        <button class="btn" onclick="sortByRating(1)"> by rating desc</button>
      </div>
      </div>
      
      <div class="dropdown">
        <button class="dropbtn">Category</button>
        <div id="allcategories" class="dropdown-content">
         <button class="btn" onclick="filterSelectionAll('all')"> ShowAll</button>

         <?php
         foreach($_SESSION['all_categories'] as $category) {
          echo "<button class='btn' onclick=\"filterSelectionAll('{$category}')\">{$category}</button>";
          echo nl2br("\n");
          }
         ?>
      
        </div>
      </div>
    </div>
    <div class="games_gallery">
      <?php   
  
      foreach($_SESSION['all_games'] as $game) {

        
        $html = file_get_html($game['url']);
        $postDiv=$html->find('.game_header_image_full',0);
         $src=$postDiv->attr['src'];
         $title=$game['title'];
        $id=$game['id'];
          $category=$game['category'];
          echo "<div class='game allFilter {$category}' id='{$title}'>";
          echo "<img src='{$src}' alt = '{$title}'>";
          echo '<form action="../Html/GameScrapePage.php" method="post">';
          echo '<button value="' . $id . '" type="submit" name="id" class="infobtn">Info</button>';
          echo '</form>';
          echo '<form action="../Php/api/addUserGame.php" method="post">';
          echo '<button value="' . $id . '" type="submit" name="id" class="addbtn">Add</button>';
          echo '</form>';
          echo '</div>'; 
         }
      ?>
    </div>
    
      <script>
          //category
          filterSelectionAll("all")
          function filterSelectionAll(c) {
            var x, i;
             x = document.getElementsByClassName("game allFilter");
            if (c == "all") c = "";
              for (i = 0; i < x.length; i++) {
             w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
          }

         function w3AddClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
          }
          } 

          function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
             while (arr1.indexOf(arr2[i]) > -1) {
               arr1.splice(arr1.indexOf(arr2[i]), 1);     
             }
            }
            element.className = arr1.join(" ");
           }
          
          var btnContainer = document.getElementById("allcategories");
          var btns = btnContainer.getElementsByClassName("btn");
          for (var i = 0; i < btns.length; i++) {
           btns[i].addEventListener("click", function(){
           var current = document.getElementsByClassName("active");
           current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
           });
          }

        </script>
      
      </div>

</div>
  

</div>
  

  <div class="content">
    <div class="left_button">
      <a href="../Html/next_page_play.php"><img id="image" src="../Poze/left_arrow.png" alt = "Left Arrow"></a>
   </div>
  <div class="games_gallery" >

  <?php   
  
      foreach($_SESSION['all_user_games'] as $game) {

        
        $html = file_get_html($game['url']);
        $postDiv=$html->find('.game_header_image_full',0);
         $src=$postDiv->attr['src'];
         $title=$game['title'];
         $id=$game['id'];
          $category=$game['category'];
          echo "<div class='game Filter {$category}' id='{$title}'>";
          echo "<img src='{$src}' alt = '{$title}'>";
          echo '<form action="../Html/GameScrapePage.php" method="post">';
          echo '<button value="' . $id . '" type="submit" name="id" class="infobtn">Info</button>';
          echo '</form>';
          echo '<form action="../Php/api/deleteUserGame.php" method="post">';
          echo '<button value="' . $id . '" type="submit" name="id" class="deletebtn">Delete</button>';
          echo '</form>';
          echo '</div>';
         }
      ?>

    
    
  </div>

  <script>
          //category
          filterSelection("all")
          function filterSelection(c) {
            var x, i;
             x = document.getElementsByClassName("game Filter");
            if (c == "all") c = "";
              for (i = 0; i < x.length; i++) {
             w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
          }

         function w3AddClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
          }
          } 

          function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
             while (arr1.indexOf(arr2[i]) > -1) {
               arr1.splice(arr1.indexOf(arr2[i]), 1);     
             }
            }
            element.className = arr1.join(" ");
           }

          // Add active class to the current button (highlight it)
          var btnContainer = document.getElementById("categories");
          var btns = btnContainer.getElementsByClassName("btn");
          for (var i = 0; i < btns.length; i++) {
           btns[i].addEventListener("click", function(){
           var current = document.getElementsByClassName("active");
           current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
           });
          }

        </script>

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