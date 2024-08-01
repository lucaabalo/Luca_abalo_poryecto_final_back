<?php
include('1concect.php'); // Asegúrate de poner ; al final de las líneas de código

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar y limpiar los datos antes de usarlos en la consulta SQL
    // Aquí deberías agregar la lógica para validar los datos y realizar la inserción en la base de datos
    // Recuerda usar funciones de hash seguras para almacenar las contraseñas

    $sql = "INSERT INTO gerente_empleados (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario después de enviar el formulario
        header("Location: bienvenido.php");
        exit();
    } else {
        echo "Error al insertar en la base de datos: " . $conn->error;
    }
} else {
    echo "Error: No se ha recibido una solicitud POST.";
}

$conn->close();
?>
