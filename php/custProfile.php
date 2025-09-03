<?php include 'headerProfile.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Customer Profile</title>
  <link rel="stylesheet" href="../css/custProfile.css">
  <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
</head>

<body>
  <div class="container">
    <h1>Edit Customer Profile</h1>
    <form method="POST" enctype="multipart/form-data">
      <img src="default-profile.png" class="profile-pic" id="preview">
      <label for="profile_pic">Upload Profile Picture</label>
      <input type="file" name="profile_pic" id="profile_pic" accept="image/*" onchange="loadPreview(event)" required>

      <label for="name">First Name:</label>
      <input type="text" name="name" required>

      <label for="name">Last Name:</label>
      <input type="text" name="name" required>

      <label for="email">Email:</label>
      <input type="email" name="email" required>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <small id="passwordError" class="error-message"></small>
      </div>

      <div class="form-group">
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <small id="confirmPasswordError" class="error-message"></small>
      </div>


      <button type="submit" onclick="return validatePassword()">Edit Profile</button>
    </form>
  </div>

  <script src="../js/profile.js"></script>

</body>

</html>