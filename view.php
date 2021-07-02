<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra Luan Van</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/view/searchresult.css">
</head>

<body>
    <?php
    $rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));
    include "$rootDir/include/index/header.php";
    include "$rootDir/include/index/searchbar.php";
    include "$rootDir/include/view/displayData-view.php";
    include "$rootDir/include/view/form-muon.php";

    // isset là khi thằng nào truy cập vào url mà không có search-submit trước thì bị văng ra
    if (isset($_GET['search-submit'])) {
        require "Database/conn.php";
        // Khong biet sua may cai loi nay nhu nao
        // khi bo cac dong thay the nay di thi khi tim kiem bang %20 hay %25 hay %%% thi ra het tat ca luan van
        $s = $_GET['s'];
        $s = urldecode($s);
        $s = str_replace('%20', '', $s);
        $s = str_replace('%25', '', $s);
        $s = str_replace('%', '', $s);
        $s = str_replace(' ', '', $s);
        if (empty($s)) {
            $s = $_GET['s'];
            echo '<div class="search-result">
            <p>Your Search - ' . $s . ' - did not match any documents.</p>
            <p>Suggestions:</p>
            <ul>
                <li>Tên Giảng Viên: Mai Hữu Xuân, Lê Quốc Khải, Trần Minh Thái,...</li>
                <li>Mã Luận Văn: 20071002, 20181003,..</li>
                <li>Tên Sinh Viên Thực Hiện: Bùi An Khang, Đỗ Nguyễn Minh Triết, Đặng Hoàng Phương,...</li>
            </ul>
        </div>';
            exit();
        } else {
            $s = $_GET['s'];
            $search = "%" . $s . "%";
            $stmt = $conn->prepare("SELECT * FROM $table WHERE LV_Ten LIKE ? OR GV1_Ten LIKE ? OR GV2_Ten LIKE ? OR LV_Ma LIKE ? OR SV1_Ten LIKE ? OR SV2_Ten LIKE ? OR MSSV1 LIKE ? OR MSSV2 LIKE ?;");
            $stmt->bind_param('ssssssss', $search, $search, $search, $search, $search, $search, $search, $search);
            $stmt->execute();
            $result = $stmt->get_result();
            printf("<p class='search-result'>Có %u giá trị tìm kiếm! </p>", $result->num_rows);

            if (strval($result->num_rows) == "0") {
                echo '<div class="search-result">
            <p>Your Search - ' . $s . ' - did not match any documents.</p>
            <p>Suggestions:</p>
            <ul>
                <li>Tên Giảng Viên: Mai Hữu Xuân, Lê Quốc Khải, Trần Minh Thái,...</li>
                <li>Mã Luận Văn: 20071002, 20181003,..</li>
                <li>Tên Sinh Viên Thực Hiện: Bùi An Khang, Đỗ Nguyễn Minh Triết, Đặng Hoàng Phương,...</li>
            </ul>
        </div>';
            } else {
                // tuy chinh id cua table nay sao cho lien ket voi css/table.css 
                echo "<div class='search-result' style='overflow-x:auto;'><table>";
                displayLables();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
                    }
                }
                echo "</table></div>";
                $stmt->close();
                $conn->close();
            }
        }
    } else {
        echo "Invalid URL";
    }
    // BỊ LỖI FONT NÊN KHÔNG INCLUDE VÀO ĐƯỢC
    include "$rootDir/include/footer.php";
    ?>
</body>

</html>