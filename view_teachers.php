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
    <title>Manage Teachers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- Main navigation bar with admin menu and search functionality -->
    <nav>

        <div>
            <a href="index.php">Home</a>
            <a href="view_classes.php">Classes</a>
            <a href="view_teachers.php" style="font-weight: bold; text-decoration: underline;">Teachers</a>
            <a href="view_parents.php">Parents</a>
        </div>

        <div style="display: flex; align-items: center; gap: 15px;">
            <!-- Global search form for quick access to any record -->
            <form action="search.php" method="GET" style="display: flex; align-items: center; margin: 0;">
            <input type="text" name="query" placeholder="Search name..." required  style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; margin: 0; height: 35px;">
            <button type="submit" class="btn" style="padding: 0 15px; height: 35px; border-radius: 4px; margin-left: 5px; line-height: 1;">Search</button>
            </form>
            <span style="white-space: nowrap;">Welcome, Admin</span>
            <a href="logout.php" style="background: rgba(255,255,255,0.2); padding: 8px 12px; border-radius: 3px; height: 35px; display: flex; align-items: center; text-decoration: none;">Logout</a>
        </div>

    </nav>

    <!-- Main content area displaying teacher records -->
    <div class="form-card" style="max-width: 1000px;">
        <div class="form-header">
            <h1>Teacher Records</h1>
            <p>Overview of all staff, salaries, and background checks.</p>
        </div>

        <!-- Table displaying teacher information -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Annual Salary</th>
                    <th>DBS Check</th>
                    <th>Assigned Class</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to get all teachers with their assigned class information
                $sql = "SELECT Teachers.*, Classes.ClassName
                        FROM Teachers
                        LEFT JOIN Classes ON Teachers.TeacherID = Classes.TeacherID";
                $result = $conn->query($sql);

                // Display each teacher with conditional formatting for data
                while($row = $result->fetch_assoc()) {
                    // Format background check status with color coding
                    $bg_check = ($row['BackgroundCheck'] == 1) ? "<span style='color:green'>Passed</span>" : "<span style='color:red'>Pending</span>";

                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['FullName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                    // Display salary with currency formatting
                    echo "<td>£" . htmlspecialchars($row['AnnualSalary']) . "</td>";
                    echo "<td>" . $bg_check . "</td>";
                    // Handle unassigned teachers
                    echo "<td>" . ($row['ClassName'] ? $row['ClassName'] : "<em>Unassigned</em>") . "</td>";
                    echo "<td>
                            <a href='edit_teacher.php?id=".$row['TeacherID']."' class='btn btn-edit' style='font-size:0.8rem;'>Edit</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>