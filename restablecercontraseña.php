<?php
session_start();
include('conexion.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email_recuperacion'];
    $nueva_contrasena = trim($_POST['contrasena']);
    $confirmar_contrasena = trim($_POST['confirmar_contrasena']);

    // Validar que no esté vacío y coincidan
    if (empty($nueva_contrasena) || empty($confirmar_contrasena)) {
        echo "<script>alert('Debe completar ambos campos.'); window.history.back();</script>";
        exit;
    }

        // Validar longitud de la contraseña
    if (strlen($nueva_contrasena) < 8) {
        echo "<script>alert('La contraseña debe tener al menos 8 caracteres.'); window.history.back();</script>";
        exit;
    }

    if ($nueva_contrasena !== $confirmar_contrasena) {
        echo "<script>alert('Las contraseñas no coinciden.'); window.history.back();</script>";
        exit;
    }

    // Encriptar la nueva contraseña
    $hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

    // Actualizar en la base de datos
    $sql = "UPDATE registro SET contraseña = ? WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $hash, $email);

    if ($stmt->execute()) {
        // limpiar la sesión
        unset($_SESSION['email_recuperacion']);
        echo "<script>alert('Contraseña actualizada con éxito.'); window.location.href='inicio.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar la contraseña.'); window.history.back();</script>";
    }

    $stmt->close();
    $conexion->close();
}
?>