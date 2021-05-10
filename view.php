<?php
$servername = "remotemysql.com";
$username = "11pvv4O6sJ";
$password = "NWnV8A7TuL";
$dbname = "11pvv4O6sJ";
$port = 3306;
$table = "luanVan";

// $username = "123";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "Connected successfully";
}

$sql = "select * from login where username='admin' and password='admin'";
$result = $conn->query($sql);
echo $result->num_rows . "<br>";

$row = $result->fetch_assoc();

echo $row["username"] . $row["password"];

if("admin" == $row["username"] and "admin" == $row["password"]){
    echo "123";
}

?>