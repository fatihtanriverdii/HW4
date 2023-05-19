<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data using $_POST
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$gender = $_POST['gender'];

// Validate the form data (you can add more validation if needed)
if (empty($fullname) || empty($email) || empty($gender)) {
    die("Error: All fields are required.");
}

// Prepare and execute the SQL query to insert the data
$stmt = $conn->prepare("INSERT INTO students (full_name, email, gender) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $fullname, $email, $gender);

if ($stmt->execute()) {
    echo "Success! Data inserted into the database.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
