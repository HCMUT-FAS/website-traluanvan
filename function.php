<?php
function displayData($LV_Ma, $LV_Ten, $LV_E, $SV1_Ten, $MSSV1, $SV2_Ten, $MSSV2, $GV1_Ten, $GV2_Ten){
        
        echo "<tr>";
        echo "<th>$LV_Ma</th>";
        echo "<th>$LV_Ten</th>";
        echo "<th>$LV_E</th>";
        echo "<th>$SV1_Ten</th>";
        echo "<th>$MSSV1</th>";
        echo "<th>$SV2_Ten</th>";
        echo "<th>$MSSV2</th>";
        echo "<th>$GV1_Ten</th>";
        echo "<th>$GV2_Ten</th>";
        echo "</tr>";
    }

    function displayLables(){
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