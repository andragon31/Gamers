<?php
    if (!isset ( $_SESSION ))
    {
        session_start ();
    }
    include 'php/conexion.php';
    include 'php/ingresarsala.php';

    
    //var_dump($_SESSION["IDSala"]);
    //echo '<script>alert("'.$_SESSION["IDSala"].'")</script> ';
    

    //echo '<script>alert("'.$idusuario.'")</script>';
    
    if (!isset($_SESSION['IDUsuario']))
    {
        echo '<script> window.location = "login.php";</script>';
    }
    else
    {
        $idusuario = $_SESSION['IDUsuario'];
        //var_dump($idusuario);
        $idsala = $_SESSION['IDSala'];
        $imgfifa="img/fifa18n.jpg";
        $imgcod="img/cod.jpg";
        $imgsmash="img/smash.png";
        $background = "";

        if($idsala == 1)
        {
            $background = $imgfifa;
        }
        elseif($idsala == 2)
        {
            $background = $imgcod;
        }
        else
        {
            $background = $imgsmash;
        }
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
    <link href="css/estilochat.css">
</head>

<style>
body, html {
    height: 100%;
}
.bg {
    /* The image used */
    background-image: url("<?php echo $background ?>");

    /* Full height */
    height: 100%;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>

<body class="bg" id="view">

    <!--Main Navigation-->
    <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar rgba-indigo-light">
        <a class="navbar-brand" href="principal.php"><img style="width:100px; margin: -20px;" class="responsive-img" src="img/gclogo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-md-9">
        </div>
        <div class="col"></div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="principal.php">Salas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mi Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="php/logout.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<br><br><br><br><br><br><br>
    <!--body-->

    <h1>HOLA MUNDO</h1>

    <div class="container center-items">
        <div class="row">
            <div class="col-md-3">
                <h3>DIV 1</h3>
            </div>
            <div class="col-md-6">
                <h3>DIV 2</h3>
            </div>
            <div class="col-md-3">
                <h3>DIV 3</h3>
            </div>
        </div>
    </div>




    <!--TABLA DE USUARIOS-->
    <!-- Button trigger modal-->
<button type="button" class="btn btn-primary purple darken-3" data-toggle="modal" data-target="#modalCart" style="position:absolute; bottom:90px; right:150px;" v-on:click="">Retar</button>

<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header purple darken-3">
                <h4 class="modal-title white-text" id="myModalLabel">Usuarios a retar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body center-text">

                <div class="container" id="usuarios">
                    <br>
                    <div>
                        <input type="text" placeholder="Buscar Usuario" class="form-control" v-model="name">
                    </div>
                    <div class="row" v-for="user in buscarusuario">
                        <div class="col-md-2"></div>
                        <div class="col-md-4" v-if="user.IDUsuario != <?php echo $idusuario ?>">
                        <br>
                            <h3 class="text-center"><b>{{user.NombreUsuario}}</b></h3>
                        </div>
                        <div class="col-md-4" v-if="user.IDUsuario != <?php echo $idusuario ?>">
                            <form action="retar.php" method="post">
                                <button name="retar" class="btn btn-small my-4 btn-block purple darken-3" type="submit" style="">Retar</button>
                                <input type="hidden" name="idretador" v-bind:value="user.IDUsuario">
                            </form>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary purple darken-3 text-white" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal: modalCart -->

    <!--FIN DE TABLA DE USUARIOS-->

    <button type="button" class="btn btn-primary purple darken-3" data-toggle="modal" data-target="#modalPoll" style="position:absolute; bottom:90px; right:10px;">Mensajes</button>
    <!-- Modal: modalPoll -->
    <div class="modal fade right" id="modalPoll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-info " role="document">
        <div class="modal-content">
        <!--Header-->
        <div class="modal-header purple darken-3">
            <p class="heading lead">Mensajes
            </p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

        <!--Body-->
        <div class="modal-body" style="">
            <!--BLOQUE DE MENSAJES DE LA SALA-->
            <div id="main" class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-ms-3">
                        <hr>
                        <div class="container" style="height: 650px; width: 350px; border: 1px solid #ddd; background: #ffffff; overflow-y: scroll;">
                            <div v-for="item in mensajejson">
                                <hr>
                                <div class="container darker text-right deep-purple lighten-1 text-white" id="cont-mensaje" v-if="item.IDUsuarioEmisor == <?php echo $idusuario ?>">
                                    <p style="font-size:15px;"><b>{{item.NombreUsuario}}</b>: {{item.Mensaje}}</p>
                                    <span class="time-right" style="font-size:10px;">{{item.Fecha}}</span>
                                </div>
                                <div class="container whiten text-left pink darken-4 text-white" id="cont-mensaje" v-else>
                                    <p style="font-size:15px;"><b>{{item.NombreUsuario}}</b>: {{item.Mensaje}}</p>
                                    <span class="time-left" style="font-size:10px;">{{item.Fecha}}</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <form v-on:submit.prevent="enviarmensaje">
                            <div class="input-group">
                                <label><b>Mensaje:</b></label>
                                <input type="text" class="form-control" v-model="msg">
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="submit" class="btn purple darken-3">Enviar
                                </button>
                                <button type="button" class="btn purple darken-3" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!--BLOQUE DE MENSAJES DE LA SALA-->
            <!--Basic textarea-->
        </div>
            <!--Footer-->
        </div>
        
    </div>
    </div>
    <!-- Modal: modalPoll -->
    <!--fin body-->
    
    <br>
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
    <!--LIBRERIAS JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
    <script src="js/vue-resource.min.js"></script>
    <script src="js/vuesala.js"></script>	
    <script src="js/vueusuarios.js"></script>	
    <script>
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        Ps.initialize(sideNavScrollbar);
    </script>
</body>

</html>
