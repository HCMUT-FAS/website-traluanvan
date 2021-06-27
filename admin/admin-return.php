<?php
session_start();
// Nhận lại luận văn.
/*
NHIỆM VỤ:
1. DONE Set available của mã luận văn thành True = 1.
2. set ngay tra = date()
*/
if (isset($_SESSION['id'])) {
    $mlv = $_GET['mlv'];
    if (empty($mlv)) {
        echo "khong co gia tri ma luan van";
    } else {
        include_once "../Database/conn.php";
        $available_true = $conn->prepare("UPDATE $a SET Available = TRUE WHERE LV_Ma = ?;");
        $available_true->bind_param('s', $mlv);
        if (!$available_true->execute()) {
            // execute_available_true = eat
            header("Location: admin.php?eat=false");
        } else {
            //update ngay tra duj kien = date(Y-m-d) 
            // Trong mysql chi hieu YYYY-MM-DD thoi
            $today = date('Y-m-d');
            include_once "../Database/conn.php";
            $return_date = $conn->prepare("UPDATE $formTable SET f_NgayTra = ? WHERE f_Ma_LV = ?;");
            $return_date->bind_param('ss', $today, $mlv);
            if (!$return_date->execute()) {
                // return_date_execute = rde
                header("Location: admin?rde=false");
            } else {
                header("Location: admin?rde=true");
            }
        }
    }
} else {
    echo "Invalid Url";
}
