<?php
    if(!isset($_SESSION["Usuario"]))
    {
        //echo "Error en la sesión";
    echo "<script>window.location.href='index.php'</script>";
    }
    
?>
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid" >

        <button type="button" id="sidebarCollapse" class="btn ">
            <i class="fas fa-align-left"></i>
            <span id="btnSide">Menú</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active text-center" >
                    <a style="color:#0e160f" class="nav-link" href="#"><i style="color:#0e160f" class="fas fa-user-circle fa-2x"></i><br/><?= $_SESSION["Usuario"]; ?></a>
                </li>
            </ul>
        </div>
    </div>
    </nav>