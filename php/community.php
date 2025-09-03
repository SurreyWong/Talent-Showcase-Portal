<?php
include 'db_conn.php';
session_start();

$loggedIn = isset($_SESSION['userID']);
$profileLink = '../php/talentProfile.php';

if (isset($_SESSION['role']) && $_SESSION['role'] === 'customer') {
    $profileLink = '../php/custProfile.php';
}

$userID = $_SESSION['userID'] ?? null;

// Handlee discussion submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_discussion'])) {
    if (!$userID) {
        die("You must be logged in to create a discussion.");
    }

    $title = trim($_POST['community_title']);
    $content = trim($_POST['community_content']);

    if (!empty($title) && !empty($content)) {
        $stmt = $conn->prepare("INSERT INTO community (userID, community_title, community_content, community_date) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iss", $userID, $title, $content);
        $stmt->execute();
    }

    header("Location: community.php");
    exit();
}

// Handle comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_text'])) {
    if (!$userID) {
        die("You must be logged in to post a comment.");
    }

    $communityID = $_POST['communityID'];
    $comment_text = trim($_POST['comment_text']);

    if (!empty($comment_text)) {
        $stmt = $conn->prepare("INSERT INTO comment (communityID, userID, comment_text) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $communityID, $userID, $comment_text);
        $stmt->execute();
    }
}

// Fetch all communities with user names
$sql = "
    SELECT c.communityID, c.community_title, c.community_content, c.community_date, 
           u.first_name, u.last_name 
    FROM community c
    JOIN users u ON c.userID = u.userID
    ORDER BY c.community_date DESC
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Community Discussion</title>
    <link rel="stylesheet" href="../css/community.css">
    <link rel="stylesheet" href="../css/dashboard.css" />

    <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
</head>
<body>

<nav>
        <div class="navheader">
            <div class="navlogo">
                <a href="#">MMU<span>Spotlit</span></a>
            </div>

            <ul class="navlinks" id="nav-links">
                <li><a href="../php/dashboard.php">Home</a></li>
                <li><a href="../php/talent.php">Talent</a></li>
                <!--<li><a href="#">Events</a></li> -->
                <li><a href="../php/gallery.php">Gallery</a></li>
                <li><a href="../php/community.php">Community Services</a></li>
                <li class="dropdown">
                    <a href="../php/about.php">About Us</a>
                    <ul class="dropdown-menu">
                        <li><a href="../php/faq.php">FAQ</a></li>
                        <li><a href="../php/contact.php">Contact Us</a></li>
                    </ul>
                </li>

            </ul>
            <?php if ($loggedIn): ?>
        <!-- Logged-in User Dropdown -->
        <ul class="navlinks">
          <li class="dropdown">
            <a href="#" class="dropbtn">Menu ▼</a>
            <ul class="dropdown-menu">
            <li><a href="<?= $profileLink ?>">My Profile</a></li>


        <?php if (isset($_SESSION['role']) && $_SESSION['role'] !== 'customer'): ?>
          <!-- Only show Media if not a customer -->
          <li><a href="../php/media.php">Media</a></li>
        <?php endif; ?>

              <li><a href="../php/logout.php">Log Out</a></li>
            </ul>
          </li>
        </ul>
      <?php else: ?>
        <!-- Guest User -->
        <a href="../src/register.php"><button type="button" class="loginbtn">Log in</button></a>
      <?php endif; ?>
      </div>
      </nav>


    <h2>Discussion</h2></br>
        <?php if ($userID): ?>
            <div class="new-discussion-form">
                <h3>Start a New Discussion</h3>
                <form method="post">
                    <input type="hidden" name="new_discussion" value="1">
                    <input type="text" name="community_title" placeholder="Discussion Title" required>
                    <textarea name="community_content" placeholder="What's on your mind?" required></textarea>
                    <button type="submit">Post Discussion</button>
                </form>
            </div>
        <?php else: ?>
            <p style="text-align:center;"><em>Please <a href="../src/login.php">log in</a> to start a new discussion.</em></p>
        <?php endif; ?></br>

    <div class="discussion-wrapper">
        <div class="discussion-list">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="discussion-card">
                    <div class="user-info">
                        <span class="icon">💬</span>
                        <div>
                            <strong><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></strong><br>
                            <small><?= htmlspecialchars($row['community_date']) ?></small>
                        </div>
                    </div>
                    <h4><?= htmlspecialchars($row['community_title']) ?></h4>
                    <p><?= htmlspecialchars($row['community_content']) ?></p>

                    <!-- Fetch and show comments -->
                    <div class="comment-list">
                        <?php
                        $commID = $row['communityID'];
                        $commentQuery = "
                            SELECT com.comment_text, com.comment_date, u.first_name, u.last_name
                            FROM comment com
                            JOIN users u ON com.userID = u.userID
                            WHERE com.communityID = $commID
                            ORDER BY com.comment_date DESC
                        ";

                        $commentResult = $conn->query($commentQuery);
                        while ($comment = $commentResult->fetch_assoc()):
                        ?>
                            <p><strong><?= htmlspecialchars($comment['first_name'] . ' ' . $comment['last_name']) ?>:</strong>
                                <?= htmlspecialchars($comment['comment_text']) ?> 
                                <small>(<?= htmlspecialchars($comment['comment_date']) ?>)</small>
                            </p>
                        <?php endwhile; ?>
                    </div>

                    <!-- Add commentss -->
                    <form method="post" class="comment-form">
                        <input type="hidden" name="communityID" value="<?= $row['communityID'] ?>">
                        <textarea name="comment_text" placeholder="Write a comment..." required></textarea>
                        <button type="submit">Post Comment</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</body>
</html>
