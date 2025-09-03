<?php
session_start();
include 'db_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Media Feed</title>
    <link rel="stylesheet" href="../css/media.css">
</head>
<body>
    <h1>MMU Talent Media Feed</h1>

    <!-- Upload Form -->
    <form id="mediaForm" enctype="multipart/form-data" method="POST">
        <label>Upload:</label>
        <input type="file" name="media" required>
        <textarea name="caption" placeholder="Enter caption" required></textarea>
        <button type="submit">Post</button>
    </form>

    <div id="preview"></div>
    <hr>

    <!-- Feed Section -->
    <div id="feed">
        <?php
        $result = $conn->query("SELECT * FROM media_posts ORDER BY created_at DESC");
        while ($row = $result->fetch_assoc()):
        ?>
        <div class="post">
            <?php if ($row['media_type'] === 'image'): ?>
                <img src="<?= $row['media_path'] ?>" alt="Image">
            <?php else: ?>
                <video controls><source src="<?= $row['media_path'] ?>"></video>
            <?php endif; ?>
            <p><?= htmlspecialchars($row['caption']) ?></p>
        </div>
        <?php endwhile; ?>
    </div>

    <script src="../js/media.js"></script>
</body>
</html>