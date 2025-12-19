<?php
session_start();

// Include database connection file
include 'db_connect.php';

// Check if admin is logged in, terminate if not
if (!isset($_SESSION['admin_logged_in'])) {
    die("Access Denied.");
}

// Validate that pupil ID is provided in URL
if (!isset($_GET['id'])) die("No ID provided.");
$pupil_id = intval($_GET['id']);

// Handle parent unlinking via GET parameters
if (isset($_GET['action']) && $_GET['action'] == 'remove_parent' && isset($_GET['parent_id'])) {
    $parent_to_remove = intval($_GET['parent_id']);
    $stmt = $conn->prepare("DELETE FROM Pupil_Parent_Link WHERE PupilID = ? AND ParentID = ?");
    $stmt->bind_param("ii", $pupil_id, $parent_to_remove);
    $stmt->execute();

    header("Location: edit_pupil.php?id=$pupil_id&msg=unlinked");
    exit();
}

// Handle parent linking via POST form submission
if (isset($_POST['add_parent_link'])) {
    $parent_to_add = intval($_POST['parent_id']);

    // Check current number of linked parents (maximum 2 allowed)
    $check = $conn->query("SELECT COUNT(*) as count FROM Pupil_Parent_Link WHERE PupilID = $pupil_id");
    $row = $check->fetch_assoc();

    if ($row['count'] >= 2) {
        $error = "Error: This pupil already has 2 parents assigned.";
    } else {
        // Insert new parent-pupil relationship (IGNORE prevents duplicates)
        $stmt = $conn->prepare("INSERT IGNORE INTO Pupil_Parent_Link (PupilID, ParentID) VALUES (?, ?)");
        $stmt->bind_param("ii", $pupil_id, $parent_to_add);
        if ($stmt->execute()) {
            $success = "Parent linked successfully.";
        } else {
            $error = "Database error.";
        }
    }
}

// Handle pupil information update via POST form submission
if (isset($_POST['update_pupil'])) {
    // Sanitise form input data
    $name = trim($_POST['full_name']);
    $address = trim($_POST['address']);
    $medical = trim($_POST['medical']);
    $class_id = intval($_POST['class_id']);

    // Update pupil record in database
    $stmt = $conn->prepare("UPDATE Pupils SET FullName=?, Address=?, MedicalInfo=?, ClassID=? WHERE PupilID=?");
    $stmt->bind_param("sssii", $name, $address, $medical, $class_id, $pupil_id);
    if ($stmt->execute()) {
        $success = "Pupil details updated.";
    }
}

// Retrieve pupil data for form population
$stmt = $conn->prepare("SELECT * FROM Pupils WHERE PupilID = ?");
$stmt->bind_param("i", $pupil_id);
$stmt->execute();
$pupil = $stmt->get_result()->fetch_assoc();
if (!$pupil) die("Pupil not found.");

// Retrieve currently linked parents for display
$linked_parents = $conn->query("SELECT Parents.ParentID, Parents.FullName, Parents.Phone
                                FROM Parents
                                JOIN Pupil_Parent_Link ON Parents.ParentID = Pupil_Parent_Link.ParentID
                                WHERE Pupil_Parent_Link.PupilID = $pupil_id");

// Retrieve all parents for the linking dropdown
$all_parents = $conn->query("SELECT ParentID, FullName FROM Parents ORDER BY FullName ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pupil - St Alphonsus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- Navigation bar with back link to pupil's class -->
    <nav>
        <a href="view_pupils.php?class_id=<?php echo $pupil['ClassID']; ?>">&larr; Back to Class List</a>
        <span>Admin Mode</span>
    </nav>

    <!-- Display error or success messages if any -->
    <?php if(isset($error)) echo "<div class='alert alert-error'>$error</div>"; ?>
    <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

    <!-- Main form container for editing pupil information -->
    <div class="form-card">
        <div class="form-header">
            <h1>Edit Pupil Details</h1>
            <p>Update information for <strong><?php echo htmlspecialchars($pupil['FullName']); ?></strong></p>
        </div>

        <!-- Form for pupil information editing -->
        <form method="POST">
            <!-- Full Name input field -->
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($pupil['FullName']); ?>" required>
            </div>

            <!-- Address input field -->
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($pupil['Address']); ?>" required>
            </div>

            <!-- Medical information textarea -->
            <div class="form-group">
                <label>Medical Info</label>
                <textarea name="medical"><?php echo htmlspecialchars($pupil['MedicalInfo']); ?></textarea>
            </div>

            <!-- Class selection dropdown with current class pre-selected -->
            <div class="form-group">
                <label>Class</label>
                <select name="class_id">
                    <?php
                    // Query database to get all available classes
                    $classes = $conn->query("SELECT ClassID, ClassName FROM Classes");
                    // Loop through results and create option elements, marking current class as selected
                    while($c = $classes->fetch_assoc()) {
                        $selected = ($c['ClassID'] == $pupil['ClassID']) ? "selected" : "";
                        echo "<option value='".$c['ClassID']."' $selected>".$c['ClassName']."</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Form action button for pupil details -->
            <div class="form-actions">
                <button type="submit" name="update_pupil" class="btn">Save Pupil Details</button>
            </div>
        </form>
    </div>

    <!-- Parent management section -->
    <div class="form-card" style="margin-top: 20px;">
        <div class="form-header">
            <h1>Manage Parents</h1>
            <p>Link or unlink parents for this child (Max 2).</p>
        </div>

        <!-- Table displaying currently linked parents -->
        <table style="margin-bottom: 30px;">
            <thead>
                <tr>
                    <th>Parent Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($linked_parents->num_rows > 0) {
                    // Display each linked parent with unlink option
                    while($p = $linked_parents->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($p['FullName']) . "</td>";
                        echo "<td>" . htmlspecialchars($p['Phone']) . "</td>";
                        echo "<td>
                                <a href='edit_pupil.php?id=$pupil_id&action=remove_parent&parent_id=".$p['ParentID']."'
                                   class='btn btn-delete'
                                   style='padding:5px 10px; font-size:0.8rem;'
                                   onclick='return confirm(\"Unlink this parent?\");'>Unlink</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    // Display message when no parents are linked
                    echo "<tr><td colspan='3'>No parents linked yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Form for linking additional parents -->
        <h3 style="margin-bottom: 10px; color: var(--primary-color);">Link Another Parent</h3>
        <form method="POST" style="background: #f9f9f9; padding: 15px; border-radius: 5px; display: flex; gap: 10px; align-items: center;">
            <!-- Dropdown with all available parents -->
            <select name="parent_id" style="margin-bottom: 0; flex-grow: 1;">
                <?php
                while($all = $all_parents->fetch_assoc()) {
                    echo "<option value='".$all['ParentID']."'>".$all['FullName']."</option>";
                }
                ?>
            </select>
            <!-- Submit button for linking parent -->
            <button type="submit" name="add_parent_link" class="btn" style="background: var(--success-color);">Link Parent</button>
        </form>
    </div>

</div>

</body>
</html>