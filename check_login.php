<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
	$role= $_POST["userType"];

    // Database connection parameters
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "printing_system";



    // Create a connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);





if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User-provided credentials
$userProvidedUsername = $_POST['username'];  // Assuming you are using a form with POST method
$userProvidedPassword = $_POST['password'];

// SQL query to fetch the hashed password for the provided username
$sql = "SELECT password FROM users WHERE username = '$userProvidedUsername'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, check the password
    $row = $result->fetch_assoc();
    $storedPassword = $row['username'];

    // Verify the password
    if (password_verify($userProvidedPassword, $storedPassword)) {
        echo 'Login successful!';
		
		if($role=="shopkeeper")
			{
			        header("Location: SHOP-DASHBOARD.php"); // Replace with the actual dashboard URL
			}
			
			else if($role=="student")
			{
				 header("Location: generate_print_request.php"); // Replace with the actual dashboard URL

			}
    } else {
        echo 'Invalid password';
		
		if($role=="shopkeeper")
			{
			        header("Location: SHOP-DASHBOARD.php"); // Replace with the actual dashboard URL
			}
			
			else if($role=="student")
			{
				 header("Location: generate_print_request.php"); // Replace with the actual dashboard URL

			}
    }
} else {
    // User not found
    echo 'User not found';
}
}
// Close the database connection
$conn->close();

?> 