<?php
session_start();
include 'db_connect.php';

// Check if admin is logged in, redirect to login if not
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Validate and process class_id parameter from URL
if (isset($_GET['class_id'])) {
    $class_id = intval($_GET['class_id']);

    // Get class name for display purposes
    $class_sql = "SELECT ClassName FROM Classes WHERE ClassID = $class_id";
    $class_result = $conn->query($class_sql);
    $class_data = $class_result->fetch_assoc();
    $class_name = $class_data ? $class_data['ClassName'] : "Unknown Class";

    // Complex query to get pupils with their parent information
    // Uses LEFT JOINs and GROUP_CONCAT to handle multiple parents per pupil
    $sql = "SELECT
                Pupils.*,
                GROUP_CONCAT(Parents.FullName SEPARATOR '<br>') AS ParentNames,
                GROUP_CONCAT(Parents.Phone SEPARATOR '<br>') AS ParentPhones
            FROM Pupils
            LEFT JOIN Pupil_Parent_Link ON Pupils.PupilID = Pupil_Parent_Link.PupilID
            LEFT JOIN Parents ON Pupil_Parent_Link.ParentID = Parents.ParentID
            WHERE Pupils.ClassID = ?
            GROUP BY Pupils.PupilID";

    // Prepare and execute the query with parameter binding
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $pupil_result = $stmt->get_result();

} else {
    // Handle missing class_id parameter
    die("Error: No class selected.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pupils in <?php echo htmlspecialchars($class_name); ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <!-- Navigation bar with back link to classes overview -->
    <nav>
        <a href="view_classes.php">&larr; Back to classes</a>
        <span>Admin Mode</span>
    </nav>

    <!-- Main content area displaying class pupil list -->
    <div class="form-card" style="max-width: 1000px;">

        <div class="form-header" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1><?php echo htmlspecialchars($class_name); ?></h1>
                <p>Class List & Parent Contact Details</p>
            </div>
        </div>

        <!-- Table displaying pupil information with parent contacts -->
        <table>
            <thead>
                <tr>
                    <th>Pupil Name</th>
                    <th>Address</th>
                    <th>Parents / Guardians</th>
                    <th>Contact</th>
                    <th>Medical Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($pupil_result->num_rows > 0) {
                    // Display each pupil with their information and linked parents
                    while($row = $pupil_result->fetch_assoc()) {
                        echo "<tr>";


                        echo "<td><strong>" . htmlspecialchars($row['FullName']) . "</strong></td>";


                        echo "<td>" . htmlspecialchars($row['Address']) . "</td>";

                        // Handle pupils with no linked parents
                        $parents = $row['ParentNames'] ? $row['ParentNames'] : "<em style='color:#999'>No parents linked</em>";
                        echo "<td>" . $parents . "</td>";

                        // Display parent phone numbers (may be multiple)
                        $phones = $row['ParentPhones'] ? $row['ParentPhones'] : "-";
                        echo "<td>" . $phones . "</td>";

                        // Highlight medical information if present (important for safety)
                        $med_style = ($row['MedicalInfo'] !== 'None' && $row['MedicalInfo'] !== '') ? "color:#d35400; font-weight:bold;" : "color:#7f8c8d;";
                        echo "<td style='$med_style'>" . htmlspecialchars($row['MedicalInfo']) . "</td>";


                        echo "<td>";
                        // Edit link for pupil information
                        echo "<a href='edit_pupil.php?id=" . $row['PupilID'] . "' class='btn btn-edit' style='font-size:0.8rem; padding: 5px 10px;'>Edit</a>";
                        // Delete link with confirmation dialog
                        echo "<a href='delete_pupil.php?id=" . $row['PupilID'] . "&class=" . $class_id . "'
                                 class='btn btn-delete'
                                 onclick='return confirm(\"Are you sure? This will delete the pupil record.\");'
                                 style='font-size:0.8rem; padding: 5px 10px;'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Handle empty class
                    echo "<tr><td colspan='6' style='text-align:center;'>No pupils found in this class.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>