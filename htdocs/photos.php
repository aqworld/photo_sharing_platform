<?php
include_once 'header.php';
?>
<style>
.gallery-links {
     margin: 10px;
}

    .wrapper_1 {
    padding: 50px;
    margin-top: 20px;     
}
.gallery-container a div {
    width: 100%;
    height: 300px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.gallery-container {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-between;
}
</style>
  <section class="gallery-links">
       <h2>Gallery</h2>
       <div class="gallery-container">
      <?php
          include_once 'dbh_third.inc.php';

          $sql = "SELECT * FROM photos ORDER BY orderGallery DESC";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo '<p class="errorMessage">Statement failed!</p>';
          } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="wrapper_1">
              <a href="">
                 <div style="background-image:  url(uploads/'.$row["imgFullNameGallery"].');"></div>
                 <h3>'.$row["titleGallery"].'</h3>
                 <p>'.$row["descGallery"].'</p>
              </a>
            </div>';
            }
          }
          ?>
        </div>

  </section>
<?php
include_once 'footer.php';
?>