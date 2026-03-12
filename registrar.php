//<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $fecha = $_POST['fecha_de_nacimiento'];
    $contrasena = $_POST['contrasena'];
    $rep_contrasena = $_POST['rep_contrasena'];

    // Validar campos vacíos
    if (empty($nombre) || empty($apellido) || empty($email) || empty($fecha) || empty($contrasena)) {
                echo'<script>
            alert("Usted tiene que rellenar los campos");window.history.back();
            </script>';
        exit;
    }

    // Validar que la fecha de nacimiento sea válida
    $fecha_actual = date("Y-m-d");

    if ($fecha > $fecha_actual) {
        echo '<script>
            alert("La fecha de nacimiento no puede ser posterior a la fecha actual.");
            window.history.back();
        </script>';
        exit;
    }

    //Validar edad mínima de 13 años
    $edad_minima = 13;
    $fecha_minima = date("Y-m-d", strtotime("-$edad_minima years"));
    if ($fecha > $fecha_minima) {
        echo "<script>
            alert('Debe tener al menos $edad_minima años para registrarse.');
            window.history.back();
        </script>";
        exit;
    }
    


    // Validar longitud de la contraseña
        if (strlen($contrasena) < 8) {
        echo '<script>
            alert("La contraseña debe tener al menos 8 caracteres.");
            window.history.back();
        </script>';
        exit;
    }
    
    // Validar contraseñas
    if ($contrasena !== $rep_contrasena) {
     echo'<script>
            alert("Las contraseñas no coinciden.");window.history.back();
            </script>';
        exit;
    }

    //Validar si el correo ya está registrado
    $verificar_email = $conexion->query("SELECT * FROM registro WHERE email = '$email'");
    if ($verificar_email->num_rows > 0) {
        echo '<script>
            alert("El correo ya está registrado. Intente con otro.");
            window.history.back();
        </script>';
        exit;
    }

    // Encriptar contraseña
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar en la tabla
    $sql = "INSERT INTO registro (nombre, apellido, email, fecha_de_nacimiento, contraseña)
            VALUES ('$nombre', '$apellido', '$email', '$fecha', '$hash')";

    if ($conexion->query($sql) === TRUE) {
        echo'<script>
            alert("Usted se registro con exito");
            window.location.href="iniciodesesion.html";
            </script>';
    } else {
        echo "Error: " . $conexion->error;
    }
}

$conexion->close();
?>
