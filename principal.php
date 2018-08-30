<?php
    if (!isset ( $_SESSION ))
    {
        session_start ();
    }
    include 'php/conexion.php';
    if (!isset($_SESSION['IDUsuario']))
    {
        echo '<script> window.location = "login.php";</script>';
    }
    else
    {
        //id del usuario ingresado
        //echo '<script> alert("' . $_SESSION['IDUsuario'] . '");</script>';
    }
?>
<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gamer Challenge</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
</head>

<body class="fixed-sn pink-skin" id="view">

    <!--Main Navigation-->
    <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark pink scrolling-navbar purple darken-3">
        <a class="navbar-brand" href="#"><img style="width:100px; margin: -20px;" class="responsive-img" src="http://gamerchallenge.net/wp-content/uploads/2018/07/logo-gamer.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-md-9">
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Opinions</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<br><br><br><br><br><br><br>
    <!--body-->
    <!-- Card -->
    <div class="row">
        <div class="col-md-1 responsive"></div>
        <div class="card col-md-2">
            <!-- Card image -->
            <img class="card-img-top respnsive-img" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
            <!-- Card content -->
            <div class="card-body">
                <!-- Title -->
                <h4 class="card-title"><a>FIFA 18</a></h4>
                <!-- Text -->
                <p class="card-text">Sala de apuestas online de FIFA 18</p>
                <!-- Button -->
                <form action="php/ingresarsala.php" method="post">
                    <input type="hidden" name="idsala" value="1">
                <button name="ingresar" class="btn btn-info my-4 btn-block purple darken-3" type="submit">Ingresar</button>
                </form>
            </div>
        </div>
        <div class="col-md-2 responsive"></div>
        <div class="card col-md-2">
            <!-- Card image -->
            <img class="card-img-top respnsive-img" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
            <!-- Card content -->
            <div class="card-body">
                <!-- Title -->
                <h4 class="card-title"><a>Call of Duty</a></h4>
                <!-- Text -->
                <p class="card-text">Sala de apuestas online de CoD</p>
                <!-- Button -->
                <form action="php/ingresarsala.php" method="post">
                    <input type="hidden" name="idsala" value="2">
                <button name="ingresar" class="btn btn-info my-4 btn-block purple darken-3" type="submit">Ingresar</button>
                </form>
            </div>
        </div>
        <div class="col-md-2 responsive"></div>
        <div class="card col-md-2">
            <!-- Card image -->
            <img class="card-img-top respnsive-img" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
            <!-- Card content -->
            <div class="card-body">
                <!-- Title -->
                <h4 class="card-title"><a>Smash Bros</a></h4>
                <!-- Text -->
                <p class="card-text">Sala de apuestas online de Smash Bros</p>
                <!-- Button -->
                <form action="php/ingresarsala.php" method="post">
                    <input type="hidden" name="idsala" value="3">
                <button name="ingresar" class="btn btn-info my-4 btn-block purple darken-3" type="submit">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Card -->


    <!--fin body-->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- Footer -->
    <footer class="page-footer font-small purple darken-3">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
          <a href="#">GamerChallenge</a>
          <br><br>
        </div>
        <!-- Copyright -->
    </footer>
      <!-- Footer -->
    
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        Ps.initialize(sideNavScrollbar);
    </script>
</body>

</html>
