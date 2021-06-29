<?php session_start(); ?>
<?php
        $idproducto=$_REQUEST["idproducto"];
        include("conexion.php");
        if($conn2->connect_error)
        {
            echo "Error de conexión a MySQL";
            die("");
        }

        $sql2 = "delete from producto where idproducto = $idproducto ;";

        if($conn2->query($sql2) === TRUE)
        {
            echo "<h1>producto eliminado exitosamente</h1>";

            echo "<script>window.location.href='listaproducto.php'</script>";
        }
        else
        {
            echo "<h1>Error al eliminar al producto;</h1>";
            echo $sql2;
        }
            
?>