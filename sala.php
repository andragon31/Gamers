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
    <h2>HOLA MUNDO</h2>
    <!--TABLA DE USUARIOS-->
    <div class="table-wrapper-scroll-y" style="width:150px;" id="usuarios">
        <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
            <th scope="col">USUARIOS A RETAR</th>
            </tr>
        </thead>
        <tbody>
                <tr v-for="user in mensajejson">
                <td v-if="user.IDUsuario != <?php echo $idusuario ?>">
                    <form action="" method="">
                        <input type="hidden" name="idsala" v-bind:value="user.IDUsuario">
                    <button name="retar" class="btn btn-info my-4 btn-block purple darken-3" type="">{{user.NombreUsuario}}</button>
                    </form>
                </td>
                </tr>  
        </tbody>
        </table>

    </div>

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
                                <a type="submit" class="btn btn-primary waves-effect waves-light purple darken-3">Enviar
                                <i class="fa fa-paper-plane ml-1"></i>
                                </a>
                                <a type="button" class="btn btn-outline-primary waves-effect purple darken-3" data-dismiss="modal">Cancel</a>
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
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
    <!--LIBRERIAS JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
    <script src="js/vue-resource.min.js"></script>
    <script src="js/axios.min.js"></script>
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
