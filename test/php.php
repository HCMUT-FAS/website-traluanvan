<?php    
include "../Database/conn.php";
$q = $_REQUEST["q"];
$stmt = $conn->prepare("SELECT * FROM $table WHERE LV_Ma = ?");
$stmt->bind_param("s", $q);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if($row['LV_Ten'] == ''){
    echo "Không tồn tại mã luận văn này!";
}else {
    echo $row['LV_Ten'];
}
