<!DOCTYPE html>
<html>
<head>
    <title>Generate Print Request</title>
	 
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>

    <div class="form-container">
        <h1>Generate Print Request</h1>

        <form action="save_print_request.php" method="POST" enctype="multipart/form-data">
            <label for="requestTitle">Request Title:</label>
            <input type="text" name="requestTitle" required>
			
			  <label for="name">Name:</label>
            <textarea name="name" rows="4" required></textarea>


            <label for="description">Description:</label>
            <textarea name="description" rows="4" required></textarea>

           
            <label for="numberOfCopies">Number of Copies:</label>
            <input type="number" name="numberOfCopies" required>

            <label for="paperSize">Paper Size:</label>
            <select name="paperSize" required>
                <option value="A4">A4</option>
                <option value="Letter">Letter</option>
                <!-- Add more paper sizes as needed -->
            </select>

            <label for="color">Color:</label>
            <select name="color" required>
                <option value="Color">Color</option>
                <option value="BlackWhite">Black & White</option>
            </select>

            <label for="printShop">Select a Print Shop:</label>
            <select name="printShop" required>
                <option value="Shop1">Shop 1</option>
                <option value="Shop2">Shop 2</option>
                
                <!-- Add more print shop options as needed -->
            </select>

            <button type="submit">Submit Print Request</button>
        </form>
    </div>
</body>
</html>
