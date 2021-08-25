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
$rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));

if (isset($_POST['form-submit'])) {
    $f_email = $_POST['e'];
    $f_Ten_SV = $_POST['tsv'];
    $f_Ma_SV = $_POST['msv'];
    $f_Ma_LV = $_POST['mlv'];
    $f_Sdt = $_POST['sdt'];
    $f_NgayMuon = $_POST['d'];
    // Bo Loc <script>
    $f_email = filter_var($f_email, FILTER_SANITIZE_STRING);
    $f_Ten_SV = filter_var($f_Ten_SV, FILTER_SANITIZE_STRING);
    $f_Ma_SV = filter_var($f_Ma_SV, FILTER_SANITIZE_STRING);
    $f_Ma_LV = filter_var($f_Ma_LV, FILTER_SANITIZE_STRING);
    $f_Sdt = filter_var($f_Sdt, FILTER_SANITIZE_STRING);
    $f_NgayMuon = filter_var($f_NgayMuon, FILTER_SANITIZE_STRING);
    
    if (empty($f_email) or empty($f_Ten_SV) or empty($f_Ma_SV) or empty($f_Ma_LV) or empty($f_Sdt) or empty($f_NgayMuon)) {
        header("Location: /index.php?error=empty");
        exit();
    } else {
        include "../Database/conn.php";
        $submit_form = $conn->prepare("INSERT INTO $formTable(f_email, f_Ten_SV, f_Ma_SV, f_Ma_LV, f_Sdt, f_NgayMuon) VALUES (?, ?, ?, ?,?, ?);");
        $submit_form->bind_param("ssssss", $f_email, $f_Ten_SV, $f_Ma_SV, $f_Ma_LV, $f_Sdt, $f_NgayMuon);
        if (!$submit_form->execute()) {
            // sftt = submit-form-thon-tin
            header("Location: ../index?sftt=failed");
            exit();
        } else {
            require_once "$rootDir/include/send-email.php";
            $Body = '<a href="http://traluanvan.herokuapp.com/form-thong-tin/vertified-email.php?e=';
            $Body .= $f_email;
            $Body .= '">Vertified Email!</a>';
            $email = sendEmail($e_user, $e_pwd, 'banhbeocodung00@gmail.com', 'Vertification Email', $Body, $f_email);
            // Double check
            if(!$email->send()){
                header("Location: /index?vertified=failed");
                exit();
            }else {
                header("Location: /index?vertified=succeed");
                exit();
            }
        }
    }
} else {
    header("Location: /index.php?error=empty");
    exit();
}
