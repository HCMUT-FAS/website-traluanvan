<?php


if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    $content = filter_var($content, FILTER_SANITIZE_STRING);
    if (empty($name) || empty($email) || empty($subject) || empty($content)) {
        header("Location: /index?e=empty");
        exit();
    } else {
        $rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));
        include_once "$rootDir/include/send-email.php";
        $email = sendEmail($e_user, $e_pwd, $e_user, $subject, $name . "<br>" . $email . "<br>" . $content, "banhbeovodung01@gmail.com");
        // Doudble check
        if(!$email->send()){
            header("Location: /index?sendEmail=failed");
            exit();
        }else {
            header("Location: /index?sendEmail=succeed");
            exit();
        }

        header("Location: /index?success");
        exit();
    }
} else {
    header("Location: /index?e=isset");
}
