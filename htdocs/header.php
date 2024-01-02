<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <ul>
        <nav class="navbar">
            <li><a class="Logo" href="index.php">Logo</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="uploads.php">Upload your image</a></li>
            <?php
             if (isset($_SESSION["useruid"])) {
                 echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
             }  
             else {
                echo "<li><a href='Sign_Up.php'>Sign up</a></li>";
                echo "<li><a href='login.php'>Login</a></li>";
             }
            ?>
        </nav>
    </ul>