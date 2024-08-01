<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" type="image/x-icon" href="images/xianguo.icon.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <title>Market Xianguo</title>
	</head>
	<body style="margin:5%;">
	<header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container">
                    <img src="images/xianguo.icon.png" height="50px" style="border-radius: 40%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="navbar-brand" href="index.html">Market Xianguo</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </header>
<!-- Formulario para ingresar el ID del producto -->
<form action="" method="GET">
    <div class="form-group">
        <label for="producto_id">Ingrese el ID del Producto:</label>
        <input type="number" class="form-control" name="producto_id" required>
    </div>
    <button type="submit" class="btn btn-primary">Buscar Producto</button>
</form>

<?php
include('1conect.php');
function obtenerDetallesProducto($producto_id) {
    global $conn;
    $sql = "SELECT * FROM productos WHERE producto_id = $producto_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false; // Producto no encontrado
    }
}

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["producto_id"])) {
        $producto_id = $_GET["producto_id"];
        $producto = obtenerDetallesProducto($producto_id);
    
        if ($producto) {
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <link rel="shortcut icon" type="image/x-icon" href="img/xianguo.icon.png"/>
                <meta charset="utf-8"/>
                <title>Modificar Producto</title>
                <script type="text/javascript" src="js/extras.js"></script>
                <link rel="stylesheet" href="css/bootstrap.min.css">
            </head>
            <body style="margin:5%;">
    
            <h3>Modificar Producto</h3>
            <form action="registro.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="producto_id" value="<?php echo $producto["producto_id"]; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $producto["nombre"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $producto["descripcion"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" name="precio" value="<?php echo $producto["precio"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" name="stock" value="<?php echo $producto["stock"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="proveedor_id">Proveedor ID</label>
                    <input type="number" class="form-control" name="proveedor_id" value="<?php echo $producto["proveedor_id"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoría ID</label>
                    <input type="number" class="form-control" name="categoria_id" value="<?php echo $producto["categoria_id"]; ?>" required>
                </div>
                 <div class="form-group">
                <label for="imagen_producto">Imagen del Producto</label>
                <input type="file" class="form-control" name="imagen_producto">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            </form>
            </body>
            </html>
            <?php
        } else {
            echo "Error: No se encontró el producto.";
        }
    } else {
        echo "Error: No se ha proporcionado un ID de producto válido.";
    }
$conn->close();
?>
</body>
</html>
