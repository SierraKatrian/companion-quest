<?php

include "register.php";

$userArray = $_SESSION['user'];

$userFirstName = $userArray['f_name'];
$userLastName = $userArray['l_name'];

if(isset($_POST['signOut'])){
    unset($_SESSION['user']);
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
    exit();
}

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
                <img class="profile-pic" src="img/global/profilepic.png" alt="profile picture" />
                <nav class="nav-row row">                  
                    <ul class="left-links">
                        <li class="home"><a href="index.php">home</a></li>
                        <li class="start-quest-link"><a href="main-portal.php">START QUEST</a></li>
                    </ul>
                    <ul class="right-links">
                        <a href="#" class="dropdown-toggle profile-name" data-toggle="dropdown"><?echo $userFirstName . " " . $userLastName ?><span class="caret"></span></a>
                          <form  action="" method="post" name="signInForm" class="dropdown-menu dropdown-menu-right">
                              <span class="glyphicon glyphicon-cog"></span><input type="submit" class="menu-dropdown-btn btn btn-link" name="settings" value="Settings" /><br />
                              <span class="glyphicon glyphicon-user"></span><input type="submit" class="menu-dropdown-btn btn btn-link" name="signOut" value="SignOut" />
                          </form>
                    </ul>
                </nav>
            </div>
        </header>
        
<?php
        
include "signin.php";
        
?>