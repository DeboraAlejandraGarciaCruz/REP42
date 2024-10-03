<?php
include ("conexion/conectar.php");
//recibiendo el id por la URL y por un GET
$ID_Editorial_PK= $_GET['id'];
//echo $idEditorial;

$sql= "UPDATE editorial_da SET Estado_E = '0' 
WHERE ID_Editorial_PK = '$ID_Editorial_PK'";

if (mysqli_query($cn, $sql)){
    header("location:Editoriales.php");
} else {
    echo "Problemas al Eliminar editorial, consulte al administrador";
}
?>
