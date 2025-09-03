<?php
include('../php/db_conn.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql="SELECT * FROM users where email='".$email."' AND password='".$password."'";

    $result = mysqli_query($conn, $sql);

    $row=mysqli_fetch_array($result);

    if ($row) {
    $_SESSION['userID'] = $row['userID'];
    $_SESSION['role'] = $row['role'];
 

    if ($row["role"] == "admin") {
        header("location: ../admin/admin.php");
       
    } elseif ($row["role"] == "talent" ) {
        header("location: ../php/dashboard.php");
    }
    elseif ($row["role"] == "customer" ) {
        header("location: ../php/dashboard.php");
    }
    } else {
        echo "Email or password incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
    <title>MMU TALENT</title>

    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

</head>

<body>
    <form action="#" method="POST" onsubmit="return validateForm(event)">
        <div class="container">
            <h1>Log in</h1>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <p id="emailError" style="color:red;"></p>

            <label for="password">Password</label>
            <div class="password-container">
                <input name="password" type="password" id="password" placeholder="Password" required>
                <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>
            <p id="passwordError" style="color:red;"></p>

            <input type="submit" value="Login" class="submit solid" id="loginButton" />


            <p class="signup-link">
                Don't have an account?
                <a href="register.php">Create an account</a>
            </p>
        </div>
    </form>
    <script src="../js/login.js"></script>
</body>

</html>
