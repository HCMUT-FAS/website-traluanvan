<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra Luan Van</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/froala_blocks.css">
    <link rel="stylesheet" href="../css/froala_blocks.min.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/table.css">

</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-md no-gutters">
                <div class="col-2 text-left">
                    <a href="http://traluanvan">
                        <img src="/imgs/logo.png" height="30" alt="image">
                    </a>
                </div>
                <div id="mySidepanel" class="sidepanel">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                    <a href="#">Home</a>
                    <a href="#">Feature</a>
                    <a href="#">Login</a>
                </div>
                <div id="main">
                <button class="navbar-toggler" onclick="openNav()",type="button" data-toggle="collapse" data-target=".navbar-collapse-1" aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" onclick="openNav()"></span>
                </button>
                </div>

                <div class="collapse navbar-collapse justify-content-center col-md-8 navbar-collapse-1">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="http://traluanvan">Home <span class="sr-only">(current)</span></a>
                        </li>
                        
                        <?php
                        if (isset($_SESSION['id'])) {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="https:/.froala.com">Đơn mượn</a>
                        </li>';
                        } else {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="#feature">Features</a>
                        </li>';
                        }
                        ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="http://traluanvan/html/teams.html">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://traluanvan/html/contact.html">Đóng góp ý kiến</a>
                        </li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse justify-content-end col-md-2 navbar-collapse-1">
                   
                      <a href="" <i class="fa fa-bell"  style="font-size:36px"></i></a>  
                    
                    <?php
                    if (isset($_SESSION['id'])) {
                        echo    '<div>
                                    <a class="btn btn-outline-primary ml-md-3" href="http://traluanvan/include/logout.php">Logout<i class="fas fa-sign-in-alt"></i></a>
                                </div>';
                    } else {
                        echo '<div><a class="btn btn-outline-primary ml-md-3" href="http://traluanvan/login/login.php">Login<i class="fas fa-sign-in-alt"></i></a></div>';
                    }
                    ?>

                </div>
                
            </nav>
        </div>
 <script>
function openNav() {
    console.log("M dang mo ne")
  document.getElementById("mySidepanel").style.width = "auto";
}

function closeNav() {
    console.log("M dang dong ne")
    document.getElementById("mySidepanel").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
    </header>

</body>


</html>