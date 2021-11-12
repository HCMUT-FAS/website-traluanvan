<?php
$f_email = "banhbeovodung01@gmail.com";
$rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));
require_once "$rootDir/include/send-email.php";
$Body = '<a href="https://luanvan0001.000webhostapp.com/form-thong-tin/vertified-email.php?e=';
$Body .= $f_email;
$Body .= '">Vertified Email!</a>';
$email = sendEmail($e_user, $e_pwd, 'banhbeocodung00@gmail.com', 'Vertification Email', $Body, $f_email);
// Double check
if (!$email->send()) {
    echo $email->ErrorInfo;
} else {
    echo "gui email thanh cong 01";
}
