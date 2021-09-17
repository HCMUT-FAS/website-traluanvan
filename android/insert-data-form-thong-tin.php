<?php
// Form này để điện thoại gửi thông tin mượn vào.


$rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));

include "../Database/conn.php";

$stmt = $conn->prepare("INSERT INTO formThongTin(f_email, f_Ten_SV, f_Ma_SV, f_Ma_LV, f_Sdt, f_NgayMuon) VALUES (?, ?, ?, ?, ?, ?);");
$stmt->bind_param("ssssss", $f_email, $f_Ten_SV, $f_Ma_SV, $f_Ma_LV, $f_Sdt, $f_NgayMuon);

$f_email = $_GET['e'];
$f_Ten_SV = $_GET['tsv'];
$f_Ma_SV = $_GET['msv'];
$f_Ma_LV = $_GET['mlv'];
$f_Sdt = $_GET['sdt'];
$f_NgayMuon = $_GET['d'];

if (!$stmt->execute()) {
    // sftt = submit-form-thon-tin
    echo "Không thể gửi thông tin";
} else {
    require_once "$rootDir/send-email.php";
    $Body = '<a href="http://traluanvan.herokuapp.com/form-thong-tin/vertified-email.php?e=';
    $Body .= $f_email;
    $Body .= '">Vertified Email!</a>';
    $email = sendEmail('banhbeocodung00@gmail.com', 'K7z2Lk7djSskNJZuxC3q', 'banhbeocodung00@gmail.com', 'Vertification Email', $Body, $f_email);
    if(!$email->send()){
        header("Location: /index?vertified=failed");
        exit();
    }else {
        header("Location: /index?vertified=succeed");
        exit();
    }
    echo "Đã gửi thông tin thành công!";
}
// https://traluanvan/.herokuapp.com/Database/form_thong_tin_android.php?e=example@example.com&tsv=Bui%20An%20Khang&msv=1913683&mlv=20091002&sdt=0353032332&d=2021-06-19