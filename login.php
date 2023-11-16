<?php
session_start();

// Connect to the MySQL database (replace with your actual database credentials)
$mysqli = new mysqli("localhost", "root", "", "printing_system");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve login form data
$username = $_POST['username'];
$password = $_POST['password'];

// Verify user credentials
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // User authenticated, store user data in the session
    $_SESSION['username'] = $username;

    // Redirect to the shop dashboard
    header("Location: shop_dashboard.php");
    exit();
} else {
    // Authentication failed, redirect to the login page
    header("Location: login.html?login_failed=true");
    exit();
}

$stmt->close();
$mysqli->close();
?>
