<?php session_start(); ?>
<?php
    if(isset($_REQUEST["idusuario"]))
    {
        $idusuario=$_REQUEST["idusuario"];
        include("conexion.php");
        if($conn->connect_error)
        {
            echo "Error de conexión a MySQL";
            die("");
        }

        $sql = "delete from usuario where idusuario = $idusuario";

        if($conn->query($sql) === TRUE)
        {
            echo "<h1>Usuario eliminado exitosamente</h1>";
            //header("location:usuarios.php");
            echo "<script>window.location.href='usuarios.php'</script>";
        }
        else
        {
            echo "<h1>Error al eliminar al usuario;</h1>";
            echo $sql;
        }
            
    }
?>