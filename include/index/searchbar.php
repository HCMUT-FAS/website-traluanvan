<?php
$rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
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
    form.search-bar input[type=text] {
        /* margin-left: 10px; */
        padding: 10px;
        font-size: 17px;
        border: 1px solid white;
        float: left;
        width: 90%;
        background: white;
        color: white;
        border-radius: 20px;
    }
    /* Icon tìm kiếm */

    form.search-bar button {
        float: left;
        margin-right: 0px;
        width: 10%;
        height: 47px;
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

    

    .login-container form.input[type=text]:focus {
        color: #495057;
        background-color: #fff;
        border-color: white;
        outline: 0;
        box-shadow: white;
    }
</style>

<div class="search">
    <form class="search-bar" action="/view.php">
        <input type="text" name="s" placeholder="Search.." name="search">
        <button type="submit" name="search-submit">><i class="fa fa-search" id="btn-search"style="color:#2196F3;"></i></button>
    </form>
</div>