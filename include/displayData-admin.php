<?php
function display_data_admin($f_email, $f_Ten_SV, $f_Ma_SV, $f_Ma_LV, $f_Sdt, $f_NgayMuon, $verified)
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
    Gui toi thang admin/admin-accept.php
    NHIỆM VỤ:
    Nếu mà available = 0 thì hiện ra "Trả lại luận văn"
    */
    include "../Database/conn.php";
    $query = "SELECT * FROM $a WHERE LV_Ma = '$f_Ma_LV';";
    $availble = $conn->query($query);
    $row_avaiable = $availble->fetch_assoc();
    if ($row_avaiable['Available'] == '1') {
        $accept = '<td><a href="admin-accept?e=' . $f_email . '&mlv=' . $f_Ma_LV . '">Cho Mượn</a></td>';
        echo $accept;
    } elseif ($row_avaiable['Available'] == '0') {
        $return = '<td><a href="admin-return?mlv=' . $f_Ma_LV . '">Trả Lại</a></td>';
        echo $return;
    } else {
        // thêm logic ở phần form thông tin với ajax rằng:
        //  điền đúng mã luận văn sẽ tự động hiện ra tên lv
        echo "<td>Khong tim thay luan van</td>";
    }
    //Luan van mat roi
    $delete = '<td><a href="../admin/admin-delete.php?mlv=' . $f_Ma_LV . '">Xóa Đơn Mượn Này</a></td>';
    echo $delete;
    echo "</tr>";
}

function display_labels_admin()
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
    echo "<th>Xóa Yêu Cầu</th>";
    echo "</tr>";
}
function display_labels_history_admin()
{
    echo "<tr>";
    echo "<th>Tên Sinh Viên</th>";
    echo "<th>Mã Sinh Viên</th>";
    echo "<th>Địa Chỉ Email</th>";
    echo "<th>Mã Luận Văn</th>";
    echo "<th>Số Điện Thoại</th>";
    echo "<th>Ngày Mượn</th>";
    echo "<th>Ngày Trả Dự Kiến</th>";
    echo "<th>Ngày Trả</th>";
    echo "</tr>";
}

function display_data_history_admin($f_email, $f_Ten_SV, $f_Ma_SV, $f_Ma_LV, $f_Sdt, $f_NgayMuon, $f_NgayTraDuKien, $f_NgayTra)
{
    echo "<tr>";
    echo "<td>$f_Ten_SV</td>";
    echo "<td>$f_Ma_SV</td>";
    echo "<td>$f_email</td>";
    echo "<td>$f_Ma_LV</td>";
    echo "<td>$f_Sdt</td>";
    echo "<td>$f_NgayMuon</td>";
    echo "<td>$f_NgayTraDuKien</td>";
    echo "<td>$f_NgayTra</td>";
    echo "</tr>";
}
