<?php
session_start();
include 'db_connect.php';

// Check if admin is logged in, terminate if not
if (!isset($_SESSION['admin_logged_in'])) {
    die("Access Denied: You must be an admin to delete records.");
}

// Check if ID and Class ID are provided
if (isset($_GET['id']) && isset($_GET['class'])) {
    $pupil_id = intval($_GET['id']);
    $class_id = intval($_GET['class']);

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM Pupils WHERE PupilID = ?");
    $stmt->bind_param("i", $pupil_id);

    if ($stmt->execute()) {
        // Success: Go back to the class list
        header("Location: view_pupils.php?class_id=$class_id&msg=deleted");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Error: No pupil ID provided.";
}
?>