<?php
session_start();
// Gui tu /include/displayData-admin.php
/*
NHIỆM VỤ:
- Nếu Accept cho mượn thì
    - DOME Gửi 1 email tới là sau 2 tuần phải trả lại luận văn. 
    - DONE Update ngay muon luan van la thoi diem nhan Accept.
    - Từ 2 nút Accept và Unavailable trở thành nút Đã Nhận Lại Luận Văn. SỬ DỤNG query available
        - Nút Đã Nhận Lại Luận Văn sẽ UPDATE ngày trả lại là ngày nhấn nút.
    - DONE UPDATE lai available cua table available = false
*/
if (isset($_SESSION['id'])) {
    $mlv = $_GET['mlv'];
    $f_email = $_GET['e'];
    // TINH NANG UPDATE lai available cua table available = false
    if (empty($mlv)) {
        echo "khong co gia tri ma luan van";
    } else {
        include_once "../Database/conn.php";
        $available_false = $conn->prepare("UPDATE $a SET Available = FALSE WHERE LV_Ma = ?;");
        $available_false->bind_param('s', $mlv);
        if (!$available_false->execute()) {
            echo "Ma luan van khong ton tai";
        } else {
            /* TINH NANG:
            - Nếu Accept cho mượn thì
                - DOME Gửi 1 email tới là sau 2 tuần phải trả lại luận văn. 
                - DONE Update ngay muon luan van la thoi diem nhan Accept.
            */
            // Lay currentDate YYYY-MM-DD vi mysql khong the doc dinh dang DD-MM-YYYY nen khi UPDATE se bi loi 
            // ($ngayMuon = $conn->prepare("UPDATE formThongTin SET f_NgayMuon = ?, f_NgayTra = ? WHERE f_Ma_LV = ?;");)

            $currentDate = date("Y-m-d");
            $returnDate = date('Y-m-d', strtotime("+2 weeks"));
            include_once "../Database/conn.php";
            // Cap nhat ngay muon va ngay tra
            $ngayMuon = $conn->prepare("UPDATE formThongTin SET f_NgayMuon = ?, f_NgayTra = ? WHERE f_Ma_LV = ?;");
            $ngayMuon->bind_param('sss', $currentDate, $returnDate, $mlv);
            if (!$ngayMuon->execute()) {
                header("Location: admin.php?accept=failed");
                exit();
            } else {
                // 2 dong nay la cap nhat lai ngay thang cho nguoi dung de hieu:
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $now = date("d-m-Y h:i:sa");
                $currentDate = date("d-m-Y");
                $returnDate = date('d-m-Y', strtotime("+2 weeks"));
                include_once "../include/send-email.php";
                $subject = "Ngay tra luan van";
                $body = "Bây giờ là " . $now . ". Bạn đã mượn luận văn có mã số " . $mlv . " vào ngày " . $currentDate . " hãy trả luận văn trước ngày " . $returnDate;
                // Hàm gửi email này rất tốn thời gian
                sendEmail($e_user, $e_pwd, 'banhbeocodung00@gmail.com', $subject, $body, $f_email);
                header("Location: admin.php?success=true");
            }
        }
    }
} else {
    echo "invalid url";
}
