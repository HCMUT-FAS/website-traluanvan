<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            background-color: blue;
            font-family: sans-serif;
        }

        .login {
            width: 350px;
            height: 850px;
            background-color: white;
            border: 1px solid gray;
            border-radius: 10px;
            text-align: center;
            margin: 0 auto;
        }

        .h2 {
            display: inline-block;
            color: gray;
        }

        .login input {
            width: 200px;
            height: 40px;
            border: 1px solid gray;
            border-radius: 10px;
            padding-left: 20px;
        }

        .login button {
            width: 200px;
            height: 40px;
            border-radius: 5px;
            border: none;
            background-color: #167bff;
            color: white;
        }

        p {
            display: inline-block;
            float: left;
            padding-left: 40px;
        }
    </style>
</head>

<body>
    <form action="process-form-muon-luan-van.php" method="POST">
        <Div class="login">
            <h2>Điền thông tin</h2>
            <p>Email</p> <br>
            <br>
            <br>
            <input type="email" placeholder="exmaple@hcmut.edu.vn" name="e">
            <p>Tên sinh viên</p> <br>
            <input type="text" placeholder="VD: Đỗ Nguyễn Minh Triết" name="tsv"><br>
            <p>Mã số sinh viên</p> <br>
            <input type="text" placeholder="Mã số sinh viên trường cung cấp" name="msv"><br>
            <p>Mã Luận Văn</p> <br>
            <input type="text" placeholder="Mã Luận Văn Bạn Cần Mượn" name="mlv" id="txt1" onkeyup="showHint(this.value)">
            <br>
            <span id="txtHint"></span><br>
            <p>Số điện thoại</p> <br>
            <input type="text" placeholder="Số điện thoại liên lạc" name='sdt'><br>
            <p>Ngày mượn luận văn</p><br>
            <input type="date" name="d"><br>
            </br>
            </br>
            <button type="submit" name="form-submit">Gửi</button>
        </Div>
    </form>
    <script>
        // https://www.w3schools.com/js/js_ajax_php.asp
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("txtHint").innerHTML =
                    this.responseText;
            }
            xhttp.open("GET", "suggestion.php?q=" + str);
            xhttp.send();
        }
    </script>
</body>

</html>