

<?php

$name = $_POST["name"];
$email = $_POST["email"];
// $day = $_POST["day"];
$time = $_POST["time"];


$day = date('Y-m-d', strtotime($_POST['day']));

$host = "localhost";
$dbname = "barber_services";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);



// $conn = new mysqli($servername, $username, $password, $dbname);
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";
$sql = "INSERT INTO bookings (service, price, name)
VALUES ('Machine Cutting 14+', '25.00', '$name', '$email', '$day', '$time')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>