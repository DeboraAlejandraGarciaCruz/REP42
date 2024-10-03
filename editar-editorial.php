<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Editorial y/o Estado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #333;
            color: #fff;
        }

        .card {
            background-color: #444;
            color: #fff;
        }

        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
include("conexion/conectar.php");

if(isset($_GET['id'])) {
    $ID_Editorial_PK = $_GET['id'];

    $sql = "SELECT * FROM editorial_da WHERE ID_Editorial_PK = '$ID_Editorial_PK'";
    $ejecSql = mysqli_query($cn, $sql);

    if(mysqli_num_rows($ejecSql) > 0) {
        $editorial = mysqli_fetch_assoc($ejecSql);
    } else { 
        echo "Ninguna editorial disponible con ese nombre";
        exit;  
    }  
} else {   
    echo "Se requiere el parámetro";
    exit;
}

if(isset($_POST['submit'])) {
    $NombreAc = $_POST['Nombre_E']; 
    $EstadoAc = $_POST['Estado_E'];

    // Llamar al procedimiento almacenado para actualizar la editorial 
    $sqlUp = "CALL proc_editarEdit($ID_Editorial_PK, '$NombreAc', '$EstadoAc')";
    if (mysqli_query($cn, $sqlUp)) {
        echo "Editorial actualizada";

        // Redireccionar a la página de consulta de editoriales u otra página deseada
        header("Location:Editoriales.php");
        exit;
    } else { 
        echo "Error al actualizar la editorial: ".mysqli_error($cn);
        exit;
    }
}
?>

<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="font-weight-bold">Editar Editorial y/o Estado</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="Nombre_E">Editorial</label>
                                <input type="text" class="form-control" id="Nombre_E" name="Nombre_E" value="
                                <?php echo $editorial['Nombre_E']; ?>">
                            <br>
                            </div>

                             <div class="form-group">
                                <label for="Estado_E">Estado</label>
                                <input type="text" class="form-control" id="Estado_E" name="Estado_E" value="
                                <?php echo $editorial['Estado_E']; ?>">
                                <br>
                            </div>
                            
                            <div class="text-center" >
        <input type="submit" class="btn btn-primary" name="submit" value="Actualizar">
        <br>
        <a href="Editoriales.php" class="btn btn-secondary btn-back">Regresar</a>
    </form>
</body>
</html>

<?php
mysqli_close($cn);
?>
