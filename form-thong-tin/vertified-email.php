<?php
require_once "../Database/conn.php";

$e = $_GET['e'];

$stmt = $conn->prepare("UPDATE $formTable SET f_vertified = TRUE WHERE f_email = ?;");
$stmt->bind_param('s', $e);
if($stmt->execute()){
    header("Location: ../index.php?vertified=success");
}else {
    echo "fail to set true";
}
