<?php
include("Conexion/conectar.php");

if (isset($_GET['id'])) {
    $idEditorial = $_GET['id'];

    $sql = "SELECT * FROM editorialac WHERE idEditorial = '$idEditorial'";
    $result = mysqli_query($cn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $editorial = mysqli_fetch_assoc($result);
    } else {
        echo "No se encontró ninguna editorial.";
        exit;
    }
} else {
    echo "Se requiere el parámetro 'id' en la URL.";
    exit;
}

if (isset($_POST['submit'])) {
    $nombreEditorialAc = $_POST['nombreEditorial'];
    $estadoEditorialAc = $_POST['estadoEditorial'];

    // Llamar al procedimiento almacenado para actualizar la editorial
    $sqlUp = "CALL proc_editoriales('$idEditorial', '$nombreEditorialAc', '$estadoEditorialAc')";
    if (mysqli_query($cn, $sqlUp)) {
        echo "Editorial actualizada correctamente.";

        // Redireccionar a la página de consulta de editoriales u otra página deseada
        header("Location: consultar_editorial.php");
        exit;
    } else {
        echo "Error al actualizar la editorial: " . mysqli_error($cn);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Editorial</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post">
        <h2 style="text-align: center; color: #4CAF50;">Actualizar Editorial</h2>
        
        <input type="hidden" name="idEditorial" value="<?php echo $editorial['idEditorial']; ?>">
        
        <label for="nombreEditorial">Nombre de la Editorial:</label>
        <input type="text" name="nombreEditorial" value="<?php echo $editorial['nombreEditorial']; ?>">

        <label for="estadoEditorial">Estado:</label>
        <input type="text" name="estadoEditorial" value="<?php echo $editorial['estadoEditorial']; ?>">

        <div style="text-align: center;">
            <button type="submit" name="submit" value="Actualizar">Actualizar</button>
        </div>
    </form>
</body>
</html>

<?php
mysqli_close($cn);
?>