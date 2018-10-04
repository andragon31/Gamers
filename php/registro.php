<?php
if (!isset ($_SESSION))
{
    session_start ();
}
	
if(isset($_POST['registro']))
{   
    include 'conexion.php';
    
    $usuario = mysqli_real_escape_string ( $link, $_POST ['nombrer']);
	$email = mysqli_real_escape_string ( $link, $_POST ['email']);
    $clave = mysqli_real_escape_string ( $link, $_POST ['claver']);
    $claveconf = mysqli_real_escape_string ( $link, $_POST ['claveconf']);

    //PRIMERO EVALUAMOS QUE ESE CORREO NO EXISTA
    $result = mysqli_query ( $link, sprintf ("SELECT IDUsuario, NombreUsuario FROM Usuario WHERE EmailUsuario = '%s'", $email));

    if (mysqli_num_rows($result) > 0) 
    {
        echo '<script>alert("EL CORREO YA EXISTE")</script>';
    }
    else
    {

    }

    if(empty($usuario) || empty($email) || empty($clave) || empty($claveconf))
    {
        echo '<script>alert("DEBE LLENAR TODOS LOS CAMPOS")</script>';
        echo '<script> window.location = "../registro.php";</script>';
    }
    else
    {
        $result = mysqli_query ( $link, sprintf ("SELECT * FROM Usuario WHERE EmailUsuario = '%s'", $email));
        if (mysqli_num_rows($result) != 0) 
        {
            echo '<script>alert("EL CORREO YA EXISTE")</script>';
            echo '<script> window.location = "../registro.php";</script>';
        }
        else
        {
            $result = mysqli_query ($link, sprintf ("SELECT * FROM Usuario WHERE NombreUsuario = '%s'", $usuario));
            if (mysqli_num_rows($result) != 0) 
            {
                echo '<script>alert("EL NOMBRE DE USUARIO YA EXISTE")</script>';
                echo '<script> window.location = "../registro.php";</script>';
            }
            elseif ($clave == $claveconf)
            {
                $encriptada = password_hash($clave, PASSWORD_BCRYPT);
                //var_dump($encriptada);
                $sql ="INSERT INTO Usuario (NombreUsuario, ClaveUsuario, EmailUsuario) VALUES ('$usuario','$encriptada','$email')";
                $result = mysqli_query($link, $sql);
                    
                echo '<script>alert("USUARIO REGISTRADO")</script> ';
                echo '<script> window.location = "../principal.php";</script>';
                
                mysqli_close ($link);
                exit();
            }
            else
            {
                echo '<script>alert("LOS CAMPOS DE LA CONTRASEÑA NO SON CORRECTOS")</script>';
                echo '<script> window.location = "../registro.php";</script>';
            }
        }
    }

    
    
}
?>