<?php
if (!isset ($_SESSION))
{
    session_start ();
}
	
if(isset($_POST['login']))
{   
    include 'conexion.php';
    
    $email = mysqli_real_escape_string ( $link, $_POST ['emaillg'] );
	$clave = mysqli_real_escape_string ( $link, $_POST ['clavelg'] );
    
    $result = mysqli_query ( $link, sprintf ("SELECT * FROM Usuario WHERE EmailUsuario = '%s'", $email));


    if (mysqli_num_rows($result) != 0) 
    {
        $row = mysqli_fetch_array($result);
        if(password_verify($clave, $row['ClaveUsuario']))
        {
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
    else
    {
        mysqli_free_result ($result);
		mysqli_close ($link);
        
        echo '<script> window.location = "../login.php";</script>';
    }
}

?>