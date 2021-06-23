<?php
include '../Database/conn.php';
$f_Ma_LV = '20071003';
$stmt = $conn->prepare("SELECT * FROM available WHERE LV_Ma = ?;");
$stmt->bind_param('s',$f_Ma_LV);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
echo $row['Available'] . "<br";
if ($row['Available'] == '1') {
    $accept = '<td><a href="admin-accept.php?e=' . $f_email . '&mlv=' . $f_Ma_LV . '">Cho Mượn</a></td>';
    echo $accept;
} elseif ($row['Available'] == '0') {
    $return = '<td><a href="admin-return.php?mlv="' . $f_Ma_LV . '>Trả Lại</a></td>';
    echo $return;
} else {
    echo "<td>Khong tim thay luan van</td>";
}
