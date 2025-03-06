<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php'; // Asegúrate de tener el archivo db.php con la conexión a tu base de datos

// Validar y sanitizar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y recortar los datos de entrada
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Verificar que los campos no estén vacíos
    if (!empty($name) && !empty($email) && !empty($message)) {

        // Validar el correo electrónico
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "El correo electrónico no es válido.";
            exit;  // Detener la ejecución si el correo no es válido
        }

        // Opcional: Validar longitud del mensaje
        if (strlen($message) < 10) {
            echo "El mensaje es demasiado corto. Debe tener al menos 10 caracteres.";
            exit;  // Detener la ejecución si el mensaje es demasiado corto
        }

        // Preparar la consulta SQL para insertar los datos en la base de datos
        try {
            // SQL para insertar los datos en la tabla contacto_formulario
            $sql = "INSERT INTO contacto_formulario (name, email, message) 
                    VALUES (:name, :email, :message)";

            // Preparar la declaración
            $stmt = $conn->prepare($sql);

            // Vincular los parámetros
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            // Ejecutar la consulta
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error al guardar el mensaje en la base de datos: " . $e->getMessage();
            exit;  // Detener la ejecución si hay un error en la base de datos
        }

        // Datos del correo
        $to = "05alvaro12@gmail.com"; // Cambia esto por tu dirección de correo electrónico
        $subject = "Nuevo mensaje de contacto desde el sitio web";
        
        // Cuerpo del mensaje (en formato HTML)
        $body = "<html>
                    <head>
                        <title>Nuevo mensaje de contacto</title>
                    </head>
                    <body>
                        <p><strong>Nombre:</strong> $name</p>
                        <p><strong>Correo:</strong> $email</p>
                        <p><strong>Mensaje:</strong><br>$message</p>
                    </body>
                </html>";

        // Cabeceras para enviar el correo en formato HTML
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: $email" . "\r\n";  // El correo que envía el mensaje

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.";
        } else {
            echo "Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.";
        }

    } else {
        echo "Todos los campos son requeridos.";
    }
}
?>


