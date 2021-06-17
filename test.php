<?php
include "Database/conn.php";
$search_LV_Ten = "SELECT * FROM $table WHERE LV_Ten LIKE '%$search%'";
$result_search_LV_Ten = $conn->query($search_LV_Ten);

$search_LV_Ten_theo_GV1_Ten_GV2_Ten = "SELECT * FROM $table WHERE GV1_Ten LIKE '%$search%' OR GV2_Ten LIKE '%$search%';";
$result_search_LV_Ten_theo_GV1_Ten_GV2_Ten = $conn->query($search_LV_Ten_theo_GV1_Ten_GV2_Ten);

$search_LV_Ma = "SELECT * FROM $table WHERE LV_Ma LIKE '%$search%'";
$result_search_LV_Ma = $conn->query($search_LV_Ma);

echo $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows . "<br>";
echo $result_search_LV_Ten->num_rows . "<br>";
echo $result_search_LV_Ma->num_rows . "<br>" . "<br>";

$data = array(strval($result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows) , $result_search_LV_Ten->num_rows, $result_search_LV_Ma->num_rows);

foreach ($data as $value) {
    echo gettype($value), "\n";
}
