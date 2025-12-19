<?php
session_start();
include 'db_connect.php';

// Check if admin is logged in, terminate if not
if (!isset($_SESSION['admin_logged_in'])) die("Access Denied");

// Retrieve teacher data if ID is provided in URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM Teachers WHERE TeacherID = $id");
    $teacher = $result->fetch_assoc();
}

// Process form submission when update button is clicked
if (isset($_POST['update_teacher'])) {
    // Retrieve form data 
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];
    $bg_check = $_POST['bg_check'];
    $address = $_POST['address'];

    // Prepare and execute database update
    $stmt = $conn->prepare("UPDATE Teachers SET FullName=?, Phone=?, AnnualSalary=?, BackgroundCheck=?, Address=? WHERE TeacherID=?");
    $stmt->bind_param("ssdisi", $name, $phone, $salary, $bg_check, $address, $id);

    if ($stmt->execute()) {
        // Redirect to teachers view with success message
        header("Location: view_teachers.php?msg=updated");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <!-- Navigation bar with back link -->
    <nav><a href="view_teachers.php">&larr; Back to Teachers</a><span>Admin Mode</span></nav>

    <!-- Main form container for editing teacher information -->
    <div class="form-card">
        <div class="form-header">
            <h1>Edit Teacher</h1>
            <p>Updating record for: <strong><?php echo htmlspecialchars($teacher['FullName']); ?></strong></p>
        </div>

        <!-- Form for teacher information editing -->
        <form method="POST">
            <!-- Full Name input field -->
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($teacher['FullName']); ?>" required>
            </div>

            <!-- Address input field -->
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($teacher['Address']); ?>" required>
            </div>

            <!-- Phone Number input field -->
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($teacher['Phone']); ?>">
            </div>

            <!-- Annual Salary input field -->
            <div class="form-group">
                <label>Annual Salary (£)</label>
                <input type="text" name="salary" value="<?php echo htmlspecialchars($teacher['AnnualSalary']); ?>">
            </div>

            <!-- Background Check Status dropdown -->
            <div class="form-group">
                <label>Background Check Status</label>
                <select name="bg_check">
                    <option value="1" <?php if($teacher['BackgroundCheck'] == 1) echo 'selected'; ?>>Passed (Clear)</option>
                    <option value="0" <?php if($teacher['BackgroundCheck'] == 0) echo 'selected'; ?>>Pending / Failed</option>
                </select>
            </div>

            <!-- Form action buttons -->
            <div class="form-actions">
                <a href="view_teachers.php" class="btn btn-secondary" style="text-decoration:none">Cancel</a>
                <button type="submit" name="update_teacher" class="btn">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>