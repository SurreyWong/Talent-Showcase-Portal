<?php
include 'header.php';
include 'db_conn.php';

$successMsg = '';
$errorMsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    $targetTalent = $_POST['talent'] ?? '';
    $feedbackDate = date('Y-m-d');

    if (!empty($message)) {
        $stmt = $conn->prepare("INSERT INTO feedback (feedback_desc, target_talent, feedback_date) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $message, $targetTalent, $feedbackDate);
            if ($stmt->execute()) {
                $_SESSION['successMsg'] = "Thank you for your feedback!";
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                $errorMsg = "Failed to submit feedback.";
            }
            $stmt->close();
        } else {
            $errorMsg = "Database error.";
        }
    } else {
        $errorMsg = "Message cannot be empty.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MMU TALENT</title>
    <link rel="stylesheet" href="../css/faq.css">
    <link rel="icon" type="image/png" href="../image/spotlit-tab-logo.png">
</head>

<body>

    <h1>Frequently Asked Questions</h1>

    <div class="faq-container">
        <div class="faq-item">
            <h3>How do I register for an account?</h3>
            <p>You can register by clicking the "Register" button on the homepage and filling in your details.</p>
        </div>

        <div class="faq-item">
            <h3>How can I upload my talent content?</h3>
            <p>Once logged in, navigate to your profile and use the upload form to share videos or images.</p>
        </div>

        <div class="faq-item">
            <h3>Who can view my profile?</h3>
            <p>Only registered users and admin can view profiles to ensure privacy and safety.</p>
        </div>

        <div class="faq-item">
            <h3>How can I contact support?</h3>
            <p>You can contact us using the "Contact Us" form in the About Us section.</p>
        </div>
    </div>

    <div class="feedback-form">
        <h2>Have a Question or Feedback?</h2>

        <?php if (!empty($successMsg)) echo "<p class='success-msg'>$successMsg</p>"; ?>
        <?php if (!empty($errorMsg)) echo "<p class='error-msg'>$errorMsg</p>"; ?>

        <form action="" method="POST">
            <label for="name">Your Name</label>
            <input type="text" name="name" required>

            <label for="email">Your Email</label>
            <input type="email" name="email" required>

            <label for="talent">Talent Name (Optional)</label>
            <input type="text" name="talent">

            <label for="message">Your Question or Comment</label>
            <textarea name="message" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>

</body>
</html>
