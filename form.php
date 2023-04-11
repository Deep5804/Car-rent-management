
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

  // Store form data in variables
  $pickup_location = $_POST['pickup_location'];
  $return_location = $_POST['return_location'];
  $pickup_datetime = $_POST['pickup_datetime'];
  $return_datetime = $_POST['return_datetime'];
  $full_name = $_POST['full_name'];
  $email_address = $_POST['email_address'];
  $phone_number = $_POST['phone_number'];

  // Insert data into table
  $sql = "INSERT INTO rent_cartable (pickup_location, return_location, pickup_datetime, return_datetime, full_name, email_address, phone_number)
          VALUES ('$pickup_location', '$return_location', '$pickup_datetime', '$return_datetime', '$full_name', '$email_address', '$phone_number')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>