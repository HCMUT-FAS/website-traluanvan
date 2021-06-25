<?php
// HAM NAY CHAY SIEU LAU LUON
session_start();
if (isset($_SESSION['id'])) {
    $mlv = $_GET['mlv'];
    if (empty($mlv)) {
        header("Location: admin.php?mlv=empty");
        exit();
    } else {
        include_once "../Database/conn.php";
        $delete->bind_param('s', $mlv);
        if (!$delete->execute()) {
            // delete = d
            header("Location: admin.php?d=false");
            exit();
        } else {
            header("Location: admin.php?d=true");
            exit();
        }
    }
} else {
    echo "Invalid Url";
}