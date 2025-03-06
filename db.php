<?php
// db.php - Archivo para conectar a la base de datos

// Configura los datos de conexión a la base de datos
$host = 'localhost'; // Cambia esto si tu servidor de base de datos no está en localhost
$dbname = 'contacto_formulario'; // Reemplaza con el nombre de tu base de datos
$username = 'root'; // Reemplaza con tu usuario de la base de datos
$password = ''; // Reemplaza con tu contraseña de la base de datos

try {
    // Conectar a la base de datos utilizando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar el manejo de errores a través de excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Si hay algún error en la conexión, muestra un mensaje
    echo "Error de conexión: " . $e->getMessage();
    exit; // Detener la ejecución si no se puede conectar
}
?>
