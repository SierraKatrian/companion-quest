<?php

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Companion Quest</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Font Awesome icons -->
        <script src="https://use.fontawesome.com/2d7fe5a6b4.js"></script>
        <!-- CUSTOM CSS STYLESHEETS -->
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/header-and-footer.css">
        <link rel="stylesheet" href="css/create-a-game.css">

    </head>

    <body>
        
        <header>
            <div class="container-fluid content-wrapper">
                <a href="index.php"><img class="companionquest-logo" src="img/global/CompanionQuestLogo.png" alt="Companion Quest Logo" /></a>
                <nav class="nav-row row">                  
                    <ul class="left-links">
                        <li class="home">
                            <a href="index.php">home</a>
                        </li>
                        <li class="start-quest">START QUEST</li>
                    </ul>
                    <ul class="right-links">
                        <li class="register">
                            <a href="#" data-toggle="modal" data-target="#RegisterModal">register</a>
                        </li>
                        <li class="signin">
                            <a href="#" data-toggle="modal" data-target="#SignInModal">sign-in</a>
                        </li>
                        <li class="hamburger">
                            <a href="#" data-toggle="modal" data-target="#menu-modal">
                                <i class="fa fa-bars fa-2x" aria-hidden="true"></i>                        
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <!-- Menu Modal -->
        <div id="menu-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close menu-close" data-dismiss="modal"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></button>
              </div>                
                <div class="list-group">
                  <a href="index.php" class="list-group-item">HOME</a>
                  <a href="main-portal.php" class="list-group-item">START QUEST</a>
                  <a href="#RegisterModal" class="list-group-item">REGISTER</a>
                  <a href="#SignInModal" class="list-group-item">SIGN-IN</a>                
                </div>                  
            </div>
          </div>
        </div>
<?php

include "register.php";
include "signin.php";
echo $modalOpen;

?>