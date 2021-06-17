<?php
function displayData($LV_Ma, $LV_Ten, $LV_E, $SV1_Ten, $MSSV1, $SV2_Ten, $MSSV2, $GV1_Ten, $GV2_Ten)
{
    echo "<tr>";
    echo "<td>$LV_Ma</td>";
    echo "<td>$LV_Ten</td>";
    echo "<td>$LV_E</td>";
    echo "<td>$SV1_Ten</td>";
    echo "<td>$MSSV1</td>";
    if ($SV2_Ten == "0" && $MSSV2 == "0") {
        echo "<td>null</td>";
        echo "<td>null</td>";
    } else {
        echo "<td>$SV2_Ten</td>";
        echo "<td>$MSSV2</td>";
    }
    echo "<td>$GV1_Ten</td>";
    if ($GV2_Ten == "0") {
        echo "<td>null</td>";
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
