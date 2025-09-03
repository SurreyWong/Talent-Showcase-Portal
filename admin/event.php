<?php
include('../php/db_conn.php');

$select1 = "SELECT * FROM event";
$result = $conn->query($select1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!--boxicons-->
    <link rel="stylesheet" href="./adminStyling.css">
    <link rel="stylesheet" href="./event.css">
    <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
    <title>Event</title>
</head>

<body>
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
                    <li class="nav-link">
                        <a href="admin.php">
                            <i class='bx bxs-home icon'></i>
                            <span class="text nav-text">Dashboard</span>
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
                    <li class="nav-link active">
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

    <div class="content">

        <div class="createBtn">
            <button id="openEditBtn">Add New Event</button>
        </div>

        <div class="edit-event-modal" id="editModal">
            <form name="editEventForm" id="editEventForm" method="POST" action="">
                <div class="modal-header">
                    <h2>Edit Event</h2>
                    <span class="close-btn" id="closeEditBtn">&times;</span>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="eventTitle">Event Title</label>
                        <input type="text" name="eventTitle" id="eventTitle" placeholder="Enter event title" required>
                    </div>

                    <div class="form-group">
                        <label for="eventDescription">Event Description</label>
                        <textarea name="eventDescription" id="eventDescription" placeholder="Describe the event" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="eventDate">Event Date</label>
                        <input type="date" name="eventDate" id="eventDate" required>
                    </div>
                </div>

                <div class="form-actions" style="margin-top: 20px;">
                    <button type="submit" name="save" class="save-btn">Save</button>
                </div>
            </form>
        </div>

        <div class="table-container">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>Event ID</th>
                        <th>Event Title</th>
                        <th>Description</th>
                        <th>Event Date</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <!-----------fetch feedback data from database---------!-->
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['eventID'] . "</td>";
                            echo "<td>" . $row['event_title'] . "</td>";
                            echo "<td>" . $row['event_desc'] . "</td>";
                            echo "<td>" . $row['event_date'] . "</td>";
                            echo "<td>
                            <i class='bx bxs-edit edit-icon'></i>
                            <i class='bx bxs-trash delete-icon'></i>
                            <i class='bx bxs-save save-icon' style='display: none;'></i>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No event found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/announcement.js"></script>
    <script src="../js/talentProfile.js"></script>

</body>

</html>
