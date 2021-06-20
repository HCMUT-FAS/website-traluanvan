<?php
// Form này để điện thoại gửi thông tin mượn vào.



include "conn.php";

$stmt = $conn->prepare("INSERT INTO formThongTin(f_email, f_Ten_SV, f_Ma_SV, f_Ma_LV, f_Sdt, f_NgayMuon) VALUES (?, ?, ?, ?, ?, ?);");
$stmt->bind_param("sssiis", $f_email, $f_Ten_SV, $f_Ma_SV,$f_Ma_LV ,$f_Sdt ,$f_NgayMuon);

$f_email = $_GET['e'];
$f_Ten_SV = $_GET['tsv'];
$f_Ma_SV = $_GET['msv'];
$f_Ma_LV = $_GET['mlv'];
$f_Sdt = $_GET['sdt'];
$f_NgayMuon = $_GET['d'];

//Chưa có logic web

echo $f_NgayMuon;

if($stmt->execute()){
    echo "executed";
} else {
    echo "error executing";
}


// https://traluanvan.herokuapp.com/Database/form_thong_tin.php?e=example@example.com&tsv=Bui%20An%20Khang&msv=1913683&mlv=20091002&sdt=0353032332&d=2021-06-19