
<?php
include '../../Php/api/getTournaments.php';
include '../../Php/api/getGames.php';
include '../../Php/api/getComments.php';
include '../../Php/api/getUsers.php';
?>
<!DOCTYPE html>
<html>
<head>

<title>play?</title>

<meta charset="UTF-8" />
<link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href = "../../Css/dashboard.css" rel = "stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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
            <li><a href="../admin/manage_users_page.php">Manage Users</a></li>
            <li><a class="active" href="../admin/dashboard.php">Dashboard</a></li>
          </ul>
    </div>

    <div class="everything">
        <div class = "cardBox">
            <div class = "card">
                <div>
                    <div class="numbers">
                    <?php
                            $number = 0;
                            foreach($_SESSION['all_users'] as $users) {
                                $number = $number + 1;
                            }
                                echo "{$number}";
                                
                            ?>
                    </div>
                    <div class="cardName">Users</div>
                </div>
                <div class="iconBox">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class = "card">
                <div>
                <div class="numbers">
                <?php
                            $number = 0;
                            foreach($_SESSION['all_games'] as $games) {
                                $number = $number + 1;
                            }
                                echo "{$number}";
                                
                            ?>
                </div>
                <div class="cardName">Games</div>
            </div>
            <div class="iconBox">
                <i class="fas fa-gamepad"></i>
            </div>
        </div>
            <div class = "card">
                <div>

                <div class="numbers">
                <?php
                            $number = 0;
                            foreach($_SESSION['all_tournaments'] as $tournament) {
                                $number = $number + 1;
                            }
                                echo "{$number}";
                                
                            ?>
                </div>
                <div class="cardName">Tournaments</div>
            </div>
            <div class="iconBox">
                <i class="fas fa-trophy"></i>
            </div>
        </div>
            <div class = "card">
                <div>
                <div class="numbers">
                <?php
                            $number = 0;
                            foreach($_SESSION['all_comments'] as $comments) {
                                $number = $number + 1;
                            }
                                echo "{$number}";
                                
                            ?>
                </div>
                <div class="cardName">Comments</div>
            </div>
            <div class="iconBox">
                <i class="fas fa-comments"></i>
            </div>
        </div>
        </div>
        <div>
            <button class="button" >Download Statistics</button>
                <!-- download button-->
        </div>
    </div>
</div>

 


</body>
</html>