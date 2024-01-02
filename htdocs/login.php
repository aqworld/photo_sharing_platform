<?php
include_once 'header.php';
?>
<style>
    input {
    border-radius: 5px;
    height: 40px;
    width: 200px;
    margin: 5px;
}
</style>
<section class="signup-form">
    <h2>Log In</h2>
    <div class="signup-form-form">
     <form action="includes/login.inc.php" method="post">
         <div>
         <input type="text" name="uid" placeholder="Username/Email...">
         </div>
         <div>
         <input type="password" name="pwd" placeholder="Password...">
         </div>
        <button class="signup-button" type="submit" name="submit">Log In</button>
     </form>
    </div>
</section>
<?php
include_once 'footer.php';
?>