<?php


// Connect to the MySQL database (replace with your actual database credentials)
$mysqli = new mysqli("localhost", "root", "", "printing_system");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve form data
$requestTitle = $_POST['requestTitle'];
$description = $_POST['description'];
$numberOfCopies = $_POST['numberOfCopies'];
$paperSize = $_POST['paperSize'];
$color = $_POST['color'];

//$uploadFilePath = $_POST['uploadFilePath'];
$customerName = $_POST['name'];
$shop = $_POST['printShop'];


// Prepare and bind the SQL statement with placeholders
$sql = "INSERT INTO stud_print_requests (requestTitle, description, numberOfCopies, paperSize, color,customerName,shopName) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql);

// Bind parameters to the placeholders
$stmt->bind_param( "ssisss",$requestTitle, $description, $numberOfCopies, $paperSize, $color, $customerName,$shop);

// Execute the statement
if ($stmt->execute()) {
    echo "Print request submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}


// Close the statement and the database connection
$stmt->close();
$mysqli->close();
?>