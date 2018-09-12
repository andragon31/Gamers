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

.container
{
    max-width: 1827px;
}

.mensaje
{
    max-width: 1823px;
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
    <div class="container center-items">
        <div class="row">
            <div class="col-md-3">
                <div class="container white" >
                    <h5 class="card-header info-color white-text text-center py-6 px-3 purple darken-3" style="margin-left:-15px; margin-right:-15px;">
                        <strong>Solicitudes</strong>
                    </h5>
                    <br>
                    <div class="classic-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active purple darken-3 white-text" id="recibidas-tab" data-toggle="tab" href="#recibidas" role="tab" aria-controls="recibidas" aria-selected="true">Solicitudes Recibidas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pink darken-3 white-text" id="enviadas-tab" data-toggle="tab" href="#enviadas" role="tab" aria-controls="enviadas" aria-selected="false">Solicitudes Enviadas</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="recibidas" role="tabpanel" aria-labelledby="recibidas-tab" style="height:442px;">
                                <br>
                                <div class="container white" id ="solicitudesrecibidas">
                                    <br>
                                    <div>
                                        <input type="text" placeholder="Buscar Usuario" class="form-control border-secondary" v-model="name">
                                    </div>
                                    <br>
                                    <div style="width: 370px; height:310px; max-height:800px; overflow: scroll; background: white; margin-bottom: 20px;">
                                    
                                        <div class="row center" v-for="user in buscarusuario">
                                            <div class="col-md-12 center" v-if="user.IDUsuarioRetado == <?php echo $idusuario ?>"> 
                                                <div class="row center" style="padding-left:">
                                                    <div class="col-md-5 center offset-md-1">
                                                        <h4 style="padding-top:17px;">{{user.NombreUsuario}}</h4>
                                                    </div>
                                                    <div class="col-md-5 center">
                                                        <form action="retar.php" method="post">
                                                        <button type="button" title="Aceptar Solicitud" class="btn btn-success px-3"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                        <button type="button" title="Rechazar Solicitud" class="btn btn-danger px-3"><i class="fa fa-close" aria-hidden="true"></i></button>
                                                            <input type="hidden" name="idretador" v-bind:value="user.IDUsuarioRetador">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="enviadas" role="tabpanel" aria-labelledby="enviadas-tab" style="height:442px;">
                            <br>
                            <div class="container white" id ="solicitudesenviadas">
                                    <br>
                                    <div>
                                        <input type="text" placeholder="Buscar Usuario" class="form-control border-secondary" v-model="name">
                                    </div>
                                    <br>
                                    <div style="width: 370px; height:310px; max-height:800px; overflow: scroll; background: white; margin-bottom: 20px;">
                                    
                                        <div class="row center" v-for="user in buscarusuario">
                                            <div class="col-md-12 center" v-if="user.IDUsuarioRetador == <?php echo $idusuario ?>"> 
                                                <div class="row center" style="padding-left:">
                                                    <div class="col-md-5 center offset-md-1">
                                                        <h4 style="padding-top:17px;">{{user.NombreUsuario}}</h4>
                                                    </div>
                                                    <div class="col-md-5 center">
                                                        <form action="retar.php" method="post">
                                                            <button name="retar" class="btn btn-small btn-danger center" type="submit" style="width:150px;">Cancelar</button>
                                                            <input type="hidden" name="idretador" v-bind:value="user.IDUsuarioRetador">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="col-md-6 border-dark">
                <div class="container white border-dark">
                    <h5 class="card-header info-color white-text text-center py-6 px-3 purple darken-3" style="margin-left:-15px; margin-right:-15px;">
                        <strong>Chat de Sala</strong>
                    </h5>
                    <div id="main" class="container border-dark">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-ms-3 border-dark">
                                <hr>
                                <div id="chatscroll" class="container border-dark chatscroll" style="width: 850px; max-height: 300px; overflow: scroll; background: white; margin-bottom: 20px;">
                                    <div v-for="item in mensajejson">
                                        <hr>
                                        <div class="container mensaje darker text-right deep-purple lighten-1 text-white" id="cont-mensaje" v-if="item.IDUsuarioEmisor == <?php echo $idusuario ?>">
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
                                        <input type="text" class="form-control border-secondary" v-model="msg" placeholder="Mensaje">
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <div class="col-10"></div>
                                        <button type="submit" class="btn purple darken-3">Enviar</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="container white" id ="usuarios" style="height:555px;">
                    <h5 class="card-header info-color white-text text-center py-6 px-3 purple darken-3" style="margin-left:-15px; margin-right:-15px;">
                        <strong>Usuarios en la sala</strong>
                    </h5>
                    <br>
                    <div>
                        <input type="text" placeholder="Buscar Usuario" class="form-control border-secondary" v-model="name">
                    </div>
                    <br>
                    <div style="width 400px; height:395px; max-height:800px; overflow:scroll; background:white; margin-bottom:20px;">
                    
                        <div class="row center" v-for="user in buscarusuario">
                            <div class="col-md-12 center" v-if="user.IDUsuario != <?php echo $idusuario ?>"> 
                                <div class="row center" style="padding-left:">
                                    <div class="col-md-5 center offset-md-1">
                                        <h4 style="padding-top:17px;">{{user.NombreUsuario}}</h4>
                                    </div>
                                    <div class="col-md-5 center">
                                        <form action="retar.php" method="post">
                                            <button name="retar" class="btn btn-small my-2 btn-block purple darken-3 center" type="submit" style="width:130px;">Retar</button>
                                            <input type="hidden" name="idretador" v-bind:value="user.IDUsuario">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <script src="js/vuesolicitudesenviadas.js"></script>		
    <script src="js/vuesolicitudesrecibidas.js"></script>		
    <script>
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        Ps.initialize(sideNavScrollbar);
    </script>
</body>

</html>
