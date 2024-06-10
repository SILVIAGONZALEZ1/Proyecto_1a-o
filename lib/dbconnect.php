<?php
function Conectarse()
{
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "sga_belgrano";

    // Crear conexión
    $link = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($link->connect_error) {
        die("Error conectando a la base de datos: " . $link->connect_error);
    }

    return $link;
}
?>


