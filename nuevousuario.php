<?php session_start(); ?>
<?php

    if(isset($_REQUEST["passuno"]) && isset($_REQUEST["passdos"]))
    {
        $pass1 = $_REQUEST["passuno"];
        $pass2 = $_REQUEST["passdos"];
        $usralias = $_REQUEST["usralias"];

        if(!empty($pass1) && !empty($pass2))
        {
            if($pass1 == $pass2)
            {

                include("conexion.php");
                if($conn->connect_error)
                {
                    echo "Error de conexión a MySQL";
                    die("");
                }
                $sql = "insert into usuario(alias, pass) values('$usralias', md5('$pass1'));";
                echo $sql;
                if($conn->query($sql) === TRUE)
                {
                    echo "<script>alert('Usuario creado correctamente');window.location.href='usuarios.php'</script>";
                }
                else
                {
                    echo "<h1>Error al crear el usuario</h1>";
                }
            }
        }
    }
?>