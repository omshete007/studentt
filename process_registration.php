<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $userType = $_POST["userType"];

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "print_system";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO users (id, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $id, $username, $password, $userType);

    if ($stmt->execute()) {
        $response = array("message" => "Registration successful!");
        echo json_encode($response);
    } else {
        $response = array("message" => "Registration failed: " . $stmt->error);
        echo json_encode($response);
    }

    $stmt->close();
    $conn->close();
}
?>
