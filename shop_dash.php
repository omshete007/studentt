<?php
// Connect to the database
$db = new mysqli("localhost", "root", "", "printing_system");

// Order Summary
$queryPending = "SELECT COUNT(*) as pendingCount FROM print_requests WHERE status = 'Pending'";
$resultPending = $db->query($queryPending);
$pendingCount = ($resultPending) ? $resultPending->fetch_assoc()['pendingCount'] : 0;

$queryCompleted = "SELECT COUNT(*) as completedCount FROM print_requests WHERE status = 'Completed'";
$resultCompleted = $db->query($queryCompleted);
$completedCount = ($resultCompleted) ? $resultCompleted->fetch_assoc()['completedCount'] : 0;

echo "<h2>Order Summary</h2>";
echo "<p>Pending Orders: $pendingCount</p>";
echo "<p>Completed Orders: $completedCount</p>";

// Order Details
$queryPrintRequests = "SELECT * FROM print_requests";
$resultPrintRequests = $db->query($queryPrintRequests);

echo "<h2>Order Details</h2>";
if ($resultPrintRequests) {
    while ($row = $resultPrintRequests->fetch_assoc()) {
        $requestTitle = $row['requestTitle'];
        $description = $row['description'];
        $numberOfCopies = $row['numberOfCopies'];
        $paperSize = $row['paperSize'];
        $color = $row['color'];
        $customerName = $row['customerName'];
        $status = $row['status'];

        echo "<h3>Print Request Details</h3>";
        echo "<p>Request Title: $requestTitle</p>";
        echo "<p>Description: $description</p>";
        echo "<p>Number of Copies: $numberOfCopies</p>";
        echo "<p>Paper Size: $paperSize</p>";
        echo "<p>Color: $color</p>";
        echo "<p>Customer: $customerName</p>";

        if ($status === 'Pending') {
            echo "<p>Status: Pending</p>";
        } else {
            echo "<p>Status: Completed</p>";
        }
    }
} else {
    echo "No print requests found.";
}

// Display pending requests
$queryPendingRequests = "SELECT requestTitle FROM print_requests WHERE status = 'Pending'";
$resultPendingRequests = $db->query($queryPendingRequests);

echo "<h2>Pending Requests</h2>";
if ($resultPendingRequests) {
    while ($row = $resultPendingRequests->fetch_assoc()) {
        $requestTitle = $row['requestTitle'];
        echo "<p>$requestTitle</p>";
    }
}

// Close the database connection
$db->close();
?>
