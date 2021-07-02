<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Header -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
            margin-right: 0%;
        }

        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }

        .topnav .login-container {
            float: right;
        }

        .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
            width: 120px;
        }

        .topnav input[type=password] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
            width: 120px;
        }

        .topnav .login-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background-color: #555;
            color: white;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .topnav .login-container button:hover {
            background-color: green;
        }

        @media screen and (max-width: 1000px) {
            .topnav .login-container {
                float: none;
            }

            .topnav a,
            .topnav input[type=text],
            .topnav input[type=password],
            .topnav .login-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                padding: 14px;
            }

            .topnav input[type=text] {
                border: 1px solid #ccc;
            }

            .topnav input[type=password] {
                border: 1px solid #ccc;
            }
        }
    </style>
    <!-- Khung tìm kiếm -->
    <style>
        form.search-bar input[type=text] {
            /* margin-left: 10px; */
            padding: 10px;
            font-size: 17px;
            border: 1px solid white;
            float: left;
            width: 80%;
            background: white;
            color: white;
            border-radius: 20px;
        }

        /* Icon tìm kiếm */

        form.search-bar button {
            float: left;
            width: 10%;
            height: 42px;
            /* padding: 42px; */
            color: white;
            background: white;
            font-size: 17px;
            border: 1px solid white;
            border-left: none;
            cursor: pointer;
            border-radius: 20px;
        }

        /* Khi ấn vô cái khung text thì nó hiện ra viền xung quanh */

        form.search-bar input[type=text]:focus {
            color: #495057;
            background-color: #fff;
            border-color: white;
            outline: 0;
            box-shadow: white;
        }

        form.search-bar::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Cái khung to to chứa khung tìm kiếm với cái icon */

        .search {
            clear: both;
            position: relative;
            margin-top: 20px;
            margin-left: 10%;
            margin-right: 35%;
            width: 50%;
            box-shadow: 0 2px 5px 1px rgb(64 60 67 / 20%);
            border-radius: 20px;
        }

        .login-container form.input[type=text]:focus {
            color: #495057;
            background-color: #fff;
            border-color: white;
            outline: 0;
            box-shadow: white;
        }
    </style>

    <!-- Mượn luận văn button -->
    <style>
        .btn-form {
            clear: both;
            position: relative;
            margin-top: 20px;
            margin-left: 10%;
            margin-right: 10%;
        }
    </style>

    <!-- Kết quả tìm kiếm -->
    <style>
        .search-result {
            clear: both;
            position: relative;
            margin-top: 20px;
            margin-left: 10%;
            margin-right: 5%;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>

    <!-- Footer -->
</head>

<body>
    <!-- HEADER -->
    <div class="topnav">
        <a class="active" href="/index">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>

        <div class="login-container">
            <!-- Chua dien action cho form registry -->
            <form action="/login/process-login" method="POST">
                <input type="text" placeholder="Username" name="user">
                <input type="password" placeholder="Password" name="pwd">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <!-- Search Bar -->
    <div class="search">
        <form class="search-bar" action="">
            <button type="submit"><i class="fa fa-search" style="color:#2196F3;"></i></button>
            <input type="text" id="nhap" onkeyup="myFunction()" placeholder="Search.." name="search">
        </form>
    </div>

    <!-- Mượn luận văn button -->
    <div class="btn-form">
        <?php
        $rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));
        include "$rootDir/form-thong-tin/form-muon-luan-van-2.0.php";
        ?>
    </div>
<<<<<<< HEAD
    <div class="result-search"   style='overflow-x:auto;'>
        <table id="bang">
=======

    <!-- Kết quả -->
    <div class="search-result" style='overflow-x:auto;'>
        <table>
