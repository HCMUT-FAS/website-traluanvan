<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/table.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <span class="material-icons">
        notifications
    </span>
    <span class="material-icons">
        circle_notifications
    </span>
    <span class="material-icons">
        notifications_none
    </span>
</body>

</html>
<?php
include "function.php";
include "Database/conn.php";
$search_LV_Ten = "SELECT * FROM luanVan WHERE LV_Ten LIKE '%laser%';";
$result_search_LV_Ten = $conn->query($search_LV_Ten);
echo $result_search_LV_Ten->num_rows . "<br>";
echo "<div>";
echo "<table>";
// echo "<table id='myTable'>";
displayLables();
if ($result_search_LV_Ten->num_rows > 0) {
    while ($row = $result_search_LV_Ten->fetch_assoc()) {
        displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
    }
    if ($result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows > 0) {
        while ($row = $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->fetch_assoc()) {
            displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
        }
    }
    if ($result_search_LV_Ma->num_rows > 0) {
        while ($row = $result_search_LV_Ma->fetch_assoc()) {
            displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
        }
    }
}
echo "</table>";
echo "</div>";
$conn->close();

?>