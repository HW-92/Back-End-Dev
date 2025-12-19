<?php
session_start();
include 'db_connect.php';

// Check if admin is logged in, redirect to login if not
if (!isset($_SESSION['admin_logged_in'])) { header("Location: login.php"); exit(); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Parents</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- Main navigation bar with admin menu and search functionality -->
    <nav>

        <div>
            <a href="index.php">Home</a>
            <a href="view_classes.php">Classes</a>
            <a href="view_teachers.php">Teachers</a>
            <a href="view_parents.php" style="font-weight: bold; text-decoration: underline;">Parents</a>
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

    <!-- Main content area displaying parent records -->
    <div class="form-card" style="max-width: 1000px;">
        <div class="form-header">
            <h1>Parent/Guardian Records</h1>
            <p>Contact details for all registered parents.</p>
        </div>

        <!-- Table displaying all parent information with edit functionality -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Retrieve all parents from database
                $result = $conn->query("SELECT * FROM Parents");
                // Display each parent in table row with edit link
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['FullName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>
                            <a href='edit_parent.php?id=".$row['ParentID']."' class='btn btn-edit' style='font-size:0.8rem;'>Edit</a>
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