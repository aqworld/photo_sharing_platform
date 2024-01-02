<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $pwd) !== false){
        header("location: ../login.php?error=emtpyinput");
        exit(); 
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../login.php");
    exit();  
}

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p>Fill in all fields!</p>";
    } 
    else if ($_GET["error"] == "invalidusername") {
        echo "<p>Not a real username!</p>";
    }
    else if ($_GET["error"] == "wrongpassword") {
        echo "<p>Wrong password</p>";
    }  
}
