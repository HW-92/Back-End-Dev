<?php
session_start();
include 'db_connect.php';

// Check if admin is logged in, redirect to login if not
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classes - St Alphonsus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- Main navigation bar with admin menu and search functionality -->
    <nav>

        <div>
            <a href="index.php">Home</a>
            <a href="view_classes.php" style="font-weight: bold; text-decoration: underline;">Classes</a>
            <a href="view_teachers.php">Teachers</a>
            <a href="view_parents.php">Parents</a>
        </div>

        <div style="display: flex; align-items: center; gap: 15px;">
            <!-- Global search form for quick access to any record -->
            <form action="search.php" method="GET" style="display: flex; align-items: center; margin: 0;">
            <input type="text" name="query" placeholder="Search name..." required style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; margin: 0; height: 35px;">
            <button type="submit" class="btn" style="padding: 0 15px; height: 35px; border-radius: 4px; margin-left: 5px; line-height: 1;">Search</button>
            </form>
            <span style="white-space: nowrap;">Welcome, Admin</span>
            <a href="logout.php" style="background: rgba(255,255,255,0.2); padding: 8px 12px; border-radius: 3px; height: 35px; display: flex; align-items: center; text-decoration: none;">Logout</a>
        </div>

    </nav>

    <!-- Main dashboard container for class overview -->
    <div class="form-card" style="max-width: 1000px;">

        <div class="form-header" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1>Class Overview</h1>
                <p>Manage pupils and view class capacities.</p>
            </div>
            <!-- Quick action button for adding new pupils -->
            <a href="add_pupil.php" class="btn" style="background-color: var(--success-color);">+ Add New Pupil</a>
        </div>

        <!-- Classes table with capacity and teacher assignment information -->
        <table>
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Capacity</th>
                    <th>Teacher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to get all classes with their assigned teachers (LEFT JOIN handles unassigned classes)
                $sql = "SELECT Classes.ClassID, Classes.ClassName, Classes.Capacity, Teachers.FullName
                        FROM Classes
                        LEFT JOIN Teachers ON Classes.TeacherID = Teachers.TeacherID";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display each class with conditional formatting for teacher assignment
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><strong>" . htmlspecialchars($row['ClassName']) . "</strong></td>";
                        echo "<td>" . htmlspecialchars($row['Capacity']) . " Students</td>";

                        // Handle unassigned teachers with visual indicator
                        $teacher = $row['FullName'] ? $row['FullName'] : "<span style='color:red; font-style:italic;'>Unassigned</span>";
                        echo "<td>" . $teacher . "</td>";

                        // Link to detailed pupil list for this class
                        echo "<td><a href='view_pupils.php?class_id=" . $row['ClassID'] . "' class='btn' style='font-size: 0.9rem;'>View List</a></td>";
                        echo "</tr>";
                    }
                } else {
                    // Handle case where no classes exist in database
                    echo "<tr><td colspan='4' style='text-align:center; padding: 20px;'>No classes found in database.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>