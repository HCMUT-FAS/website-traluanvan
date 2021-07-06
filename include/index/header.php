<style>
    * {
        box-sizing: border-box;
    }

    .topnav {
        width: 100%;
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

    @media screen and (max-width: 700px) {
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


<!-- HEADER -->
<div class="topnav">
    <a class="active" href="/index">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
    <div class="login-container">
        <!-- Khi Login thi hien thi LOGOUT -->
        <form action="/login/process-login.php" method="POST">
            <input type="text" placeholder="Username" name="user">
            <input type="password" placeholder="Password" name="pwd">
            <button type="submit" name="login-submit">Login</button> 
        </form>
    </div>
</div>