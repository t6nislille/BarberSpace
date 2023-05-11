<?php

$host = "localhost";
$dbname = "barber_services";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

$conn = new mysqli($host, $username, $password, $dbname);

if(isset($_POST['send']))
{

  $name = $_POST["name"];
  $email = $_POST["email"];
  $time1 = $_POST["time"];
  $day1 = $_POST["day"];

  $time = date('H:i:s',strtotime($time1));
  $day = date('Y-m-d', strtotime($day1));

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO bookings (service, price, name, email, day, time)
  VALUES ('Beard Trimming + Head Massage + Face Massage', '25.00', '$name', '$email', '$day', '$time')";

  function function_alert($message) {
    echo "<script>alert('$message');</script>";
}
  
  if ($conn->query($sql) === TRUE) {
    function_alert("New booking for " . $name . "(email: " . $email . ") at " . $day . " in " . $time . " o clock. ");
    echo "<script> location.href='../index.html'; </script>";
    exit;

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
?>