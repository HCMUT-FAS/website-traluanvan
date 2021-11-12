<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($user, $pwd, $setFrom, $subject, $body, $to)
{
    // OLD CODE
    // $rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));
    // require_once "$rootDir/PHPMailer/PHPMailerAutoload.php";
    // $mail = new PHPMailer();
    // //len server chinh roi thi khong can dong $mail->isSMTP(); nua
    // $mail->isSMTP();
    // $mail->SMTPAuth = true;
    // $mail->SMTPSecure = 'tls';
    // $mail->Host = 'smtp.gmail.com';
    // $mail->Port = '587'; //tai sao la 587 thay vi 465???
    // $mail->isHTML(true);
    // $mail->Username = $user;
    // $mail->Password = $pwd;
    // $mail->setFrom($setFrom);

    // // Set hết hạn cho email này trong vòng 1 tuần.
    // $mail->Subject = $subject;
    // $mail->Body = $body;
    // $mail->addAddress($to);

    // return $mail;

    /*
    Gui email tren server khong duoc???
    https://stackoverflow.com/questions/67406334/gmail-smtp-blocking-real-server-not-localhost
    */

    // NEW PHPMAILER CODE
    require $_SERVER['DOCUMENT_ROOT'] . '/phpmailer/src/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/phpmailer/src/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/phpmailer/src/SMTP.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
    $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
    $mail->Port = 587; // TLS only
    $mail->SMTPSecure = 'tls'; // ssl is deprecated
    $mail->SMTPAuth = true;
    $mail->Username = $user; // email
    $mail->Password = $pwd; // password
    $mail->setFrom($setFrom, 'Tra Luan Van'); // From email and name
    $mail->addAddress($to, $to); // to email and name
    $mail->Subject = $subject;
    $mail->msgHTML($body); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    return $mail;
}
$e_user = 'banhbeocodung00@gmail.com';
$e_pwd = 'K7z2Lk7djSskNJZuxC3q';
