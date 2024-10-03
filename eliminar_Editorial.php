<?php
include('Conexion/conectar.php');
//recibiendo el id por la URL por GET
$idEditorial =$_GET['id'];
//echo $idEditorial;
$sql = "UPDATE editorialac SET estadoEditorial = '0' WHERE idEditorial = '$idEditorial'";
if(mysqli_query($cn,$sql)){
    header("location: consultar_editorial.php");
}else{
    echo "Problemas al Eliminar Editorial, consulte al Administrador";
}

?>