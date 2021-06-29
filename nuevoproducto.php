<?php session_start(); ?>
<?php

        $nombreproducto = $_REQUEST["nombreproducto"];
        $descripcionproducto = $_REQUEST["descripcionproducto"];
        $precioproducto = $_REQUEST["precioproducto"];
        $inventarioproducto = $_REQUEST["inventarioproducto"];
        $urlproducto= $_REQUEST["urlproducto"];
        $activo = $_REQUEST["activo"];

                include("conexion.php");
                if($conn2->connect_error)
                {
                    echo "Error de conexión a MySQL";
                    die("");
                }
                $sql2 = "insert into producto 
                (nombreproducto, descripcionproducto, precioproducto, inventarioproducto, urlproducto, activo) 
                values('$nombreproducto','$descripcionproducto',$precioproducto , $inventarioproducto , '$urlproducto', $activo );";
                echo $sql2;
                if($conn2->query($sql2) === TRUE)
                {
                    echo "<script>alert('Producto creado correctamente');window.location.href='listaproducto.php'</script>";
                }
                else
                {
                    echo "<h1>Error al crear el producto</h1>";
                }
     
?>