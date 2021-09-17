<?php
function displayData($LV_Ma, $LV_Ten, $LV_E, $SV1_Ten, $MSSV1, $SV2_Ten, $MSSV2, $GV1_Ten, $GV2_Ten)
{
    echo "<tr>";
    echo "<td>$LV_Ma</td>";
    echo "<td>$LV_Ten</td>";
    //nen viet cau lenh if rut gon
    if ($LV_E == "0") {
        echo "<td></td>";
    } else {
        echo "<td>$LV_E</td>";
    }
    echo "<td>$SV1_Ten</td>";
    echo "<td>$MSSV1</td>";
    if ($SV2_Ten == "0" && $MSSV2 == "0") {
        echo "<td></td>";
        echo "<td></td>";
    } else {
        echo "<td>$SV2_Ten</td>";
        echo "<td>$MSSV2</td>";
    }
    echo "<td>$GV1_Ten</td>";
    if ($GV2_Ten == "0") {
        echo "<td></td>";
    } else {
        echo "<td>$GV2_Ten</td>";
    }
    echo "</tr>";
}

function displayLables()
{
    echo "<tr>";
    echo "<th>Mã Luận Văn</th>";
    echo "<th>Tên Luận Văn</th>";
    echo "<th>Tên Luận Văn (Tiếng Anh)</th>";
    echo "<th>Sinh viên thực hiện 1</th>";
    echo "<th>Mã số sinh viên 1</th>";
    echo "<th>Sinh viên thực hiện 2</th>";
    echo "<th>Mã số sinh viên 2</th>";
    echo "<th>Giảng viên hướng dẫn 1</th>";
    echo "<th>Giảng viên hướng dẫn 2</th>";
    echo "</tr>";
}


// Ham nay chu code cua query cu thoi chu no khong co y nghia
function previousQuerySearch($search)
{
    require_once "Database/conn.php";
    $search_LV_Ten = "SELECT * FROM $table WHERE LV_Ten LIKE '%$search%'";
    $result_search_LV_Ten = $conn->query($search_LV_Ten);

    $search_LV_Ten_theo_GV1_Ten_GV2_Ten = "SELECT * FROM $table WHERE GV1_Ten LIKE '%$search%' OR GV2_Ten LIKE '%$search%';";
    $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten = $conn->query($search_LV_Ten_theo_GV1_Ten_GV2_Ten);

    $search_LV_Ma = "SELECT * FROM $table WHERE LV_Ma LIKE '%$search%'";
    $result_search_LV_Ma = $conn->query($search_LV_Ma);

    echo $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows . "<br>";
    echo $result_search_LV_Ten->num_rows . "<br>";
    echo $result_search_LV_Ma->num_rows . "<br>" . "<br>";
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

    return $row;
}
