<?php

include "Validation.php"; //links to validation library class

session_start();
ob_start();

//this will include header1.php or header2.php depending on whether someone has logged in or not
if(empty($_SESSION['user'])){
    include "header1.php";
    $userArray = "";
} else {
    include "header2.php";
    $userArray = $_SESSION['user'];
    $userFirstName = $userArray['f_name'];
    $userLastName = $userArray['l_name'];
}

include "home.php";
include "footer.php";

?>


