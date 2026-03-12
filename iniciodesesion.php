<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $contrasena = $_POST['contrasena'];

    // 🔹 Validar campos vacíos 
    if (empty($email) || empty($contrasena)) {
        $_SESSION['mensaje'] = "Usted tiene que rellenar los campos.";
        header("Location: iniciodesesion.php");
        exit;
    }

    // Consulta segura
    $stmt = $conexion->prepare("SELECT id_registro, nombre, email, contraseña FROM registro WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_registro, $nombre, $email_db, $password_hash_db);
        $stmt->fetch();

        // Verificar contraseña
        if (password_verify($contrasena, $password_hash_db)) {

            // 🔹 Guardar datos en sesión
            $_SESSION["email"] = $email_db;
            $_SESSION['usuario_nombre'] = $nombre;

            echo'<script>
            alert("Usted se registro con exito");
            window.location.href="Inicio.php";
            </script>';
            exit;
        } else {
        echo '<script>
            alert("Contraseña incorrecta.");
            window.history.back();
        </script>';
            exit;
        }
    } else {
            echo '<script>
            alert("Usuario no encontrado.");
            window.history.back();
        </script>';
        exit;
    }

    $stmt->close();
    $conexion->close();
}
?>
