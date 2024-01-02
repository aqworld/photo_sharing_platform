<?php 
include_once 'header.php';
?>
    <style>
  
  
    </style>

<form action="upload.inc.php" method="post" enctype="multipart/form-data">
         <input type="text" name="filename" placeholder="File Name...">
        <input type="text" name="filetitle" placeholder="Image title...">
        <input type="text" name="filedesc" placeholder="Image description...">
        <input type="file" name="file">
        <button type="submit" name="submit">Upload</button>
</form>

<h1>Upload your picture</h1>


<?php
include_once 'footer.php';
?>