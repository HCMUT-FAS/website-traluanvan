<?php
session_start();
// Nhận lại luận văn.
/*
NHIỆM VỤ:
1. Set available của mã luận văn thành True = 1.
2. Xóa khỏi bảng formThongTin.
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
            header("Location: admin.php?execute_available_true=false");
        } else {
            header("Location: admin.php?execute_available_true=true");
        }
    }
} else {
    echo "Invalid Url";
}
