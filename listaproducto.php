<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>
    
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include("menu.html"); ?>

<!-- Page Content  -->
<div id="content">

    <?php include("header.php"); ?>
 
            <h2>Lista de Productos</h2>
            <a class="btn btn-dark" style="margin-bottom:15px" href="altaproducto.php">Agregar productos</a>
            <?php
    
                        include("conexion.php");

                        if($conn2->connect_error)
                        {
                            echo "Error de conexión." . $conn2->connect_error;
                            die("Error de conexión." . $conn2->connect_error);
                        }
                        $sql2 = "select * from producto";
                        $result2 = $conn2->query($sql2);

                        
                        if($result2->num_rows > 0) //6 
                        {
                            echo "<div class='table-responsive' style='overflow-x: auto;
                            white-space: nowrap;'><table class='table table-dark table-hover text-center'><tr><th>ID</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>inventario</th><th>imagen</th><th>Activo</th><th>Eliminar</th></tr>";
                            while($row = $result2->fetch_assoc()) //6 vueltas
                            {
                                echo "<tr >
                                        <td>" . $row["idproducto"] . "</td>
                                        <td>" . $row["nombreproducto"] . "</td>
                                        <td>" . $row["descripcionproducto"] . "</td>
                                        <td>" . $row["precioproducto"] . "</td>
                                        <td>" . $row["inventarioproducto"] . "</td>
                                        <td>" . $row["urlproducto"] . "</td>
                                        <td>" . $row["activo"] . "</td>
                                        <td><a href='borrarproducto.php?idproducto=" . $row["idproducto"] . "'><i class='fas fa-trash-alt fa-2x'></i></a></td>
                                    </tr>";
                            }
                            echo "</table><div><br/>";
                        }
                        else
                        {
                            echo "<h1>No se encontraron datos</h1>";
                        }

                        ?>
        </div>
        
    </div>
    

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>

