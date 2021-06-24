<?php
/*
Những việc cần làm:
1. Tạo logic khi nhập dữ liệu vào database.
    1. Không phải dữ liệu nào cũng nhận.
    2. Nếu người nhập không điền gì thì cũng phải thông báo.
2. Gửi email cho user
    1. DONE Có đường dẫn xác nhận là email đó là của mình.
    2. Các biến của thông tin này sẽ đươc mã hóa.
3. Ghi vào bảng formThongTin và history.
*/

if (isset($_POST['form-submit'])) {
    // Email phải có cấu trúc @hcmut.edu.vn
    $f_email = $_POST['e'];
    // Tự động in hoa các chữ cái đầu.
    $f_Ten_SV = $_POST['tsv'];
    $f_Ma_SV = $_POST['msv'];
    // Khi tìm mã luận văn thì tự động in ra tên luận văn nằm ở dưới.
    $f_Ma_LV = $_POST['mlv'];
    $f_Sdt = $_POST['sdt'];
    $f_NgayMuon = $_POST['d'];
    if (empty($f_email) or empty($f_Ten_SV) or empty($f_Ma_SV) or empty($f_Ma_LV) or empty($f_Sdt) or empty($f_NgayMuon)) {
        header("Location: form-muon-luan-van?fs=empty");
        exit();
    } else {
        include "../Database/conn.php";
        $submit_form = $conn->prepare("INSERT INTO $formTable(f_email, f_Ten_SV, f_Ma_SV, f_Ma_LV, f_Sdt, f_NgayMuon) VALUES (?, ?, ?, ?,?, ?);");
        $submit_form->bind_param("ssssis", $f_email, $f_Ten_SV, $f_Ma_SV, $f_Ma_LV, $f_Sdt, $f_NgayMuon);
        if (!$submit_form->execute()) {
            // sftt = submit-form-thon-tin
            header("Location: ../index?sftt=failed");
            exit();
        } else {
            require_once "../include/send-email.php";
            $Body = '<a href="http://traluanvan.herokuapp.com//form-thong-tin/vertified-email.php?e=';
            $Body .= $f_email;
            $Body .= '">Vertified Email!</a>';
            sendEmail('banhbeocodung00@gmail.com', 'K7z2Lk7djSskNJZuxC3q', 'banhbeocodung00@gmail.com', 'Vertification Email', $Body, $f_email);
            header("Location: ../index?sftt=succeed&sftt=succeed");
            exit();
        }
    }
} else {
    header("Location: form-muon-luan-van.php?fs=empty");
    exit();
}
