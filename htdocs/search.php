<style>
body {
    background-color: grey;
} 

div {
    font-size: 50px;
}
</style>
<h1>Search page</h1>

<div class="article-container">
<?php
    if (isset($_POST['submit-search'])) {
         $search = mysqli_real_escape_string($connec, $_POST['search']);
         $sql = "SELECT * FROM article WHERE a_title LIKE '%$search%' OR a_text LIKE '%$search%' OR a_author LIKE '%$search%'";
         $result = mysqli_query($connec, $sql);
         $queryResult = mysqli_num_rows($result);

          echo "There are ".$queryResult." results!";
         
         if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='article-box'>";
                echo "<h3>".$row['a_title']."</h3>";
                echo  "<p>".$row['a_text']."</p>";
                echo  "<p>".$row['a_date']."</p>";
                echo  "<p>".$row['a_author']."</p>";
                echo "</div>";
            }
         } else {
             echo "There doesn't seem to be any images or users that match your search.
             Try again with fewer or different tags
             ";
         }
    }
?>
</div>