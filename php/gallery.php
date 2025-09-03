<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gallery </title>
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/gallery.css">
  <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
</head>
<body>
    <?php include 'header.php'; ?>
  <div class="card-grid">
    <?php
          
      include 'db_conn.php';

      $sql = "SELECT * FROM gallery ORDER BY media_date DESC LIMIT 6";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          // Format date
          $month = date('M', strtotime($row['media_date']));
          $day = date('d', strtotime($row['media_date']));

          echo '
            <div class="card">
              <div class="card-image">
                <img src="' . $row['gallery_pic'] . '" alt="' . htmlspecialchars($row['media_title']) . '" />
              </div>
              <div class="card-content">
                <span class="card-date">' . $month . '<br><strong>' . $day . '</strong></span>
                <h3 class="card-title">' . htmlspecialchars($row['media_title']) . '</h3>
                <p class="card-details">' . htmlspecialchars($row['media_desc']) . '</p>
              </div>
            </div>
          ';
        }
      } else {
        echo '<p style="text-align:center;">No gallery items found.</p>';
      }

      $conn->close();


    ?>
  </div>

  <script src="../js/gallery.js"></script>
</body>
</html>
