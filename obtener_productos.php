<?php
include('1conect.php');

$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);

$productos = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = [
            'nombre' => $fila['nombre'],
            'descripcion' => $fila['descripcion'],
            'precio' => $fila['precio'],
            'imagen' => $fila['Foto_Ruta'] ?? null
        ];
    }
}

echo json_encode($productos);
$conn->close();
?>
