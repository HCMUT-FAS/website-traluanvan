<?php
function sendEmail($user, $pwd, $setFrom, $subject, $body, $to)
{
    require_once "../PHPMailer/PHPMailerAutoload.php";
    $mail = new PHPMailer();
    //len server chinh roi thi khong can dong $mail->isSMTP(); nua
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587'; //tai sao la 587 thay vi 465???
    $mail->isHTML(true);
    $mail->Username = $user;
    $mail->Password = $pwd;
    $mail->setFrom($setFrom);

    // Set hết hạn cho email này trong vòng 1 tuần.
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->addAddress($to);
    $mail->send();
}
$e_user = 'banhbeocodung00@gmail.com';
$e_pwd = 'K7z2Lk7djSskNJZuxC3q';