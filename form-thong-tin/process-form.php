<?php
/*
Những việc cần làm:
1. Tạo logic khi nhập dữ liệu vào database.
    1. Không phải dữ liệu nào cũng nhận.
    2. Nếu người nhập không điền gì thì cũng phải thông báo.
    3. Sau khi nhập xong sẽ tạo ra 1 chữ số ngẫu nhiên - số này dùng để xác thực email.
2. Gửi email cho user
    1. Có đường dẫn xác nhận là email đó là của mình.
    2. Các biến của thông tin này sẽ đươc mã hóa.





*/
include "../Database/conn.php";

$stmt = $conn->prepare("INSERT INTO formThongTin(f_email, f_Ten_SV, f_Ma_SV, f_Ma_LV, f_Sdt, f_NgayMuon) VALUES (?, ?, ?, ?, ?, ?);");
$stmt->bind_param("sssiis", $f_email, $f_Ten_SV, $f_Ma_SV, $f_Ma_LV, $f_Sdt, $f_NgayMuon);

// Email phải có cấu trúc @hcmut.edu.vn
$f_email = $_POST['e'];

// Tự động in hoa các chữ cái đầu.
$f_Ten_SV = $_POST['tsv'];
$f_Ma_SV = $_POST['msv'];
// Khi tìm mã luận văn thì tự động in ra tên luận văn nằm ở dưới.
$f_Ma_LV = $_POST['mlv'];
$f_Sdt = $_POST['sdt'];
$f_NgayMuon = $_POST['d'];

//Chưa có logic web
echo $f_email;
echo $f_Ten_SV;
echo $f_Ma_SV;
echo $f_Sdt;
echo $f_NgayMuon;

// if($stmt->execute()){
//     echo "executed";
// } else {
//     echo "error executing";
// }