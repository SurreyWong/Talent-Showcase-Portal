<?php
include('../php/db_conn.php');
session_start();

$firstName = "";
$lastName = "";
$email = "";
$password = "";
$nickname = "";
$phone = "";
$gender = "";
$education = "";
$talent = "";
$errorMessage = "";
$successMessage = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nickname = $_POST["nickname"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $education = $_POST["education"];
    $talent = $_POST["talent"];

    do {
        // Basic validation
        if (
            empty($firstName) || empty($lastName) || empty($email) || empty($password)
            || empty($nickname) || empty($phone) || empty($gender)
        ) {
            $errorMessage = "All required fields must be filled.";
            break;
        }

        // Insert into `users` table
        $insertUser = "INSERT INTO users (first_name, last_name, email, password) VALUES
                    ('$firstName', '$lastName', '$email', '$password')";
        $userResult = $conn->query($insertUser);

        if (!$userResult) {
            $errorMessage = "Error inserting user: " . $conn->error;
            break;
        }

        // Get last inserted user ID
        $userID = $conn->insert_id;

        // Insert into `talentprofile` table
        $insertTalent = "INSERT INTO talentprofile (userID, nickname, phone, gender, education, talent)
                        VALUES ('$userID', '$nickname', '$phone', '$gender', '$education', '$talent')";
        $talentResult = $conn->query($insertTalent);

        if (!$talentResult) {
            $errorMessage = "Error inserting talent profile: " . $conn->error;
            break;
        }

        // Reset form fields after success
        $firstName = "";
        $lastName = "";
        $email = "";
        $password = "";
        $nickname = "";
        $phone = "";
        $gender = "";
        $education = "";
        $talent = "";
        $successMessage = "New talent profile added successfully.";
    } while (false);
}

// Fetch all talent profiles
$select1 = "
    SELECT tp.*, u.first_name, u.last_name, u.email, u.password
    FROM talentprofile tp
    JOIN users u ON tp.userID = u.userID
";
$result = $conn->query($select1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="adminStyling.css">
    <link rel="stylesheet" href="../css/talentProfile.css">
    <link rel="stylesheet" href="adminTalent.css">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
    <title>MMU TALENT</title>
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
                    <li class="nav-link active">
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

    <div class="content">

        <div class="createBtn">
            <button id="openEditBtn">Add New Talent</button>
        </div>

        <!-- Edit Talent Modal -->
        <div class="edit-talent-modal" id="editModal">
            <form name="editTalentForm" id="editTalentForm" method="POST" action="">
                <div class="modal-header">
                    <h2>Edit Talent</h2>
                    <span class="close-btn" id="closeEditBtn">&times;</span>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" placeholder="Alicia" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" placeholder="ali12@" required>
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" placeholder="Yap" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" placeholder="019-12345678" required>
                    </div>

                    <div class="form-group">
                        <label for="nickname">Nickname</label>
                        <input type="text" name="nickname" placeholder="Alicia" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" required>
                            <option value="Female" selected>Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="education">Education</label>
                        <input type="text" name="education" placeholder="Faculty of Creative Multimedia">
                    </div>

                    <div class="form-group">
                        <label for="talent">Talent</label>
                        <select name="talent" required>
                            <option value="Music" selected>Music</option>
                            <option value="Theather">Theather</option>
                            <option value="Coding">Coding</option>
                            <option value="Robotics">Robotics</option>

                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="aliciayap@student.mmu.edu.my" required>
                    </div>
                </div>

                <div class="form-actions" style="margin-top: 20px;">
                    <button type="submit" name="save" class="save-btn">Save</button>
                </div>
            </form>
        </div>

        <div class="table-container">
            <table id="reviewTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Talent Nickname</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Education</th>
                        <th>Talent</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-----------fetch talent profile data from database---------!-->
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['nickname']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['education']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['talent']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                            echo "<td>
                                <i class='bx bxs-edit edit-icon'></i>
                                <i class='bx bxs-trash delete-icon'></i>
                                <i class='bx bxs-save save-icon' style='display: none;'></i>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No talent profiles found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/talentProfile.js"></script>
    <script src="../js/announcement.js"></script>

</body>

</html>
