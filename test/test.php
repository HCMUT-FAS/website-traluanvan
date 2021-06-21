<?php
require_once "../PHPMailer/PHPMailerAutoload.php";

$mail = new PHPMailer();
//len server chinh roi thi khong can dong $mail->isSMTP(); nua
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '587'; //tai sao la 587 thay vi 465???
$mail->isHTML(true);
$mail->Username = 'banhbeocodung00@gmail.com';
$mail->Password = '1_e8ve_980';
$mail_setFrom = $mail->setFrom('banhbeocodung00@gmail.com');

$mail->Subject = 'hello world';
$mail->Body = 'A test email';

$mail->addAddress('banhbeovodung01@gmail.com');
if($mail->send()){
    printf('sent');
}else {
    printf('not sent');
}