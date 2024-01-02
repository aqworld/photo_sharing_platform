<?php

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';

    if(emptyInputSignup($email, $username, $pwd, $pwdRepeat) !== false){
        header("location: Sign_Up.php?error=emtpyinput");
        exit(); 
    }
    if(invalidUid($username) !== false){
        header("location: Sign_Up.php?error=invaliduid");
        exit(); 
    }
    if(invalidEmail($email) !== false){
        header("location: Sign_Up.php?error=invalidemail");
        exit(); 
    }
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: Sign_Up.php?error=passwordsdonotmatch");
        exit(); 
    }
    if(uidExists($conn, $username, $email) !== false){
        header("location: Sign_Up.php?error=usernametaken");
        exit(); 
    }

    createUser($conn, $email, $username, $pwd);

} else {
    header("location: Sign_Up.php");
    exit();
}