>>>>>>> aa6748409ca943f4c7b9fe51f50816f15b9804f4
            <tbody>
                <tr>
                    <th>Mã Luận Văn</th>
                    <th>Tên Luận Văn</th>
                    <th>Tên Luận Văn (Tiếng Anh)</th>
                    <th>Sinh viên thực hiện 1</th>
                    <th>Mã số sinh viên 1</th>
                    <th>Sinh viên thực hiện 2</th>
                    <th>Mã số sinh viên 2</th>
                    <th>Giảng viên hướng dẫn 1</th>
                    <th>Giảng viên hướng dẫn 2</th>
                </tr>
                <tr>
                    <td>20111021</td>
                    <td>Phân loại các trạng thái giấc ngủ ở người trưởng thành</td>
                    <td>null</td>
                    <td>Lê Quốc Khải</td>
                    <td>K0601091</td>
                    <td>null</td>
                    <td>null</td>
                    <td>TS. Trương Quang Đăng Khoa</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20151016</td>
                    <td>Phân tích tín hiệu hô hấp và tín hiệu điện tim trong đa ký giấc ngủ</td>
                    <td>null</td>
                    <td>Nguyễn Vũ Quang Hiển</td>
                    <td>K1001028</td>
                    <td>Phạm Lê Trung Hiếu</td>
                    <td>K1000988</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20151031</td>
                    <td>Nhận diện các loại vi sóng trong tín hiệu điện não giấc ngủ bằng phương pháp wavelet</td>
                    <td>null</td>
                    <td>Huỳnh Quang Huy</td>
                    <td>K1101338</td>
                    <td>null</td>
                    <td>null</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20161011</td>
                    <td>Ứng dụng thuật toán Support Vector Machine vào phân tích cấu trúc vi thể giấc ngủ</td>
                    <td>null</td>
                    <td>Nguyễn Hoàng Kim Khánh</td>
                    <td>K1101587</td>
                    <td>null</td>
                    <td>null</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20161039</td>
                    <td>Khảo sát sự ảnh hưởng của kích thích âm thanh lên não bộ trong giấc ngủ ở người trưởng thành</td>
                    <td>null</td>
                    <td>Nguyễn Thị Phương Thảo</td>
                    <td>K1203455</td>
                    <td>null</td>
                    <td>null</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20161041</td>
                    <td>Xác định thời điểm chuyển trạng thái thức - ngủ trong nguyên cứu cấu trúc giấc ngủ ở người trưởng thành</td>
                    <td>null</td>
                    <td>Đinh Thị Ngọc Ánh</td>
                    <td>K1200136</td>
                    <td>null</td>
                    <td>null</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20161045</td>
                    <td>Phân tích SpO2 và hô hấp của bản ghi đa ký giấc ngủ</td>
                    <td>null</td>
                    <td>Châu Gia Ngân</td>
                    <td>K1202316</td>
                    <td>null</td>
                    <td>null</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20192026</td>
                    <td>Nghiên cứu sự rối loạn giấc ngủ thông qua các vấn đề thần kinh học&nbsp;</td>
                    <td>Research Insomnia disorders through neurological problems</td>
                    <td>Huỳnh Thị Diễm Thy</td>
                    <td>1513411</td>
                    <td>null</td>
                    <td>null</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20192027</td>
                    <td>Nghiên cứu sự rối loạn giấc ngủ thông qua các vấn đề thần kinh học&nbsp;</td>
                    <td>Research into concentration improvement of the brain using musical stimulation</td>
                    <td>Nguyễn Cao Nhật Ánh</td>
                    <td>1514184</td>
                    <td>null</td>
                    <td>null</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20192028</td>
                    <td>Nghiên cứu cải thiện chất lượng giấc ngủ bằng kích thích âm nhạc</td>
                    <td>EEG - based study on sleep quality improvement by using music</td>
                    <td>Trương Nhật Mai</td>
                    <td>1511936</td>
                    <td>null</td>
                    <td>null</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>20192030</td>
                    <td>Nghiên cứu về tình trạng ngủ gật trong sinh viên thông qua tín hiệu đa ký giấc ngủ</td>
                    <td>Studying dozing-off in studenTS. using Polysomnography</td>
                    <td>Phạm Hương Trang</td>
                    <td>1513579</td>
                    <td>null</td>
                    <td>null</td>
                    <td>ThS. Lê Quốc Khải</td>
                    <td>null</td>
                </tr>
            </tbody>
        </table>
        <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("nhap");
  filter = input.value.toUpperCase();
  table = document.getElementById("bang");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
    </div>

</body>

</html>