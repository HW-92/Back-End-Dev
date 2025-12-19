<?php
include 'db_connect.php';
$pass = password_hash('admin123', PASSWORD_DEFAULT);
$sql = "INSERT INTO Users (Username, PasswordHash) VALUES ('admin', '$pass')";
if ($conn->query($sql)) echo "Admin user created successfully.";
?>