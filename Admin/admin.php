<head>
    <link rel="stylesheet" href="/css/table.css">
</head>

<?php
session_start();
/*
SƠ ĐỒ NHIỆM VỤ
1. Bảng có tất cả giá trị yêu cầu mượn
2. Khung tìm kiếm - khung tìm kiếm mà trên w3schools nó có ấy, kiểu như là css và js thôi.
3. Có 2 nút Accept cho mượn và Unavailable là luận văn mất tiêu
4. Có tabs History để sửa lại lỗi.
*/
// Phai dang nhap moi vao duoc trang nay
if (isset($_SESSION['id'])) {
    // 1. Bảng có tất cả giá trị yêu cầu mượn
    include "../include/header.php";
    include "../Database/conn.php";
    include "../include/displayData-admin.php";

    $result_form = $conn->query("SELECT * FROM $formTable");
    printf("Có tổng cộng %u đơn yêu cầu mượn <br>", $result_form->num_rows);
    echo "<table>";
    displayLabels();
    if ($result_form->num_rows > 0) {
        while ($row = $result_form->fetch_assoc()) {
            displayData($row['f_email'], $row['f_Ten_SV'], $row['f_Ma_SV'], $row['f_Ma_LV'], $row['f_Sdt'], $row['f_NgayMuon'], $row['f_vertified']);
        }
    }
    echo "</table>";
    // 2. Khung tìm kiếm - khung tìm kiếm mà trên w3schools nó có ấy, kiểu như là css và js thôi.




    // 3. Có 2 nút Accept cho mượn và Unavailable là luận văn mất tiêu
    /*
    - DONE Có form hiển thị thông tin đầy đủ của người mượn, email, số điện thoại. 
    - Nếu Accept cho mượn thì
        - DOME Gửi 1 email tới là sau 2 tuần phải trả lại luận văn. 
        - DONE Update ngay muon luan van la thoi diem nhan Accept.
        - Từ 2 nút Accept và Unavailable trở thành nút Đã Nhận Lại Luận Văn. SỬ DỤNG JS????
            - Nút Đã Nhận Lại Luận Văn sẽ UPDATE ngày trả lại là ngày nhấn nút.
    */
    // Làm
    /*
    file include/displayData-admin.php la tao 2 nut Available va Unavailable
    file Admin/admin-accept.php va Admin/admin-accept.php là 2 file logic cho 2 nút ấn.
    
    
    */
    include "../include/footer.php";
} else {
    echo "Invalid Url";
}
