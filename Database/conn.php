<?php
/*
Host: sql5.freesqldatabase.com
Database name: sql5437850
Database user: sql5437850
Database password: s4kBVISWFR
Port number: 3306
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traluanvan";
$port = 3306;
$table = "luanvan";
$loginTable = "login";
$formTable = "formThongTin";
$a = "available";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
mysqli_set_charset($conn, 'UTF8');
$delete = $conn->prepare("DELETE FROM $formTable WHERE f_Ma_LV = ?;");
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";