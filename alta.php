<?php
require_once "database.php";

if (isset($_POST['register'])) {
   

    $datos = array();
    $datos["titulo"] = $_POST['titulo'];
    $datos["precio"] = $_POST['precio'];
 

$db=new Database();
$db->insertarlibro();

}else{
    require_once("alta.html");
}

?>
