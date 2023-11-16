<?php
// Connect to the database (replace with your database connection code)
$db = new mysqli("localhost", "root", "", "printing_system");

// Check the database connectionif ($db->connect_error) {



// Retrieve all print requests
$query = "SELECT stud_print_requests FROM print_requests";
$result = $db->query($query);

echo "<h2>All Received Print Requests</h2>";

if ($result && $result->num_rows > 0) {
    // Display a table header
    echo "<table border='1'>";
    echo "<tr><th>Request Title</th><th>Description</th><th>Number of Copies</th><th>Paper Size</th><th>Color</th><th>Customer Name</th><th>Status</th></tr>";

    // Fetch and display each print request
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['requestTitle'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['numberOfCopies'] . "</td>";
        echo "<td>" . $row['paperSize'] . "</td>";
        echo "<td>" . $row['color'] . "</td>";
        echo "<td>" . $row['customerName'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No print requests found.";
}

// Close the database connection
$db->close();
?>