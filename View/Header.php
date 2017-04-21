<?php

    require_once "Models/DbConnect.php";
    require_once "Models/UsersDAO.php";
    require_once "Models/GameDAO.php";
    require_once "Models/Avatar.php";
    require_once "Models/MapsDAO.php";
    // require_once "Models/errorlog/errorhandle.php";


    $db = DbConnect::getDB();
    $u = new UsersDAO($db);
    $users = $u->listUsers();

    session_start();

    if(empty($_SESSION['user'])){

        include "View/Modals/navbar-register.php";
        include "View/Modals/navbar-signin.php";
        $startquestNavTitle = "";
        $rightNavLinkMsg = "";
        $rightNavLink1 = "<a href='#' class='register-btn' data-toggle='modal' data-target='#navbar-register'> register </a>";
        $rightNavLink2 = "<a href='#' data-toggle='modal' data-target='#navbar-signin'> sign in </a>";

        //show register and sign in buttons on homepage
        $showRegisterSigninBtns = "
            <div class='btn-group register-btn' data-toggle='modal' data-target='#navbar-register'>
                <button type='button' class='large-btn btn btn-primary'>Register</button>
            </div>
            <div class='btn-group signin-btn' data-toggle='modal' data-target='#navbar-signin'>
                <button type='button' class='large-btn btn btn-primary'>Sign In</button>
            </div>
            ";

    } else {

        //assign variables
        $userArray = $_SESSION['user'];
        $userFullName = $userArray['f_name'] . " " . $userArray['l_name'];

        //modify the navigation text to say "start quest!"
        $startquestNavTitle = "<a href='Main-Portal.php'> start quest! </a>";

        //modify the navigation text to hold user names with drop down menu
        $rightNavLinkMsg = '<div class="chat-dropdown">
                                <a href="#"><i class=\'fa fa-envelope-o fa-lg\' aria-hidden=\'true\'></i>Messages</a>
                                 <div id="chats" class="chat-dropdown-content">
                                   <ul id="chatList">



                                    </ul>
                                     <button id="newChat" type="button">New Chat</button>
                                 </div>

                             </div>';


/*THIS IS WHAT JESSICA M IS USING TO TRY AND DISPLAY THE SUPERUSER LINK*/

       if ($userArray['permissions'] == "1") {

           $rightNavLink1 = "
       <div class='dropdown'>
         <a class='dropbtn'>" . $userFullName . "<span class='caret'></span></a>
         <form action='' method='post' name='signInForm' class='dropdown-content'>
           <a href='#' class='border-bottom'><span class='glyphicon glyphicon-user'></span>&nbsp;&nbsp;<input type='submit' class='dropdown-Link' name='signOutUser' value='SignOut'/></a>
          </form>
       </div>
       ";

           //modify the navigation text to hold user profile pic
           $rightNavLink2 = "<div id='avatar-container'></div>";

           //hide register and sign in buttons on homepage
           $showRegisterSigninBtns = "";



   }else if ($userArray['permissions'] == "2") {

   $rightNavLink1 = "
       <div class='dropdown'>
           <a class='dropbtn'>" . $userFullName . "<span class='caret'></span></a>
           <form action='' method='post' name='signInForm' class='dropdown-content'>
            <!--THIS IS THE SUPERUSER LINK-->
            <a href='superUserView.php' class='border-bottom'><span class='glyphicon glyphicon-edit'></span>&nbsp;&nbsp; Users </a>
           <a href='#' class='border-bottom'><span class='glyphicon glyphicon-user'></span>&nbsp;&nbsp;<input type='submit' class='dropdown-Link' name='signOutUser' value='SignOut'/></a>

          </form>
       </div>
       ";

    //modify the navigation text to hold user profile pic
    $rightNavLink2 = "<div id='avatar-container'></div>";

    //hide register and sign in buttons on homepage
    $showRegisterSigninBtns = "";

}




    }

    //DROP DOWN FUNCTIONS

        //edit function
        if(isset($_POST['editUser'])){
            $userArray = $_SESSION['user'];
            $fname = $userArray['f_name'];
            $lname = $userArray['l_name'];
            $username = $userArray['userName'];
            $email = $userArray['email'];
            $password = $userArray['password'];
        }

        //sign out function
        if(isset($_POST['signOutUser'])){
            unset($_SESSION['user']);
            $_SESSION = array();
            session_destroy();
            header('Location: index.php');
            $alertMessage = "You have been signed out";
            exit();
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Companion Quest</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Font Awesome icons -->
    <script src="https://use.fontawesome.com/2d7fe5a6b4.js"></script>
    <!-- CUSTOM CSS STYLESHEETS -->
    <link rel="stylesheet" href="Style/global.css">
    <link rel="stylesheet" href="Style/pm.css" >
    <!-- CUSTOM JAVASCRIPT -->
    <script src="Script/jQuery.js"></script>
    <script src="Script/privateMsg.js"></script>
</head>

<body>

    <!-- HEADER -->
    <header>
        <div class="header-content">
            <a href="index.php"><img class="companionquest-logo" src="Images/companionquest-logo.png" alt="Companion Quest Logo" /></a>
            <nav class="wrapper">
                <ul class="left-links green">
                    <li><a href="index.php">home</a></li>
                    &emsp;
                    <li><a href="../Main-Portal.php"><?= $startquestNavTitle ?></li>
                </ul>
                <ul class="right-links">
                    <li class="msgIcon"><?= $rightNavLinkMsg ?></li>
                    <li><?= $rightNavLink1 ?></li>
                    <li><?= $rightNavLink2 ?></li>
                </ul>
                <ul class="hamburger-link">
                    <li><a href="../Main-Portal.php"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a></li>
                </ul>
            </nav>
        </div>
        <!--This is the private message chat box-->
        <div id="msgBox" class="msgBox">
            <a class="boxclose" id="boxclose">X</a>
            <div id="msgs">
                <ul>

                </ul>
            </div>
            <form id="newMsg" method="post" name="newMsg">
                <div id="createChat">
                    <label>To:</label>
                    <select id="to" name="to">
                        <option value="default">Select User</option>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?php echo $user['id'] ?>"><?php echo $user['user_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="text" id="msgText" name="msgText" />
                <input type="button" id="sendMsg" name="sendMsg" value="Send" />
                <input type="button" id="sendNewMsg" name="sendMsg" value="Send" />
            </form>
        </div>
    </header>


    <?php

include "View/Modals/navbar-register.php";
include "View/Modals/navbar-signin.php";
include "View/Modals/navbar-edit.php";
include "View/Modals/navbar-avatar.php";

//echo $modalOpen;

?>

    <!--<div class="container-fluid">-->
    <!--    <div class="row content-wrapper">-->
    <!--        <div class="col-md-1 bg-warning">1</div>-->
    <!--        <div class="col-md-1 bg-info">2</div>-->
    <!--        <div class="col-md-1 bg-danger">3</div>-->
    <!--        <div class="col-md-1 bg-success">4</div>-->
    <!--        <div class="col-md-1 bg-warning">5</div>-->
    <!--        <div class="col-md-1 bg-info">6</div>-->
    <!--        <div class="col-md-1 bg-danger">7</div>-->
    <!--        <div class="col-md-1 bg-success">8</div>-->
    <!--        <div class="col-md-1 bg-warning">9   </div>-->
    <!--        <div class="col-md-1 bg-info">10</div>-->
    <!--        <div class="col-md-1 bg-danger">11</div>-->
    <!--        <div class="col-md-1 bg-success">12</div>-->
    <!--    </div>-->
    <!--</div>-->
