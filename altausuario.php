<?php session_start(); ?>
<?php
    $alias_req = "";
    $alias_dis = "";
    $target = "nuevousuario.php";
    $texto = "Alta de usuario";
    if(isset($_REQUEST["alias"]))
    {
        $alias_req = $_REQUEST["alias"];
        $alias_dis = "readonly";
        $target = "altausuario.php";
        $texto = "Actualizar contraseña";
    }
?>
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

           <h2><?= $texto ?></h2>
            
            <?php echo '<form action="' . $target . '" method="POST" class="needs-validation" novalidate>'; ?>
                <div class="form-group">
                    <label for="usralias">Nombre de usuario:</label>
                    <input type="text"  class="form-control" <?= $alias_dis  ?> value="<?= $alias_req ?>" name="usralias" id="usralias" />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="passuno">Contraseña:</label>
                    <input type="password" class="form-control" required id="passuno" name="passuno" />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="passdos">Repetir contraseña:</label>
                    <input type="password" class="form-control" required id="passdos" name="passdos" />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <input type="submit" class="btn btn-dark" value="<?= $texto ?>"/>
                <a href="usuarios.php" class="btn btn-dark">Ver usuarios</a>
            </form>

            <div class="line"></div>

            
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
    <script>
        // Disable form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>
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