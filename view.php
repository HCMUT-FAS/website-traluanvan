<head>
    <link rel="stylesheet" href="/css/table.css">
</head>
<?php

include "include/searchbox-view.php";
include "include/displayData-view.php";

// Chua biet cach hoat dong cua isset()
// Khi Search query khong co trong file view.php
if (isset($_GET['search-submit'])) {
    require "Database/conn.php";
    $search = $_GET['s'];
    if (empty($search)) {
        header("Location: index.php?error=emptysearch");
        exit();
    } else {
        $search = "%" . $_GET['s'] . "%";
        $stmt = $conn->prepare("SELECT * FROM $table WHERE LV_Ten LIKE ? OR GV1_Ten LIKE ? OR GV2_Ten LIKE ? OR LV_Ma LIKE ? OR SV1_Ten LIKE ? OR SV2_Ten LIKE ? OR MSSV1 LIKE ? OR MSSV2 LIKE ?;");
        $stmt->bind_param('ssssssss', $search, $search, $search, $search, $search, $search, $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();
        printf("Có %u giá trị tìm kiếm! <br>", $result->num_rows);
        // echo $result->num_rows . "<br>";
        $s = $_GET['s'];
        $header = 'Location: view.php?&q=' . $s . '&error=notfound2';
        if (strval($result->num_rows) == "0") {
            header("$header");
            exit();
        }
        echo '<a href="/form-thong-tin/form-muon-luan-van.php">Mượn luận văn</a>';

        // tuy chinh id cua table nay sao cho lien ket voi css/table.css 
        echo "<table>";
        displayLables();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
            }
        }
        echo "</table>";
        $stmt->close();
        $conn->close();
    }
} else {
    $s = $_GET['q'];
    echo '<p>Your Search - ' . $s . '- did not match any documents.</p>
    <p>Suggestions:</p>
    <ul>
        <li>Tên Giảng Viên: Mai Hữu Xuân, Lê Quốc Khải, Trần Minh Thái,...</li>
        <li>Mã Luận Văn: 20071002, 20181003,..</li>
        <li>Tên Sinh Viên Thực Hiện: Bùi An Khang, Đỗ Nguyễn Minh Triết, Đặng Hoàng Phương,...</li>
    </ul>';
}
include "include/footer.php";
