<?php
function displayData($f_email, $f_Ten_SV, $f_Ma_SV, $f_Ma_LV, $f_Sdt, $f_NgayMuon, $verified)
{
    echo "<tr>";
    echo "<td>$f_Ten_SV</td>";
    echo "<td>$f_Ma_SV</td>";
    echo "<td>$f_email</td>";
    echo "<td>$f_Ma_LV</td>";
    echo "<td>$f_Sdt</td>";
    if ($verified  == '0') {
        echo "<td>Unverified </td>";
    } else {
        echo "<td>Verified</td>";
    }
    echo "<td>$f_NgayMuon</td>";
    //Accept
    /*
    Gui toi thang Admin/admin-accept.php
    NHIỆM VỤ:
    Nếu mà available = 0 thì hiện ra "Trả lại luận văn"
    */
    include "../Database/conn.php";
    $query = "SELECT * FROM $a WHERE LV_Ma = '$f_Ma_LV';";
    $availble = $conn->query($query);
    $row_avaiable = $availble->fetch_assoc();
    if ($row_avaiable['Available'] == '1') {
        $accept = '<td><a href="admin-accept.php?e=' . $f_email . '&mlv=' . $f_Ma_LV . '">Cho Mượn</a></td>';
        echo $accept;
    } elseif ($row_avaiable['Available'] == '0') {
        $return = '<td><a href="admin-return.php?mlv="' . $f_Ma_LV . '>Trả Lại</a></td>';
        echo $return;
    } else{
        echo "<td>Khong tim thay luan van</td>";
    }
    //Luan van mat roi
    $unavailable = "<td>Unavailable</td>";
    echo $unavailable;
    echo "</tr>";
}

function displayLabels()
{
    echo "<tr>";
    echo "<th>Tên Sinh Viên</th>";
    echo "<th>Mã Sinh Viên</th>";
    echo "<th>Địa Chỉ Email</th>";
    echo "<th>Mã Luận Văn</th>";
    echo "<th>Số Điện Thoại</th>";
    echo "<th>Xác Thực Email</th>";
    echo "<th>Ngày Mượn</th>";
    echo "<th>Cho Mượn Luận Văn</th>";
    echo "<th>Luận Văn Mất Rồi</th>";
    echo "</tr>";
}
