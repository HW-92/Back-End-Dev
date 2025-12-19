<?php
session_start();

// Include database connection file
include 'db_connect.php';

// Check if admin is logged in, terminate if not
if (!isset($_SESSION['admin_logged_in'])) die("Access Denied");

// Retrieve parent data if ID is provided in URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM Parents WHERE ParentID = $id");
    $parent = $result->fetch_assoc();
}

// Process form submission when update button is clicked
if (isset($_POST['update_parent'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Prepare and execute database update
    $stmt = $conn->prepare("UPDATE Parents SET FullName=?, Email=?, Phone=?, Address=? WHERE ParentID=?");
    $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);

    if ($stmt->execute()) {
        // Redirect to parents view with success message
        header("Location: view_parents.php?msg=updated");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Parent</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <!-- Navigation bar with back link -->
    <nav><a href="view_parents.php">&larr; Back to Parents</a><span>Admin Mode</span></nav>

    <!-- Main form container for editing parent information -->
    <div class="form-card">
        <div class="form-header">
            <h1>Edit Parent Details</h1>
        </div>

        <!-- Form for parent information editing -->
        <form method="POST">
            <!-- Full Name input field -->
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($parent['FullName']); ?>" required>
            </div>

            <!-- Email Address input field -->
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($parent['Email']); ?>">
            </div>

            <!-- Phone Number input field -->
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($parent['Phone']); ?>">
            </div>

            <!-- Address input field -->
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($parent['Address']); ?>">
            </div>

            <!-- Form action buttons -->
            <div class="form-actions">
                <a href="view_parents.php" class="btn btn-secondary" style="text-decoration:none">Cancel</a>
                <button type="submit" name="update_parent" class="btn">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>