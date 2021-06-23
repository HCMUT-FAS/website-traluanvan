<?
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
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }