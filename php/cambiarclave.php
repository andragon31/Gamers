<?php
if (!isset ($_SESSION))
{
    session_start ();
}
	
if(isset($_POST['cambiar']))
{   
    include 'conexion.php';
    
    $clave = mysqli_real_escape_string ( $link, $_POST ['clave'] );
	$claveconf = mysqli_real_escape_string ( $link, $_POST ['claveconf'] );
    
    if ($clave == $claveconf)
    {
        $result = mysqli_query ( $link, sprintf ("UPDATE Usuario SET ClaveUsuario = '%s' WHERE IDUsuario = '%s'", $clave, $_SESSION['IDUsuario']));

        mysqli_close ($link);
        
        echo '<script>alert("LA CONTRASEÑA HA SIDO MODIFICADA")</script>';
        echo '<script> window.location = "../micuenta.php";</script>';
    }
    else
    {
        echo '<script>alert("LOS CAMPOS NO SON CORRECTOS")</script>';
        echo '<script> window.location = "../cambiarclave.php";</script>';
    }
}

?>