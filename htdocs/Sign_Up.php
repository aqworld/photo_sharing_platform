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
    <h2>Sign Up</h2>
    <div class="signup-form-form">
     <form action="signup.inc.php" method="post">
         <div>
         <input type="text" name="email" placeholder="Email...">
         </div>
         <div>
         <input type="text" name="uid" placeholder="Username...">
         </div>
         <div>
         <input type="password" name="pwd" placeholder="Password...">
         </div>
         <div>
         <input type="password" name="pwdrepeat" placeholder="Repeat password...">
         </div>
        <button class="signup-button" type="submit" name="submit">Sign Up</button>
     </form>
    </div>
</section>

<?php
include_once 'footer.php';
?>