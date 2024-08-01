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
		<div class="w-50 p-3 mx-auto" >
			<h3>Agregar producto</h3>
			<form action="registro.php" class="m-5" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Producto_id">producto_id</label>
					<input type="number" class="form-control" name="producto_id" id="txtProducto_id" required >
					<div class="valid-feedback">
				</div>
				<div class="form-group">
					<label for="Nombre">nombre</label>
					<input type="text" class="form-control" name="nombre" id="txtNombre" required>
				</div>
				<div class="form-group">
					<label for="Descripcion">descripcion</label>
					<input type="text" class="form-control" name="descripcion" id="txtDescripcion" required>
				</div>
				<div class="form-group">
					<label for="Precio">precio</label>
					<input type="number" class="form-control" name="precio" id="txtPrecio" required>
				</div>
				<div class="form-group">
					<label for="Stock">stock</label>
					<input type="number" class="form-control" name="stock" id="txtStock" required>
				</div>
				<div class="form-group">
					<label for="Proveedor">proveedor</label>
					<select class="form-control" name="proveedor_id" id="txtProveedor" required>
						<?php
						include('1conect.php');
						// Obtener datos de proveedores desde la base de datos
						$queryProveedores = "SELECT proveedor_id, nombre FROM proveedores";
						$resultProveedores = $conn->query($queryProveedores);

						if ($resultProveedores->num_rows > 0) {
							while ($rowProveedor = $resultProveedores->fetch_assoc()) {
								echo "<option value='" . $rowProveedor["proveedor_id"] . "'>" . $rowProveedor["nombre"] . "</option>";
							}
						} else {
							echo "<option value=''>No hay proveedores disponibles</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="Categoria">categoria</label>
					<select class="form-control" name="categoria_id" id="txtCategoria" required>
						<?php
						include('1conect.php');
						// Obtener datos de categorías desde la base de datos
						$queryCategorias = "SELECT categoria_id, nombre FROM categorias_producto";
						$resultCategorias = $conn->query($queryCategorias);

						if ($resultCategorias->num_rows > 0) {
							while ($rowCategoria = $resultCategorias->fetch_assoc()) {
								echo "<option value='" . $rowCategoria["categoria_id"] . "'>" . $rowCategoria["nombre"] . "</option>";
							}
						} else {
							echo "<option value=''>No hay categorías disponibles</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<input type="file" name="imagen_producto"/>
				</div>
				<div style="margin:0 35%; width: 70%" class="row justify-content-between">
                    <div class="col-xs-12 col-md-4">
                        <input type="submit" class="btn btn-success btn-block" value="Carga">
                    </div>
                </div>
			</form>
		</div>
	</body>
</html>