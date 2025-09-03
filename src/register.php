<?php
include("../php/db_conn.php");

$error_msg = '';

if (isset($_POST['submit'])) {
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //check if user wants to be Talent
    $role = isset($_POST['isTalent']) && $_POST['isTalent'] === 'yes' ? 'talent' : 'customer';

    $select1 = "SELECT * FROM users WHERE email = '$email'";
    $select_user = mysqli_query($conn, $select1);
    if(mysqli_num_rows($select_user) > 0) {
        $error_msg = "user already exist!";
                echo "<script>alert(" . json_encode($error_msg) . ");</script>";
    }
    else{
        $insert1 = "INSERT INTO users (first_name, last_name, email, password, role) VALUES ('$first_name', '$last_name', '$email', '$password', '$role')";
        mysqli_query($conn,$insert1);
        header('location:login.php');
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="../img/spotlit-tab-logo.png">
    <title>MMU TALENT</title>

    <link rel="stylesheet" href="../css/register.css" />
</head>

<body>

    <form name="registerForm" id="registerForm" action="" method="POST" onsubmit="return validatePassword()">

        <header id="registerHeader">
            <h1>Create an account</h1>
            <p>Already have an account? <a href="login.php">Log in</a></p>
        </header>

        <div class="registerFields">
            <p class="col-25">
                <label for="firstName">First Name</label>
            </p>
            <p class="col-75">
                <input type="text" name="firstName" required>
            </p>
            <p class="col-25">
                <label for="lastName">Last Name</label>
            </p>
            <p class="col-75">
                <input type="text" name="lastName" required>

            </p>
            <p>
                <label for="email">Email</label>
            </p>
            <p>
                <input type="email" name="email" placeholder="abc123@example.com"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>

            </p>
            <p>
                <label for="password">Password</label>
            </p>
            <p>
                <input type="password" name="password" id="password" placeholder="Password">
            </p>

            <p id="passwordError" style="color:red;"></p>

            <p class="conditions">
                Use 8 or more characters with a mix of letters, numbers & symbols</p>
            </p>

            <p>
                <label for="confirmPassword">Confirm Password</label>
            </p>
            <p>
                <input type="password" name="password" id="confirmPassword" placeholder="Password">
            </p>

            <p id="confirmPasswordError" style="color:red;"></p>

            <section class="terms">
                <p>
                    <label>
                    <input type="checkbox" name="isTalent" id="isTalent" value="yes">
                        I want to register as a Talent
                    </label>
                </p>

                <p>
                    <input type="checkbox" required
                        onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate you accept the Terms and conditions' : '');"
                        name="terms" /> By creating an account, I agree to the Terms and Conditions.
                </p>
            </section>

            <button type="submit" class="button" name="submit">Create an account</button>
        </div>
    </form>
</body>
<script src="../js/register.js"></script>

</html>
