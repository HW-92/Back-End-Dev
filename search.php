<?php
session_start();
include 'db_connect.php';

// Check if admin is logged in, redirect to login if not
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Process search query from GET parameter and prepare for SQL LIKE query
$search_term = isset($_GET['query']) ? trim($_GET['query']) : '';
$like_term = "%" . $search_term . "%";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results: <?php echo htmlspecialchars($search_term); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <!-- Navigation bar with back link and persistent search functionality -->
    <nav>
        <a href="view_classes.php">&larr; Back to Dashboard</a>
        <div style="display: flex; align-items: center; gap: 15px;">
            <!-- Inline search form for quick new searches -->
            <form action="search.php" method="GET" style="display: flex; align-items: center; margin: 0;">
            <input type="text" name="query" placeholder="Search name..." required style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; margin: 0; height: 35px;">
            <button type="submit" class="btn" style="padding: 0 15px; height: 35px; border-radius: 4px; margin-left: 5px; line-height: 1;">Search</button>
            </form>
        </div>
        <div>
            <span>Welcome, Admin</span>
            <a href="logout.php" style="margin-left: 15px; background: rgba(255,255,255,0.2); padding: 5px 10px; border-radius: 3px;">Logout</a>
        </div>
    </nav>

    <!-- Main search results container -->
    <div class="form-card" style="max-width: 1000px;">
        <div class="form-header">
            <h1>Search Results</h1>
            <p>Matches for: <strong>"<?php echo htmlspecialchars($search_term); ?>"</strong></p>
        </div>

        <?php if ($search_term === ''): ?>
            <!-- Handle empty search terms -->
            <p>Please enter a valid search term.</p>
        <?php else: ?>

            <!-- Pupils search results section -->
            <h3 style="color:var(--primary-color); margin-top:20px;">Pupils</h3>
            <?php
            // Search pupils table with LEFT JOIN to include class information
            $stmt = $conn->prepare("SELECT Pupils.PupilID, Pupils.FullName, Classes.ClassName
                                    FROM Pupils
                                    LEFT JOIN Classes ON Pupils.ClassID = Classes.ClassID
                                    WHERE Pupils.FullName LIKE ?");
            $stmt->bind_param("s", $like_term);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Display results in table format with edit links
                echo "<table><thead><tr><th>Name</th><th>Class</th><th>Action</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['FullName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ClassName']) . "</td>";
                    echo "<td><a href='edit_pupil.php?id=" . $row['PupilID'] . "' class='btn btn-edit' style='font-size:0.8rem;'>Edit</a></td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p style='color:#777; font-style:italic;'>No pupils found matching this name.</p>";
            }
            ?>

            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

            <!-- Teachers search results section -->
            <h3 style="color:var(--primary-color);">Teachers</h3>
            <?php
            // Search teachers table
            $stmt = $conn->prepare("SELECT TeacherID, FullName, Phone FROM Teachers WHERE FullName LIKE ?");
            $stmt->bind_param("s", $like_term);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Display results in table format with edit links
                echo "<table><thead><tr><th>Name</th><th>Phone</th><th>Action</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['FullName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                    echo "<td><a href='edit_teacher.php?id=" . $row['TeacherID'] . "' class='btn btn-edit' style='font-size:0.8rem;'>Edit</a></td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p style='color:#777; font-style:italic;'>No teachers found matching this name.</p>";
            }
            ?>

            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

            <!-- Parents search results section -->
            <h3 style="color:var(--primary-color);">Parents</h3>
            <?php
            // Search parents table
            $stmt = $conn->prepare("SELECT ParentID, FullName, Phone, Email FROM Parents WHERE FullName LIKE ?");
            $stmt->bind_param("s", $like_term);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Display results in table format with edit links
                echo "<table><thead><tr><th>Name</th><th>Phone</th><th>Email</th><th>Action</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['FullName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                    echo "<td><a href='edit_parent.php?id=" . $row['ParentID'] . "' class='btn btn-edit' style='font-size:0.8rem;'>Edit</a></td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p style='color:#777; font-style:italic;'>No parents found matching this name.</p>";
            }
            ?>

        <?php endif; ?>
    </div>
</div>

</body>
</html>