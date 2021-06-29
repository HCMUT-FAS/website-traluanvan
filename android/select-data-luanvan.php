<?php
include "../Database/conn.php";

$lv = $conn->query("SELECT * FROM $table;");

while ($row = $lv->fetch_assoc()) {
    $output[] = $row;
}

printf(json_encode($output, JSON_UNESCAPED_UNICODE));
$conn->close();