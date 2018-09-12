<?php
if (!isset ($_SESSION))
{
    session_start ();
}
    
include 'conexion.php';

if(isset($_POST['aceptar']))
{   
    
    
    $idsolicitud = mysqli_real_escape_string ( $link, $_POST ['idsolicitud']);
    
    $result = mysqli_query ( $link, sprintf ("UPDATE Usuario SET EstatusSolicitud = 'Aceptado' WHERE IDSolicitudReto = '%s'", $idsolicitud));

    echo '<script>alert("Solicitud aceptada")</script> ';
    echo '<script> window.location = "../sala.php";</script>';
}

elseif(isset($_POST['rechazar']))
{   
    
    
    $email = mysqli_real_escape_string ( $link, $_POST ['emaillg'] );
	$clave = mysqli_real_escape_string ( $link, $_POST ['clavelg'] );
    
    $result = mysqli_query ( $link, sprintf ("SELECT IDUsuario, NombreUsuario FROM Usuario WHERE EmailUsuario = '%s' AND ClaveUsuario = '%s'", $email,$clave));


    if (mysqli_num_rows($result) != 0) 
    {
        $row = mysqli_fetch_array($result);
        $_SESSION['IDUsuario'] = $row['IDUsuario'];
        
        
        mysqli_free_result ($result);
		mysqli_close ($link);
        echo '<script> window.location = "../principal.php";</script>';
    }
    else
    {
        mysqli_free_result ($result);
		mysqli_close ($link);
        
        echo '<script> window.location = "../login.php";</script>';
    }
}

elseif(isset($_POST['cancelar']))
{   
    
    
    $email = mysqli_real_escape_string ( $link, $_POST ['emaillg'] );
	$clave = mysqli_real_escape_string ( $link, $_POST ['clavelg'] );
    
    $result = mysqli_query ( $link, sprintf ("SELECT IDUsuario, NombreUsuario FROM Usuario WHERE EmailUsuario = '%s' AND ClaveUsuario = '%s'", $email,$clave));


    if (mysqli_num_rows($result) != 0) 
    {
        $row = mysqli_fetch_array($result);
        $_SESSION['IDUsuario'] = $row['IDUsuario'];
        
        
        mysqli_free_result ($result);
		mysqli_close ($link);
        echo '<script> window.location = "../principal.php";</script>';
    }
    else
    {
        mysqli_free_result ($result);
		mysqli_close ($link);
        
        echo '<script> window.location = "../login.php";</script>';
    }
}

?>