<?php
session_start();

// Include database connection file
include 'db_connect.php';


// Check if admin is logged in, redirect to login if not
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}


// Process form submission when submit button is clicked
if (isset($_POST['submit'])) {
    // Sanitize and retrieve form data
    $name = trim($_POST['full_name']);
    $address = trim($_POST['address']);
    $class_id = $_POST['class_id'];
    $medical = trim($_POST['medical']); 

    // Validate required fields
    if (!empty($name) && !empty($address)) {
        // Prepare and execute database insertion
        $stmt = $conn->prepare("INSERT INTO Pupils (FullName, Address, MedicalInfo, ClassID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $address, $medical, $class_id);
        
        if ($stmt->execute()) {
            $msg_type = "success";
            $message = "Pupil added successfully!";
        } else {
            $msg_type = "error";
            $message = "Error: " . $conn->error;
        }
    } else {
        $msg_type = "error";
        $message = "Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pupil - St Alphonsus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    
    <!-- Navigation bar with back link and admin indicator -->
    <nav>
        <div>
            <a href="view_classes.php">&larr;Back to classes</a>
        </div>
        <div>
            <span>Admin Mode</span>
        </div>
    </nav>

    <!-- Main form container for adding new pupil -->
    <div class="form-card">
        
        <div class="form-header">
            <h1>Add New Pupil</h1>
            <p style="color: #666;">Enter the student's details below.</p>
        </div>

        <!-- Display success/error messages if any -->
        <?php if(isset($message)): ?>
            <div class="alert alert-<?php echo $msg_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Form for pupil information input -->
        <form method="POST">
            <!-- Full Name input field -->
            <div class="form-group">
                <label>Full Name <span style="color:red">*</span></label>
                <input type="text" name="full_name" placeholder="e.g. Harry Potter" required>
            </div>
            
            <!-- Address input field -->
            <div class="form-group">
                <label>Address <span style="color:red">*</span></label>
                <input type="text" name="address" placeholder="e.g. 4 Privet Drive" required>
            </div>

            <!-- Medical information textarea (optional) -->
            <div class="form-group">
                <label>Medical Information (Optional)</label>
                <textarea name="medical" placeholder="e.g. Asthma, Nut Allergy (Leave blank if none)"></textarea>
            </div>
            
            <!-- Class selection dropdown populated from database -->
            <div class="form-group">
                <label>Assign to Class</label>
                <select name="class_id">
                    <?php
                    // Query database to get all available classes
                    $classes = $conn->query("SELECT ClassID, ClassName FROM Classes");
                    // Loop through results and create option elements
                    while($c = $classes->fetch_assoc()) {
                        echo "<option value='".$c['ClassID']."'>".$c['ClassName']."</option>";
                    }
                    ?>
                </select>
            </div>
            
            <!-- Form action buttons -->
            <div class="form-actions">
                <a href="view_classes.php" class="btn btn-secondary" style="text-decoration:none;">Cancel</a>
                <button type="submit" name="submit" class="btn">Add Pupil</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>