<?php
$rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));

?>

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/css/form-thong-tin.css">
</head>

<body>
    <!-- Form muon luan van -->
    <div class="w3-container">
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-white w3-border w3-round-large">Mượn luận văn</button>
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright w3-red">&times;</span>
                    <div class="container">
                        <!-- form -->
                        <form action="form-thong-tin/process-form-muon-luan-van.php" method="post">
                            <div class="row">
                                <div class="col-25">
                                    <label for="fname">Email:</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="fname" name="e" placeholder="example@hcmut.edu.vn">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="fname">Tên sinh viên:</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="fname" name="tsv" placeholder="Đỗ Nguyễn Minh Triết">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Mã số sinh viên: </label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="lname" name="msv" placeholder="Mã sinh viên trường cung cấp">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Số điện thoại liên lạc: </label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="lname" name="sdt" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Mã luận văn:</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="lname" name="mlv" placeholder="Hãy ghi đúng mã luận văn" id="txt1" onkeyup="showHint(this.value)">
                                    <!-- Cái này là ghi đúng mlv sẽ in ra đúng tên LV -->
                                    <h4 id="txtHint"></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Ngày mượn</label>
                                </div>
                                <div class="col-75">
                                    <input type="date" id="d" name="d">
                                </div>
                            </div>

                            <div class="row">
                                <input type="submit" name="form-submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            xhttp.open("GET", "form-thong-tin/suggestion.php?q=" + str);
            xhttp.send();
        }
    </script>
</body>