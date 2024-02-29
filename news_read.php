<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("header.php") ?>
  <style>
    /* News layout styles */
    .news-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .news-item {
      margin-bottom: 20px;
      padding: 20px;
      background-color: #f5f5f5;
      border-radius: 5px;
    }

    .news-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .news-date {
      font-size: 14px;
      color: #888;
      margin-bottom: 10px;
    }

    .news-content {
      font-size: 16px;
    }

    .news-image {
      max-width: 100%;
      margin-bottom: 20px;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  
<br><br><br><br><br><br>
  <div class="news-container">
    <?php
    // Include the file for database connection
    include 'conn.php';

    // Check if the ID parameter is set in the URL
    if (isset($_GET['id'])) {
      // Sanitize the ID parameter to prevent SQL injection
      $id = mysqli_real_escape_string($conn, $_GET['id']);

      // Query to fetch the news article with the specified ID
      $query = "SELECT *, DATE_FORMAT(date, '%Y-%m-%d') AS formatted_date FROM news WHERE id = '$id'";
      $result = mysqli_query($conn, $query);

      // Check if a news article with the specified ID exists
      if (mysqli_num_rows($result) == 1) {
        // Fetch the news article
        $row = mysqli_fetch_assoc($result);
    ?>
      <div class="news-item">
        <h2 class="news-title"><?php echo $row['title']; ?></h2>
        <p class="news-date"><?php echo $row['formatted_date']; ?></p>
        <img src="admin/dist/news/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" class="news-image">
        <p class="news-content"><?php echo $row['content']; ?></p>
      </div>
    <?php
      } else {
        // Display a message if the specified ID does not exist
        echo "<p>News article not found</p>";
      }
    } else {
      // Display a message if the ID parameter is not provided in the URL
      echo "<p>News article ID not specified</p>";
    }

    // Close database connection
    mysqli_close($conn);
    ?>
  </div>
  <?php include("footer.php") ?>
</body>

</html>
