<?php
session_start();

$codigo_ingresado = $_POST['codigo'];

if ($codigo_ingresado == $_SESSION['codigo_recuperacion']) {
    echo "<script>
        alert('Código verificado correctamente. Ahora podés cambiar tu contraseña.');
        window.location.href = 'restablecercontraseña.html';
    </script>";
} else {
    echo "<script>
        alert('Código incorrecto. Intentá nuevamente.');
        window.location.href = 'verificarcodigo.html';
    </script>";
}
?>