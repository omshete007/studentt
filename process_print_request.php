<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $printDetails = $_POST["printDetails"];

    // Check if a file was uploaded
    if (isset($_FILES["printFile"]) && $_FILES["printFile"]["error"] == 0) {
        $targetDirectory = "uploads/"; // Create a directory for uploaded files

        // Generate a unique filename to avoid overwriting existing files
        $targetFile = $targetDirectory . uniqid() . "_" . $_FILES["printFile"]["name"];

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["printFile"]["tmp_name"], $targetFile)) {
            // File upload was successful
            echo "File uploaded successfully. Print Details: $printDetails";
            // You can save the file path ($targetFile) in your database for reference.
        } else {
            echo "File upload failed. Please try again.";
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>
