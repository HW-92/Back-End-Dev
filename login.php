<?php
session_start();
include 'db_connect.php';

// Process login form submission
if (isset($_POST['login'])) {
    // Retrieve form input
    $username = $_POST['username'];
    $passwordHash = $_POST['password'];

    // Query database for user credentials
    $stmt = $conn->prepare("SELECT UserID, PasswordHash FROM Users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Check password
        if (password_verify($passwordHash, $row['PasswordHash'])) {
            // Authentication successful - set admin session and redirect
            $_SESSION['admin_logged_in'] = true;
            header("Location: index.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - St Alphonsus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
    <!-- Login form container with school branding -->
    <div class="login-card">
        <h2>Admin Login</h2>
        <p style="margin-bottom: 20px; color: #666;">Please enter your credentials</p>

        <!-- Display authentication errors if any -->
        <?php if(isset($error)): ?>
            <div class="alert alert-error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Login form for admin authentication -->
        <form method="POST">
            <!-- Username input field -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="e.g. admin" required>
            </div>

            <!-- Password input field -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <!-- Submit button for login attempt -->
            <button type="submit" name="login" class="btn btn-block">Sign In</button>
        </form>

        <!-- Navigation link back to public website -->
        <a href="index.php" class="back-link">&larr; Back to School Website</a>
    </div>

</body>
</html>