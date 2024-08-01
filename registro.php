<!DOCTYPE html>
<html>
 <head>
 <link rel="shortcut icon" type="image/x-icon" href="img/xianguo.icon.png"/>
	 <meta charset="utf-8"/>
	 <title>Market Xianguo</title>
	 <script type="text/javascript" src="js/listado.js"></script>
	 <script type="text/javascript" src="js/extras.js"></script>
	 <link rel="stylesheet" href="css/bootstrap.min.css">
 </head>
 <body style="margin:5%;">
 <?php
include('1conect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r ($_FILES);
    if (isset($_FILES["imagen_producto"])) {
        $producto_id  = $_POST['producto_id'];
        $nombre       = $_POST['nombre'];
        $descripcion  = $_POST['descripcion'];
        $precio       = $_POST['precio'];
        $stock        = $_POST['stock'];
        $proveedor_id = $_POST['proveedor_id'];
        $categoria_id = $_POST['categoria_id'];
        $imagen_nombre = $_FILES["imagen_producto"]["name"];
        $imagen_temporal = $_FILES["imagen_producto"]["tmp_name"];
        $rutaImagen = "D:/xampp/htdocs/pfn/images/" . $nombre . ".jpg";
        $contador = 1;

        while (file_exists($rutaImagen)) {
            $rutaImagen = "D:/xampp/htdocs/pfn/images/" . $nombre . "_" . $contador . ".jpg";
            $contador++;
        }

        if (move_uploaded_file($imagen_temporal, $rutaImagen)) {
            $sql = "INSERT INTO productos (producto_id, nombre, descripcion, precio, stock, proveedor_id, categoria_id, foto_ruta) 
                    VALUES ('$producto_id', '$nombre', '$descripcion', '$precio', '$stock', '$proveedor_id', '$categoria_id', '$rutaImagen')";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                if ($stmt->execute()) {
                    // Redirigir a alta.php después del éxito
                    header("Location: alta.php");
                    exit();
                } else {
                    echo "Error al agregar el producto: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error en la preparación de la consulta.";
            }
        } else {
            echo "Error al mover la imagen a la carpeta.";
        }
    } else {
        echo "Error: La clave 'imagen_producto' no está definida en el array \$_FILES.";
    }
} else {
    echo "Error: No se ha recibido una solicitud POST.";
}

$conn->close();
?>
</body>
</html>


