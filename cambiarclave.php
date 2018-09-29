<?php
    if (!isset ( $_SESSION ))
    {
        session_start ();
    }
    include 'php/conexion.php';
    if (!isset($_SESSION['IDUsuario']))
    {
        echo '<script> window.location = "principal.php";</script>';
    }
    else
    {
      
    }
?>
<!DOCTYPE html>
<html lang="en" class="full-height">

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
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fixed-sn pink-skin" id="view">

    <!--Main Navigation-->
<header>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar rgba-indigo-light">
        <a class="navbar-brand" href="principal.php"><img style="width:100px; margin: -20px;" class="responsive-img" src="img/gclogo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-md-8">
        </div>
        <div class="col">
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="principal.php">Salas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="micuenta.php">Mi Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="php/logout.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    
        <div class="view intro-2">
            <div class="full-bg-img">
                <div class="mask rgba-black-strong flex-center">
                    
                <!-- Default form register -->
                    <form method="post" action="php/cambiarclave.php" class="text-center border border-light p-5 rgba-black-strong">

                        <p class="h4 mb-4 white-text">Cambiar Contraseña</p>
                               
                        <!-- Contraseña -->
                        <input type="password" name="clave" id="defaultRegisterFormEmail email" class="form-control mb-4" placeholder="Contraseña">   
                        <br>

                        <!-- Contraseña -->
                        <input type="password" name="claveconf" id="defaultRegisterFormEmail email" class="form-control mb-4" placeholder="Confirmar contraseña">   

                        <!-- Sign up button -->
                        <button name="cambiar" class="btn btn-info my-4 btn-block purple darken-3" type="submit">Cambiar contraseña</button>

                        <!-- Register -->
                        <p class="white-text">Regresa a 
                            <a class="purple-text" href="micuenta.php">Mi cuenta</a>
                        </p>
                    </form>
                        <!-- Default form register -->
                </div>
            </div>
        </div>
    
    </header>

    <!-- Footer -->
    <footer class="page-footer font-small purple darken-3 fixed-bottom">
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
