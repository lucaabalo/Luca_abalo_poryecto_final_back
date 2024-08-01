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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3>Eliminar Producto</h3>
                <form action="procesar_eliminar_producto.php" method="POST">
                    <div class="form-group">
                        <label for="producto_id">Selecciona el ID del Producto a Eliminar:</label>
                        <input type="number" class="form-control" name="producto_id" required>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Eliminar Producto</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
