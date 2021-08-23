<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra Luan Van</title>
    <link rel="stylesheet" href="./css/view/searchresult.css">
</head>

<body>
    <?php
    include "include/index/header.php";
    include "include/index/searchbar.php";

    ?>
    <div class="search-result">
        <p>Gợi ý tìm kiếm:</p>
        <ul>
            <li>Tên giảng viên: Mai Hữu Xuân, Lê Quốc Khải, Trần Minh Thái,...</li>
            <li>Mã luận văn: 20071002, 20181003,..</li>
            <li>Sinh viên thực hiện: Bùi An Khang, Đỗ Nguyễn Minh Triết, Đặng Hoàng Phương,...</li>
        </ul>
    </div>
</body>

</html>