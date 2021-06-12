<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-md no-gutters">
                <div class="col-2 text-left">
                    <a href="http://traluanvan">
                        <img src="imgs/logo.png" height="30" alt="image">
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse-1" aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center col-md-8 navbar-collapse-1">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="http://traluanvan">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feature">Features</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="https:/.froala.com">Pricing</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="http://traluanvan/html/teams.html">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://traluanvan/html/contact.html">Đóng góp ý kiến</a>
                        </li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse justify-content-end col-md-2 navbar-collapse-1">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://traluanvan/login/login.html">Log In <i class="fas fa-sign-in-alt"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section class="fdb-block bg-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12  col-md-10 col-lg-8 col-xl-6 text-center">
                    <form action="view.php" method="GET">
                        <div class="input-group mt-4 mb-4">
                            <input type="text" class="form-control" placeholder="Tên Luận Văn, Tên Giảng Viên, Mã Luận Văn,..." name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Tìm Kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>