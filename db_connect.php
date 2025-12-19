<?php

$servername = "localhost";
$username = "root";     
$password = "";          
$dbname = "st_alphonsus_school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to handle special characters
$conn->set_charset("utf8");
?>