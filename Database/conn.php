<?php
$servername = "remotemysql.com";
$username = "11pvv4O6sJ";
$password = "NWnV8A7TuL";
$dbname = "11pvv4O6sJ";
$port = 3306;
$table = "luanVan";
$loginTable = "login";
$formTable = "formThongTin";
$a = "available";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
$delete = $conn->prepare("DELETE FROM $formTable WHERE f_Ma_LV = ?;");
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";