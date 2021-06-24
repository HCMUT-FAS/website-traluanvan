<?php    
function sendEmail($user, $pwd, $setFrom, $subject, $body, $to)
{
    require_once "../PHPMailer/PHPMailerAutoload.php";
    $mail = new PHPMailer();
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
    if($mail->send()){
        echo "sent";
    }else{
        echo "failed";
    }
}
$f_email = "banhbeovodung01@gmail.com";
$e_user = 'banhbeocodung00@gmail.com';
$e_pwd = 'K7z2Lk7djSskNJZuxC3q';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$now = date("d-m-Y h:i:sa");
$currentDate = date("d-m-Y");
$returnDate = date('d-m-Y', strtotime("+2 weeks"));
$subject = "Ngay tra luan van";
$body = "Bây giờ là " . $now . ". Bạn đã mượn luận văn có mã số 43123416 vào ngày " . $currentDate . " hãy trả luận văn trước ngày " . $returnDate;
// Hàm gửi email này rất tốn thời gian
sendEmail($e_user, $e_pwd, 'banhbeocodung00@gmail.com', $subject, $body, $f_email);