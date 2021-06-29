<?php
    $servername = "localhost:3307";
    $username = "root";
    $password = "jrvb";
    $dbname = "t197009actividad";

    $conn  = new mysqli($servername , $username, $password, $dbname);


    $dbname2 = "T197Tienda";

    $conn2  = new mysqli($servername, $username, $password, $dbname2);
?>