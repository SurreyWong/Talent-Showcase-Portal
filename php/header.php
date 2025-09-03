<?php
include 'db_conn.php';
session_start();

$loggedIn = isset($_SESSION['userID']);
$profileLink = '../php/talentProfile.php';

if (isset($_SESSION['role']) && $_SESSION['role'] === 'customer') {
    $profileLink = '../php/custProfile.php';
}

$search = $_GET['search'] ?? '';
$result = null;

if (!empty($search)) {
    $stmt = $conn->prepare("SELECT * FROM event WHERE event_title LIKE CONCAT('%', ?, '%') OR event_desc LIKE CONCAT('%', ?, '%') ORDER BY event_date ASC");
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM event ORDER BY event_date ASC";
    $result = $conn->query($sql);
}

?>


<link rel="stylesheet" href="../css/dashboard.css" />
<header>
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
          <!-- Only show media if not a customer -->
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
</header>
