<?php
// include "include/header.php";
include "include/searchbox-view.php";
include "include/function.php";

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
        $stmt = $conn->prepare("SELECT * FROM $table WHERE LV_Ten LIKE ? OR GV1_Ten LIKE ? OR GV2_Ten LIKE ? OR LV_Ma LIKE ?;");
        $stmt->bind_param('ssss', $search, $search, $search, $search);
        $stmt->execute();

        if ($stmt) {
            echo "query success <br>";
        } else {
            echo "Failed <br>";
        }

        $result = $stmt->get_result();
        printf("Có %u giá tị tìm kiếm!", $result->num_rows);
        // echo $result->num_rows . "<br>";

        if (strval($result->num_rows) == "0") {
            header("Location: view.php?error=notfound");
            exit();
        }

        // tuy chinh id cua table nay sao cho lien ket voi css/table.css 
        echo "<table>";
        displayLables();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
            }
        } else {
            echo "No result";
        }
        echo "</table>";
        $stmt->close();
        $conn->close();
    }
} else {
    header("Location: index.php?error=notfound");
    exit();
}
include "include/footer.php";
