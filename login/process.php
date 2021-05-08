<?php
// Database info
$servername = "remotemysql.com";
$username = "11pvv4O6sJ";
$password = "NWnV8A7TuL";
$dbname = "11pvv4O6sJ";
$port = 3306;
$table = "login";
$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

$user = $_POST['user'];
$pass = $_POST['pass'];

$user = stripslashes($user);
$pass = stripslashes($pass);
$user = $conn->real_escape_string($user);
$pass = $conn->real_escape_string($pass);



$result = $conn->query("Select * from login where username = '$username' and password = '$password' ")
    or die("Failed to connect database " . $conn->connect_errno);

$row = $result->fetch_array(MYSQLI_ASSOC);

echo $row['username'] . $row['password'];
