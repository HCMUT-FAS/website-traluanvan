<?php
// https://www.w3schools.com/js/js_ajax_php.asp
include "$rootDir/Database/conn.php";
$rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));
$q = $_REQUEST["q"];

$available = $conn->prepare("SELECT * FROM available WHERE LV_Ma = ?;");
$available->bind_param('s', $q);
$available->execute();

$result_available = $available->get_result();
$row_available = $result_available->fetch_assoc();
if ($row_available['Available'] == "0") {
    echo "Luận Văn đã được mượn, vui lòng đăng kí lại sau 2 tuần";
} elseif ($row_available['Available'] == "1") {
    $name = $conn->prepare("SELECT * FROM $table WHERE LV_Ma = ?");
    $name->bind_param("s", $q);
    $name->execute();
    $result_name = $name->get_result();
    $row_name = $result_name->fetch_assoc();
    if ($row_name['LV_Ten'] == '') {
        echo "Luận Văn Không Tồn Tại!";
    } else {
        echo $row_name['LV_Ten'];
    }
} else {
    echo "Luận Văn Không Tồn Tại";
}
