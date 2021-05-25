<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>

        <title>play? - Account</title>
        <meta charset="UTF-8" />
        <link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
        <link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href = "../Css/accountpage.css" rel = "stylesheet">
    </head>

    <body>

        <div class="disk disk_opened_right"></div>

        <div class="disk disk_opened_left">

            <div class="topnav">
                <a href="../Html/next_page_play.php">Tournamets</a>
                <a class="active" href="" style="float:right;">Account</a>
            </div>
           
            

            <div class="content">
                <div class="accountinfo">
                    <p>Hi <?php echo $_SESSION['user_username'] ?> </p>
                    <p>Firstname : <?php echo $_SESSION['user_firstname'] ?> </p>
                    <p>Lastname : <?php echo $_SESSION['user_lastname'] ?> </p>
                    <p>Email : <?php echo $_SESSION['user_emailaddress'] ?> </p>
                </div>
                <button onclick = "location.href ='../Php/api/logout.php'" class="logoutbtn">Log out</button>
            </div>

            
          

            <div class="right_button">
                <a href="../Html/main_page_play.php"><img id="image" src="../Poze/right_arrow.png" alt = "Right Arrow"></a>
            </div>


        </div>
    </body>
</html>