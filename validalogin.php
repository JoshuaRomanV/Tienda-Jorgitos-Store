<?php 
    session_start();
    if(isset($_REQUEST["usralias"]) && isset($_REQUEST["usrpass"]))
    {
        include("conexion.php");
        include_once "alerta_modal.php";
        if($conn->connect_error)
        {
            echo "Error de conexión." . $conn->connect_error;
            die("Error de conexión." . $conn->connect_error);
        }
         
        $usuario = $_REQUEST["usralias"];
        $password = $_REQUEST["usrpass"];
        
        $_SESSION["Usuario"] = $usuario;
        $sql = "select * from usuario where alias = '$usuario'";
       
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            $sql = "select * from usuario where alias = '$usuario' and pass = md5('$password');";
            if($result->num_rows > 0)
            {
                MensajeAlerta("correcto", "Bienvenido(a) usuario $usuario ", "dashboard.php");
            }
            else
            {
                MensajeAlerta("error", "Datos de acceso incorrectos, vuelve a intentarlo", "index.php");
            }
        }
        else
        {
             MensajeAlerta("error", "Datos de acceso incorrectos", "index.php");
        }

    }
?>