<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentcar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback(fullname, address, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fullname, $address, $subject, $message);

// set parameters and execute
$fullname = $_POST['name'];
$address = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
