<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>hello</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "traLuanVan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$search = $_POST["search"];

$sql = "SELECT * FROM luanVan where LV_Ten like '%$search%'";

$result = $conn->query($sql);

// xem so hang
echo $result->num_rows . "<br>";

//in ra tat ca theo query sql
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "Ten luan van: " . $row["LV_Ten"] . " " . "GV huong dan: " . $row["GV1_Ten"] . "<br>";
    }
}else{
    echo "0 result";
}


$conn->close();
?>
</body>
</html>
