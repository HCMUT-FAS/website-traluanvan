<?php
// include "include/header.php";
include "include/searchbox-view.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url("imgs/icons/searchicon.png");
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        #myTable th,
        #myTable td {
            text-align: left;
            padding: 12px;
        }

        #myTable tr {
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header,
        #myTable tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Mã Luận Văn.." title="Type in a name">
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
<?php
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

        if(strval($result_search_LV_Ten_theo_GV1_Ten_GV2_Ten->num_rows) == "0" && strval($result_search_LV_Ten->num_rows) == "0" && strval($result_search_LV_Ma->num_rows) == "0"){
            header("Location: index.php?error=notfound");
        }

        echo "<table id='myTable'>";
        displayLables();
        //in ra tat ca theo query sql
        if ($result_search_LV_Ten->num_rows > 0) {
            while ($row = $result_search_LV_Ten->fetch_assoc()) {
                displayData($row["LV_Ma"], $row["LV_Ten"], $row["LV_TenTiengAnh"], $row["SV1_Ten"], $row["MSSV1"], $row["SV2_Ten"], $row["MSSV2"], $row["GV1_Ten"], $row["GV2_Ten"]);
                // echo "Ten luan van: " . $row["LV_Ten"] . " " . "GV huong dan: " . $row["GV1_Ten"] . $row["GV2_Ten"] . "<br>";
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
} else {
    header("Location: index.php?error=1");
    exit();
}
include "include/footer.php";
    //query s LV_Ten