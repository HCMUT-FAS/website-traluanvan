<?php
include "../Database/conn.php";
include "../include/function.php";
$search = "%" . $_GET['s'] . "%";
// $sql = "SELECT * FROM $table WHERE LV_Ten LIKE '%$search%' OR GV1_Ten LIKE '%$search%' OR GV2_Ten LIKE '%$search%' OR LV_Ma LIKE '%$search%';";
// $result = $conn->query($sql);

//create a template THEN create a prepare statement
$stmt = $conn->prepare("SELECT * FROM $table WHERE LV_Ten LIKE ? OR GV1_Ten LIKE ? OR GV2_Ten LIKE ? OR LV_Ma LIKE ?;");
$stmt->bind_param('ssss', $search, $search, $search, $search);
$stmt->execute();
if ($stmt) {
    echo "query success <br>";
} else {
    echo "Failed <br>";
}

$result = $stmt->get_result();

echo $result->num_rows . "<br>";


echo "<table>";
displayLables();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
    }
} else {
    echo "No result";
}

echo "</table>";
$stmt->close();
$conn->close();
