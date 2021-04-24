<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra Luan Van</title>
</head>
<body>
<h1>hello</h1>
<?php
include "index.html";
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "traLuanVan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//query search LV_Ten
$search = $_POST["search"];

$search_LV_Ten = "SELECT LV_Ten, GV1_Ten FROM luanVan WHERE LV_Ten like '%$search%'";
$result_search_LV_Ten = $conn->query($search_LV_Ten);

$search_LV_Ten_theo_GV1_Ten_GV2_Ten = "select LV_Ten, GV1_Ten, GV2_Ten from traLuanVan.luanVan where GV1_Ten like '%$search%' or GV2_Ten like '%$search%';";
$result_search_LV_Ten_theo_GV1_Ten_GV2_Ten = $conn->query($search_LV_Ten_theo_GV1_Ten_GV2_Ten);

$search_LV_Ma = "SELECT LV_Ma, LV_Ten,SV1_Ten, SV2_Ten,GV1_Ten, GV2_Ten FROM luanVan WHERE LV_Ma like '%$search%'";
$result_search_LV_Ma = $conn->query($search_LV_Ma);

//in ra tat ca theo query sql
if($result_search_LV_Ten->num_rows > 0){
    while($row = $result_search_LV_Ten->fetch_assoc()){
        echo "Ten luan van: " . $row["LV_Ten"] . " " . "GV huong dan: " . $row["GV1_Ten"] . $row["GV2_Ten"] . "<br>";
        echo "<br>";
    }
}elseif($result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows > 0){
    while($row = $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->fetch_assoc()){
        echo "Ten Luan Van: " . $row["LV_Ten"] . "<br>" . "Giang vien huong dan 1: " . $row["GV1_Ten"] . "<br>" . "Giang vien huong dan 2: " . $row["GV2_Ten"] . "<br><br>";
    }
}elseif($result_search_LV_Ma->num_rows > 0){
    while($row = $result_search_LV_Ma->fetch_assoc()){
        echo "Ma Luan Van: " . $row['LV_Ma'] . "<br>";
        echo "Ten Luan Van: " . $row['LV_Ten'] . "<br>";
        echo "SV2: ".$row['SV2_Ten'] . "<br>" .'GV2: ' .$row['GV2_Ten'] . "<br>";
        /*
        Neu SV2_Ten va SV2_Ten bang voi KI TU 0 thi khong in ra gia tri
        */
        if($row['SV2_Ten'] == "0"){
            echo "Sinh vien thuc hien: " . $row['SV1_Ten'] . "<br>";
        }else {
            echo "Sinh vien thuc hien: " . $row['SV1_Ten'] . " va ". $row['SV2_Ten'] ."<br>";
        }
        if($row['GV2_Ten'] == "0"){
            echo "GV huong dan: " . $row['GV1_Ten'] . "<br>";
        } else {
            echo "GV huong dan: " . $row['GV1_Ten'] . " va " . $row['GV2_Ten'];
        }
        
        echo "<br>";
    }
} else{
    echo "0 result";
}


$conn->close();
?>
</body>
</html>
