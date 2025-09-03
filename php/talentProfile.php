<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/talentProfile.css" />
    <link rel="stylesheet" href="../css/upload.css" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" type="image/png" href="../img/spotlit-tab-logo.png">
    <title>MMU TALENT</title>
</head>

<body>
    <?php include('./headerProfile.php'); ?>

    <div class="profile-container">
        <div class="header">
            <h2>My Talent Profile</h2>
            <button id="openEditBtn" class="editBtn">Edit Profile</button>
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
                        <input type="text" name="nickname" value="Alicia">
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
                            <option value="Graphic" selected>Graphic</option>
                            <option value="Writing">Writing</option>
                            <option value="Music">Music</option>
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
    </div>
    </div>

    <script src="../js/talentProfile.js"></script>

</body>

</html>
