<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .search {
        /* 3 Cai duoi nay lam cho no keo xuong ma nam o tren bang */
        position: sticky;
        top: 10px;
        z-index: 1;
        /* clear: both; */
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 175px;
        margin-right: 35%;
        width: 650px;
        box-shadow: 0 2px 5px 1px rgb(64 60 67 / 20%);
        border-radius: 20px;
        background: white;
        color: white;

    }

    form.search-bar input[type=text] {
        /* margin-left: 10px; */
        padding: 10px;
        font-size: 17px;
        border: 1px solid white;
        float: left;
        height: 47px;
        width: 90%;
        background: white;
        color: white;
        border-radius: 20px;
    }

    /* Icon tìm kiếm */

    form.search-bar button {
        float: left;
        margin-right: 0px;
        width: 47px;
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

    @media (max-width: 850px) {

        .search {
            position: sticky;
            top: 10px;
            z-index: 1;
            margin-top: 20px;
            margin-left: 10%;
            margin-right: 10%;
            width: 80%;
            box-shadow: 0 2px 5px 1px rgb(64 60 67 / 20%);
            border-radius: 20px;
        }

        form.search-bar input[type=text] {
            /* padding: 10px; */


            font-size: 17px;
            border: 1px solid white;
            float: left;
            width: 70%;
            background: white;
            color: white;
            border-radius: 20px;
        }

        form.search-bar button {


            float: left;
            margin-right: 0px;
            width: 47px;
            height: 47px;
            color: white;
            background: white;
            font-size: 17px;
            border: 1px solid white;
            border-left: none;
            cursor: pointer;
            border-radius: 20px;
        }
    }
</style>
<div class="search">
    <form class="search-bar" action="/view.php">
        <button type="submit" name="search-submit"><i class="fa fa-search" id="btn-search" style="color:#2196F3;"></i></button>
        <input type="text" name="s" placeholder="Search.." name="search">
    </form>
</div>