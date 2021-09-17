<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text],
        input[type=email],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        #d {
            margin-top: 8px;
            width: 100%;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            /* width: 900px;
            height: 435px; */
            background-color: white;
            /* border: 10px solid rgb(172, 172, 172); */
            border-radius: 5px;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }


        /* Clear floats after the columns */

        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */

        @media screen and (max-width: 1000px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0px;
            }
        }

        #form-submit {
            margin-top: 20px;
        }

        #btn-muon-lv {
            margin-left: 170px;
        }

        @media (max-width: 850px) {
            #btn-muon-lv {
                margin-left: 10%;
            }
        }
    </style>
</head>



<!-- Form muon luan van -->
<div class="w3-container">
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-white w3-border w3-round-large" id="btn-muon-lv">Mượn luận văn</button>
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright w3-red">&times;</span>
                <div class="container">
                    <!-- form thông tin -->
                    <form action="/form-thong-tin/process-form-muon-luan-van.php" method="post">
                        <div class="row">
                            <div class="col-25">
                                <label for="lname" id="lname">Email:</label>
                            </div>
                            <div class="col-75">
                                <input type="email" id="lname" name="e" placeholder="example@hcmut.edu.vn">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Tên sinh viên:</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="lname" name="tsv" placeholder="Đỗ Nguyễn Minh Triết">
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
                            <input type="submit" id="form-submit" name="form-submit">
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