<?php session_start(); ?>
<?php
    $alias_req = "";
    $alias_dis = "";
    if(isset($_REQUEST["alias"]))
    {
        $alias_req = $_REQUEST["alias"];
        $alias_dis = "disabled";
    }
?>

<html>
    <head>
        <title>Resetea tu contraseña</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" ></script>
    </head>
    <body>
        <form action="reseteapass.php" method="POST">
            <table style="width:50%">
                <tr>
                        <td>
                            Escriba tu usuario:
                        </td>
                        <td>
                            <input type="text" name="usralias" <?= $alias_dis ?>  value="<?php echo $alias_req ?>" />
                        </td>
                </tr>
                <tr>
                    <td>
                        Escriba una nueva contraseña:
                    </td>
                    <td>
                        <input type="password" name="passuno" />
                    </td>
               </tr>
               <tr>
                    <td>
                        Repita la nueva contraseña:
                    </td>
                    <td>
                        <input type="password" name="passdos" />
                    </td>
               </tr>
               <tr>
                    <td colspan="2">
                        <input type="Submit" value="Resetear" />
                    </td>
               </tr>
            </table>
        </form>
    </body>
</html>
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

            $sql = "update usuario set pass = md5('$pass1'), ultcambio = now() where alias = '$usralias';";

            if($conn->query($sql) === TRUE)
            {
                echo "<script>alert('Contraseña cambiada correctamente');window.location.href='usuarios.php'</script>";
            }
            else
            {
                echo "<h1>Usuario o constraseñas incorrectos</h1>";
            }
        }
    }
}

?>