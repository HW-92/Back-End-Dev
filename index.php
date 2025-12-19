<?php
session_start();
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St Alphonsus Primary School</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Special styles just for the landing hero section */
        .hero-section {
            text-align: center;
            padding: 60px 20px;
        }
        .hero-section h1 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
            color: #555;
            max-width: 600px;
            margin: 0 auto 40px auto;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Dynamic navigation bar that changes based on authentication status -->
    <nav>
        <?php if (isset($_SESSION['admin_logged_in'])): ?>
            <!-- Admin navigation: full access to system features -->
            <div>
                <a href="index.php" style="font-weight: bold; text-decoration: underline;">Home</a>
                <a href="view_classes.php">Classes</a>
                <a href="view_teachers.php">Teachers</a>
                <a href="view_parents.php">Parents</a>
            </div>
            <div style="display: flex; align-items: center; gap: 15px;">
                <!-- Search functionality for quick access to records -->
                <form action="search.php" method="GET" style="display: flex; align-items: center; margin: 0;">
                <input type="text" name="query" placeholder="Search name..." required style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; margin: 0; height: 35px;">
                <button type="submit" class="btn" style="padding: 0 15px; height: 35px; border-radius: 4px; margin-left: 5px; line-height: 1;">Search</button>
                </form>
                <span>Welcome, Admin</span>
                <a href="logout.php" style="margin-left: 15px; background: rgba(255,255,255,0.2); padding: 5px 10px; border-radius: 3px;">Logout</a>
            </div>
        <?php else: ?>
            <!-- Public navigation: limited to home and login -->
                <a href="index.php" style="font-weight: bold; text-decoration: underline;">Home</a>
                <a href="login.php">Staff Login</a>
        <?php endif; ?>

    </nav>

    <!-- Main hero section with school branding -->
    <div class="hero-section">
        <h1>Welcome to St Alphonsus Primary School</h1>
        <p style="font-style: italic;">Nothing is Impossible to a Willing Heart</p>

        <!-- Dynamic action buttons based on authentication status -->
        <div class="action-buttons">
            <?php if (isset($_SESSION['admin_logged_in'])): ?>
                <!-- Admin: direct access to dashboard -->
                <a href="view_classes.php" class="btn" style="padding: 15px 30px; font-size: 1.1rem;">
                    Access Admin Dashboard
                </a>
            <?php else: ?>
                <!-- Public: login prompt -->
                <a href="login.php" class="btn" style="padding: 15px 30px; font-size: 1.1rem;">
                    Log In to System
                </a>
            <?php endif; ?>
        </div>
    </div>

</div>

</body>
</html>