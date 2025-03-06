<?php
// Validar y sanitizar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Verificar que los campos no estén vacíos
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Procesar el formulario (puedes enviar el correo, guardar en base de datos, etc.)
        // Aquí solo mostramos los datos recibidos como ejemplo.
        echo "Nombre: " . $name . "<br>";
        echo "Correo: " . $email . "<br>";
        echo "Mensaje: " . $message . "<br>";
    } else {
        echo "Todos los campos son requeridos.";
    }
}
?>
