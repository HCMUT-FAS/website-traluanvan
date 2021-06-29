<?php
include "../Database/conn.php";

$available = $conn->query("SELECT * FROM $a;");

while ($row = $available->fetch_assoc()) {
    $output[] = $row;
}

printf(json_encode($output, JSON_UNESCAPED_UNICODE));
$conn->close();