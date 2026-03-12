<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi perfil</title>
    <link rel="stylesheet" href="estilo.css" />
  </head>
  <header class="header_mp">
    <a href="Inicio.php"
      ><img src="imagenes/horuslogo.png" alt="Logo Horus" class="logo_mp"
    /></a>

  </header>
  <body class="body_miperfil">
    <div class="Titulo_mp">
      <h2>MI PERFIL</h2>
    </div>
    <div class="Cuadrado_mp">
      <div class="Contenedor_mp">
        <div class="info">
          <p class="p_MP">Nombre: (<?= htmlspecialchars($_SESSION['usuario_nombre']) ?>)</p>
          <p class="p_MP">Correo electronico: (<?= htmlspecialchars($_SESSION['email']) ?>)</p>
        </div>
      </div>
    </div>

    <div class="Cuadrado_mp3">
      <div class="Contenedor_mp3">
        <div class="info3">
          <p class="p_MP">Historial de pedidos</p>
        </div>
        <div class="Cuadradito_mp2"></div>
      </div>
    </div>
<div class="boton-cerrar">
  <a href="cerrarsesion.php" class="btn-MP">Cerrar sesión</a>
</div>
  </body>
</html>
