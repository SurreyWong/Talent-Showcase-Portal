<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!--boxicons-->
    <link rel="stylesheet" href="./adminProfile.css">
    <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
    <title>Profile Settings</title>
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
                    <li class="nav-link active">
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

    <div class="main-content">
        <div class="content">
            <div class="header">
                <button id="toggleSidebar" class="toggle-button">
                    <i class="fas fa-bars"></i>
                </button>
                <h2><i class="fas fa-user"></i> Profile Setting</h2>
            </div>
            <div class="wrapper">
                <div class="container">
                    <img src="../image/profile-admin.jpg" alt="Profile Image" class="profile-image">

                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" id="firstName" name="firstName" value="" placeholder="First Name:">

                            </div>

                            <div class="form-group">
                                <input type="text" id="lastName" name="lastName" value="" placeholder="Last Name: ">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <input type="email" id="email" name="email" value="" placeholder=" Email:">
                            </div>

                            <div class="form-group">
                                <input type="text" id="contact" name="contact" value="" placeholder="Contact Number: ">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <input type="password" id="password" name="password" placeholder="Password: ">
                                <label for="password"></label>
                                <p id="passwordError" class="error-message"></p>
                            </div>

                            <div class="form-group">
                                <input type="file" id="profile_image" name="profile_image" placeholder=" ">
                            </div>
                        </div>

                        <button type="submit" onclick="return validatePassword()">Save Settings</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/profile.js"></script>

</body>

</html>