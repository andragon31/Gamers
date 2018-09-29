<?php
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
require 'OAuth.php';


if (!isset ($_SESSION))
{
    session_start ();
}
	
if(isset($_POST['recuperar']))
{   
    include 'conexion.php';

    $email = mysqli_real_escape_string ( $link, $_POST ['email']);

    $result = mysqli_query ( $link, sprintf ("SELECT * FROM Usuario WHERE EmailUsuario = '%s'", $email));

    if (mysqli_num_rows($result) > 0) 
    {
        $clavenueva = substr(md5(time()), 0, 6);

        //$result = mysqli_query ( $link, sprintf ("SELECT * FROM Usuario WHERE EmailUsuario = '%s'", $email));
        $result = mysqli_query ( $link, sprintf ("UPDATE Usuario SET ClaveUsuario = '%s' WHERE EmailUsuario = '%s'", $clavenueva, $email));
    
        $result = mysqli_query ( $link, sprintf ("SELECT * FROM Usuario WHERE EmailUsuario = '%s'", $email));

        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_array($result);
            $nombre = $row['NombreUsuario']; 
            $clave = $row['ClaveUsuario'];
            
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            $mail->isSMTP();
            /*
            Enable SMTP debugging
            0 = off (for production use)
            1 = client messages
            2 = client and server messages
            */
            $mail->SMTPDebug = 0;
            $mail->Host = 'gamerchallenge.net';
            $mail->Port = 26;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "info@gamerchallenge.net";
            $mail->Password = "gamerchallenge2018";
            $mail->setFrom('info@gamerchallenge.net', 'GamerChallenge');
            $mail->addAddress($email, $nombre);
            $mail->Subject = 'Recuperar Contraseña';
            $mail->Body = 'Tu nueva contraseña es: '.$clave.'. Para cambiar tu contraseña ingresa a la 
            plataforma y ve a "mi cuenta", ahí podrás modificar tu contraseña nuevamente';

            $mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
            $mail->IsHTML(true);

            if (!$mail->send())
            {
                echo '<script>alert("Error al enviar el E-Mail")</script>';
                //echo ": ".$mail->ErrorInfo;
                echo '<script> window.location = "../recuperarclave.php";</script>';
            }
            else
            {
                echo '<script>alert("E-Mail enviado")</script>';
                //echo "";
                echo '<script> window.location = "../login.php";</script>';
            }
        }
    }
    else
    {
        echo '<script>alert("EL CORREO NO EXISTE")</script>';
        echo '<script> window.location = "../recuperarclave.php";</script>';
    }

}

?>