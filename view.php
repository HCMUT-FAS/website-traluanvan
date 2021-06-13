<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra Luan Van</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link type="text/css" rel="stylesheet" href="../css/froala_blocks.css">
    <link rel="stylesheet" href="css/froala_blocks.min.css">
    <link rel="stylesheet" href="/css/skeleton.css">
    <link rel="stylesheet" href="/css/table.css">
</head>

<body>
    <?php
    include "header.php";
    include "function.php";
    // check whether user give an input
    include_once "Database/conn.php";
    $search = $_GET["search"];


    //Neu chua dien cai gi thi quay tro lai header de hien loi
    if (empty($search)) {
        header("Location: index.php?abc=1");
    } else {
        $search_LV_Ten = "SELECT * FROM $table WHERE LV_Ten like '%$search%'";
        $result_search_LV_Ten = $conn->query($search_LV_Ten);

        $search_LV_Ten_theo_GV1_Ten_GV2_Ten = "select * from $table where GV1_Ten like '%$search%' or GV2_Ten like '%$search%';";
        $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten = $conn->query($search_LV_Ten_theo_GV1_Ten_GV2_Ten);

        $search_LV_Ma = "SELECT * FROM $table WHERE LV_Ma like '%$search%'";
        $result_search_LV_Ma = $conn->query($search_LV_Ma);

        echo $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows . "<br>";
        echo $result_search_LV_Ten->num_rows . "<br>";
        echo $result_search_LV_Ma->num_rows . "<br>" . "<br>";


        echo "<table>";
        displayLables();
        //in ra tat ca theo query sql
        if ($result_search_LV_Ten->num_rows > 0) {
            while ($row = $result_search_LV_Ten->fetch_assoc()) {

                displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
                // echo "Ten luan van: " . $row["LV_Ten"] . " " . "GV huong dan: " . $row["GV1_Ten"] . $row["GV2_ten"] . "<br>";
                // echo "<br>";
            }
        } elseif ($result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows > 0) {
            while ($row = $result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->fetch_assoc()) {
                displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
                // echo "Ten Luan Van: " . $row["LV_Ten"] . "<br>" . "Giang vien huong dan 1: " . $row["GV1_Ten"] . "<br>" . "Giang vien huong dan 2: " . $row["GV2_Ten"] . "<br><br>";
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
    include "footer.php"
    //query s LV_Ten

    ?>
</body>

</html>