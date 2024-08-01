<?php
include('1conect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST['producto_id'];

    // Aquí deberías agregar la lógica para validar y eliminar el producto por su ID

    $sql = "DELETE FROM `productos` WHERE producto_id = '$producto_id'";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de la lista de productos después de la eliminación
        header("Location: lista_productos.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    echo "Error: No se ha recibido una solicitud POST.";
}

$conn->close();
?>
