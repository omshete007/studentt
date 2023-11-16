<!DOCTYPE html>
<html>
<head>
     <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
        }

        .registration-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        select {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
</head>
<body>
    <h1>Registration</h1>

    <?php
$server_name="localhost";
$username="root";
$password="";
$database_name="printing_system";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
        $role = $_POST["role"];

        $db = new mysqli("localhost", "username", "password", "printing_system");

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
        if ($db->query($query) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Registration failed: " . $db->error;
        }

        $db->close();
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="role">Role:</label>
        <select name="role" required>
            <option value="student">Student</option>
            <option value="shopkeeper">Shopkeeper</option>
        </select><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
