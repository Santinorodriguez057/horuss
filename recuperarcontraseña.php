<?php
require 'conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$email = trim($_POST['email']);

    if (empty($email)) {
                echo'<script>
            alert("Usted tiene que rellenar los campos");window.history.back();
            </script>';
        exit;
    }

// Consulta para verificar si ya existe
$sql = "SELECT * FROM registro WHERE email = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {

    //Generar código de 6 numeros aleatorios
    $codigo = rand(100000, 999999);

    // Guardar el código en sesión o en base de datos
    $_SESSION['codigo_recuperacion'] = $codigo;
    $_SESSION['email_recuperacion'] = $email;

    // Configurar PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'horusstreetwearar@gmail.com';         
        $mail->Password = 'mmtpvghxgjhgghki';    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('tu_correo@gmail.com', 'Recuperacion de contraseña');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Tu codigo de recuperacion';
        $mail->Body    = "
            <h2>Hola</h2>
            <p>Tu código de recuperación es:</p>
            <h1 style='color:#007bff;'>$codigo</h1>
            <p>Ingresalo en la página para continuar con el cambio de contraseña.</p>
        ";

        $mail->send();

        echo "<script>
            alert('Se envió un correo con tu código de recuperación.');
            window.location.href = 'verificarcodigo.html';
        </script>";

    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }

} else {
    echo "<script>
        alert('El correo no está registrado.');
window.history.back();
    </script>";
}

$stmt->close();
$conexion->close();
?>