<?php
include_once 'header.php';
include 'dbh2.inc.php'
?>
    <h1>Home Page</h1>
  
    <form action="search.php" method="POST">
         <input type="text" name="search" placeholder="Search">
         <button type="submit" name="submit-search">Search</button>
    </form>

    <div class="article-container"> 
       <?php
          $sql = "SELECT * FROM article";
          $result = mysqli_query($connec, $sql);
          $queryResults = mysqli_num_rows($result);
 
          if($queryResults > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<div>
                     <h3>".$row['a_title']."</h3>
                     <p>".$row['a_text']."</p>
                     <p>".$row['a_date']."</p>
                     <p>".$row['a_author']."</p>
                  </div>";
              }
          }
        ?>
    </div>    
<?php
include_once 'footer.php';
?>  