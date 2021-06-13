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
    <style>
        .fdb-block {
            border-bottom: 1px solid var(--light);
        }

        #navigator {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        #navigator .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        @media (max-width: 720px) {
            #navigator {
                border-bottom: 1px solid #ccc;
            }
        }

        #navigator a {
            font-size: 14px;
        }

        #navigator+section {
            padding: 250px 0;
        }
    </style>
</head>


<body>

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
                        <form action="process.php" method="post">
                            <div class="row">
                                <div class="col mt-4"><input type="text" class="form-control" placeholder="Username" name="user"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col"><input type="password" class="form-control" placeholder="Password" name="password"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col"><button class="btn btn-secondary" type="submit">Login</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>