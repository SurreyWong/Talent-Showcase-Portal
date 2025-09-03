<?php
if (isset($_GET['api']) && $_GET['api'] === 'getTalents') {
    header('Content-Type: application/json');
    include '../php/db_conn.php';

    $sql = "SELECT tp.nickname AS name, tp.education, tp.talent, u.first_name, u.last_name, tp.profile_pic, tp.resume_file_path, tp.phone 
            FROM talentprofile tp 
            JOIN users u ON tp.userID = u.userID";

    $result = $conn->query($sql);

    $talents = [];

    while ($row = $result->fetch_assoc()) {
        $talents[] = [
            'profile_pic' => $row['profile_pic'],
            'name' => $row['name'],
            'education' => $row['education'],
            'bio' => "Specialized in " . $row['talent'] . ". Full name: " . $row['first_name'] . " " . $row['last_name'],
            'phone' => $row['phone'],
            'resume' => $row['resume_file_path']
        ];
    }

    echo json_encode($talents);
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Talent</title>
  <link rel="stylesheet" href="../css/talent.css">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
</head>

<body>
  <?php include 'header.php'; ?>
    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Search Talent"/>
      <select id="genreSelect">
        <option value="">Genre</option>
        <option value="music">music</option>
        <option value="theater">theater</option>
        <option value="coding">coding</option>
        <option value="robotics">robotics</option>
      </select>
    </div>

    <div class="card-grid" id="talentGrid">
      <!-- Cards inserted by talent.js -->
    </div>

    <script src="../js/talent.js"></script>
    
  
</body>
</html>
