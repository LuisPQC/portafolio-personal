<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    
    // Valida que el email sea correcto
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    }

    // Datos del correo
    $to = "luisquispechoque4@gmail.com"; 
    $subject = "Nuevo mensaje de contacto";
    $body = "Has recibido un nuevo mensaje de contacto.\n\n".
            "Nombre: $nombre\n".
            "Correo: $email\n".
            "Mensaje:\n$mensaje\n";
    $headers = "From: $email";

    // Envía el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "El mensaje ha sido enviado con éxito.";
    } else {
        echo "Hubo un problema al enviar el mensaje. Intenta de nuevo.";
    }
} else {
    echo "Solicitud inválida.";
}

if (mail($to, $subject, $body, $headers)) {
    header("Location: gracias.html");
    exit;
} else {
    echo "Hubo un problema al enviar el mensaje.";
}

?>
