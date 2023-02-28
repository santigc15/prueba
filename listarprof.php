<?php
// Dirección o IP del servidor MySQL
$host = "localhost";
// Puerto del servidor MySQL
$puerto = "3306";
// Nombre de usuario del servidor MySQL
$usuario = "root";
// Contraseña del usuario
$contrasena = "";
// Nombre de la base de datos
$baseDeDatos = "libreria";
// Nombre de la tabla a trabajar
$tabla = "libros";
function Conectarse()
{
    global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
    $link = new mysqli($host,$usuario,$contrasena,$baseDeDatos);
    if ($link->connect_error) {
        echo "Error conectando a la base de datos.<br>";
        exit();
    } 
    return $link;
}

$link = Conectarse();

$querySelect = "select * from libros";
$resultado=$link->query($querySelect);
$bodyTabla="";
if($resultado->num_rows>0){
    while($registro=$resultado->fetch_assoc()){
        $bodyTabla.="<tr><td>".$registro["id"]."</td><td>".$registro["titulo"]."</td><td>".$registro["precio"]."</td></tr>";
    }
    echo $bodyTabla;
}
$link->close();

