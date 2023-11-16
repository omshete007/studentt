<!DOCTYPE html>
<html>
<head>
    <title>Shopkeeper Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="container">
            <h1 class="navbar-brand">Shopkeeper Dashboard</h1>
        </div>
    </nav>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Order Summary
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4>Pending Orders</h4>
                                <p>5</p>
                            </div>
                            <div class="col">
                                <h4>Completed Orders</h4>
                                <p>10</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="card">
            <div class="card-header bg-warning">
                <h2>Order Details</h2>
          <?php
// Connect to the MySQL database (replace with your actual database credentials)

session_start();

// Check if the user is authenticated
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: login.html");
    exit();
}
$shopName = $_SESSION['shopName'];

$mysqli = new mysqli("localhost", "root", "", "printing_system");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve print requests from the database
$sql = "SELECT * FROM stud_print_requests WHERE shopName = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $shopName);
$stmt->execute();
$result = $stmt->get_result();

// Display print requests
echo "<h1>Print Requests for $shopName</h1>";
echo "<table border='1'>";
echo "<tr><th>Request Title</th><th>Description</th><th>Status</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['requestTitle']}</td>";
    echo "<td>{$row['description']}</td>";
    echo "<td>{$row['status']}</td>";
    echo "</tr>";
}

echo "</table>";
echo "<a href='logout.php'>Logout</a>";
$stmt->close();
$mysqli->close();
?>
</body>
</html>