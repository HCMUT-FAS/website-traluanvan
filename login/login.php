<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link type="text/css" rel="stylesheet" href="../css/froala_blocks.min.css">
    <link type="text/css" rel="stylesheet" href="../css/froala_blocks.css">
    <link type="text/css" rel="stylesheet" href="../css/skeleton.css">
</head>


<body>
<header>
        <div class="container">
            <nav class="navbar navbar-expand-md no-gutters">
                <div class="col-2 text-left">
                    <a href="http://traluanvan">
                        <img src="../imgs/logo.png" height="30" alt="image">
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
                            <a class="nav-link" href="http://traluanvan/login/login.php">Log In <i class="fas fa-sign-in-alt"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="fdb-block py-0">
        <div class="container py-5 my-5" style="background-image: url(../imgs/shapes/4.svg);">
            <div class=" row justify-content-end">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-left">
                    <div class="fdb-box">
                        <div class="row">
                            <div class="col">
                                <h1>Log In</h1>
                                <p class="lead">Right at the coast of the Semantics, a large language ocean. A small river named Duden.</p>
                            </div>
                        </div>
                        <form action="process.php" method="POST">
                            <div class="row">
                                <div class="col mt-4"><input type="text" class="form-control" placeholder="Username" name="user"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col"><input type="password" class="form-control" placeholder="Password" name="pwd"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col"><button class="btn btn-secondary" type="submit" name="login-submit">Login</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include "../include/footer.php";
    ?>
</body>

</html>