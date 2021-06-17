<?php
// include "include/header.php";
include "include/searchbox-view.php";
include "function.php";

//Neu chua dien cai gi thi quay tro lai header de hien loi
if (isset($_GET['search-submit'])) {
    require "Database/conn.php";
    $search = $_GET["q"];

    if (empty($search)) {
        header("Location: index.php?error=emptysearch");
        exit();
    } else {
        $search_LV_Ten = "SELECT * FROM $table WHERE LV_Ten LIKE '%$search%'";
        $result_search_LV_Ten = $conn->query($search_LV_Ten);

        $search_LV_Ten_theo_GV1_Ten_GV2_Ten = "SELECT * FROM $table WHERE GV1_Ten LIKE '%$search%' OR GV2_Ten LIKE '%$search%';";
        $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten = $conn->query($search_LV_Ten_theo_GV1_Ten_GV2_Ten);

        $search_LV_Ma = "SELECT * FROM $table WHERE LV_Ma LIKE '%$search%'";
        $result_search_LV_Ma = $conn->query($search_LV_Ma);

        echo $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows . "<br>";
        echo $result_search_LV_Ten->num_rows . "<br>";
        echo $result_search_LV_Ma->num_rows . "<br>" . "<br>";

        if (strval($result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows) == "0" && strval($result_search_LV_Ten->num_rows) == "0" && strval($result_search_LV_Ma->num_rows) == "0") {
            header("Location: index.php?error=notfound");
        }

        // tuy chinh id cua table nay sao cho lien ket voi css/table.css 
        // echo "<table>";
        echo "<table id='myTable'>";
        displayLables();
        /*
            co 3 truong hop 
            1.LV_Ten > 0,
            2. LV_Ma > 0, 
            3. GV1_Ten_GV2_Ten > 0
            Kiem tra lan dau xem 1. co thoa khong? Sau do check tiep 2. 3. co thoa khong? if ($result_search_LV_Ten->num_rows > 0)
            
            Tiep theo xem 2. thoa khong? Sau do check tiep thang 3. elseif ($result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows > 0)
            */
        if ($result_search_LV_Ten->num_rows > 0) {
            while ($row = $result_search_LV_Ten->fetch_assoc()) {
                displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
            }
            if ($result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows > 0) {
                while ($row = $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->fetch_assoc()) {
                    displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
                }
            }
            if ($result_search_LV_Ma->num_rows > 0) {
                while ($row = $result_search_LV_Ma->fetch_assoc()) {
                    displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
                }
            }
        } elseif ($result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows > 0) {
            while ($row = $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->fetch_assoc()) {
                displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
            }
            if ($result_search_LV_Ma->num_rows > 0) {
                while ($row = $result_search_LV_Ma->fetch_assoc()) {
                    displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
                }
            }
        } elseif ($result_search_LV_Ma->num_rows > 0) {
            while ($row = $result_search_LV_Ma->fetch_assoc()) {
                displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
            }
        } else {
            echo "0 result";
        }
        echo "</table>";
        $conn->close();
    }
} else {
    header("Location: index.php?error=1");
    exit();
}
include "include/footer.php";
