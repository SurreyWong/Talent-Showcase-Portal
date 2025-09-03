<?php
include("../php/db_conn.php"); // adjust path if needed

$announcements = $conn->query("SELECT * FROM announcement");
$events = $conn->query("SELECT * FROM event ORDER BY event_date ASC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./admin.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
    <title>MMU TALENT</title>
</head>

<body>
    <!--Navigation items-->
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../image/spotlit-logo.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">MMU</span>
                    <span class="profession">SpotLit</span>
                </div>
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link active">
                        <a href="admin.php">
                            <i class='bx bxs-home icon'></i>
                            <span class="text nav-text">Dashboard</span> <!---DASHBOARD CONTENT-->
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="adminProfile.php">
                            <i class='bx bxs-pencil icon'></i>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="adminTalent.php">
                            <i class='bx bxs-group icon'></i>
                            <span class="text nav-text">Talent Profile</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="event.php">
                            <i class='bx bxs-calendar-alt icon'></i>
                            <span class="text nav-text">Event Management</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="feedback.php">
                            <i class='bx bxs-star icon'></i>
                            <span class="text nav-text">Feedback Management</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="announcement.php">
                            <i class='bx bxs-megaphone icon'></i>
                            <span class="text nav-text">Announcement Management</span>
                        </a>
                    </li>
                    <li class="nav-link logout-btn" role="button">
                        <div class="logout-link">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Log Out</span>
                        </div>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

    <div class="content"> <!--dashboard content-->
        <div class="slider">
            <div class="slides">
                <?php
                function limitSentences($text, $limit = 1) {
                    $sentences = preg_split('/(?<=[.?!])\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
                    return implode(' ', array_slice($sentences, 0, $limit));
                }

                if ($events && $events->num_rows > 0) {
                    while ($row = $events->fetch_assoc()) {
                        // Optional fallback image if event_pic doesn't exist
                        $imagePath = isset($row['event_pic']) ? htmlspecialchars($row['event_pic']) : '../image/default-event.jpg';

                        echo '
                        <div class="slide-box">
                            <img class="slide-image-top" src="' . $imagePath . '" alt="' . htmlspecialchars($row['event_title']) . '"/>
                            <div class="slide-caption-under">
                                <h3>' . htmlspecialchars($row["event_title"]) . '</h3>
                                <p>' . htmlspecialchars(limitSentences($row["event_desc"], 1)) . '</p>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No upcoming events found.</p>';
                }
                ?>
            </div>
            <button class="prev" onclick="prevSlide()">
                <i class='bx bxs-chevron-left'></i>
            </button>
            <button class="next" onclick="nextSlide()">
                <i class='bx bxs-chevron-right'></i>
            </button>
        </div>

            <div class="event-container">
                <h3 class="announcement-title">Announcement</h3>

                <?php
                if ($announcements && $announcements->num_rows > 0) {
                while ($row = $announcements->fetch_assoc()) {

                        echo '<div class="event">';
                            echo '<div class="event-left">';
                                echo '<div class="event-info">';
                                    echo '<div class="event-name">' . $row["ann_title"] . '</div>';
                                    echo '<div class="date-posted">' . $row["event_date"] . '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="event-right">';
                                echo '<div class="event-description">' . $row["ann_description"] . '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No announcements found.</p>';
                }
                ?>
            </div>
        <!--- <div class="event-container">
            <h3 class="announcement-title">Announcement</h3>
            <div class="event">
                <div class="event-left">
                    <div class="event-info">
                        <div class="event-name">Tech Fair</div>
                        <div class="date-posted">24 May 2025</div>
                    </div>
                </div>

                <div class="event-right">
                    <div class="event-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui necessitatibus provident aliquam!
                    </div>

                </div>

            </div>

            <div class="event">
                <div class="event-left">
                    <div class="event-info">
                        <div class="event-name">Tech Fair</div>
                        <div class="date-posted">24 May 2025</div>
                    </div>
                </div>

                <div class="event-right">
                    <div class="event-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui necessitatibus provident aliquam!
                    </div>

                </div>

            </div>

            <div class="event">
                <div class="event-left">
                    <div class="event-info">
                        <div class="event-name">Tech Fair</div>
                        <div class="date-posted">24 May 2025</div>
                    </div>
            
                </div>

                <div class="event-right">
                    <div class="event-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui necessitatibus provident aliquam!
                    </div>

                </div>

            </div>

        </div> ----> 

    </div>

    <script src="../js/admin.js"></script>

</body>

</html>
