<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Horus</title>
  <link rel="stylesheet" href="estilo.css" />
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Orbitron:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="imagenes/horuslogo.png" sizes="100x100" type="image/png">
  <script src="Inicio.js" defer></script>
</head>

  <header class="contenedor">
    <nav>
      <ul>
        <li><a href="Inicio.html">Inicio</a></li>
        <li><a href="Modelos.html">Modelos</a></li>
      </ul>

        <!--Carrito-->
        <button class="btn-cart">
         <a href="Carrito.html"> <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
            <path transform="translate(-3.62 -0.85)" d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
          </svg>
          </a>
        </button>
      <img src="imagenes/horuslogo.png" class="logo" />
  <!-- Verificación de sesión -->
  <?php if (isset($_SESSION['email'])): ?>
      <a href="miperfil.php" class="btn-login">
        Mi perfil 
      </a>
  <?php else: ?>
      <a href="InicioDeSesion.html" class="btn-login">Iniciar sesión</a>
  <?php endif; ?>
      </div>
      </div>
    </nav>

    
    <div class="slider-box">
      <div class="degradado"></div>
      <ul>
        <li><img src="imagenes/carrusel/jordan.jpg" alt="Imagen 1" /></li>
        <li><img src="imagenes/carrusel/RN9.jpg" alt="Imagen 2" /></li>
        <li><img src="imagenes/carrusel/travis.jpg" alt="Imagen 3" /></li>
        <li><img src="imagenes/carrusel/blazer.png" alt="Imagen 4" /></li>
        
      </ul>
    </div>

    <div class="contenedor-text">
  
      <p class="maquina-escribir subtitulo">
        It's not just a pair of sneakers, it's a statement.
      </p>
    </div>
  </header>
<body class="body_inicio">
  
  <h1 class="productosh1">Productos</h1>
  <div class="track">
    <div class="catalogo">
      <div class="producto">
       <a href="Modeloscomprar/producto10.html"><img src="imagenes/zapatillas/MalcomX.png" alt="MalcolmX" /></a>
        <div class="precio"><del style="color: red;">$240</del> $110 </div>
        <div class="nombre">MalcolmX</div>
        <div class="categoria">En honor al jefe.</div>
      </div>

      <div class="producto">
        <a href="Modeloscomprar/producto6.html"><img src="imagenes/zapatillas/vansxhorus.png" alt="vansxhorus" /></a>
        <div class="precio"><del style="color: red;">$240</del>  $110</div>
        <div class="nombre">Vans X HORUS</div>
        <div class="categoria">If you don’t like this, you’re an id#ot!</div>
      </div>

      <div class="producto">
        <a href="Modeloscomprar/producto13.html"><img src="imagenes/zapatillas/Botineshorus.png" alt="Botineshorus" /></a>
        <div class="precio">$300</div>
        <div class="nombre">Nike Mercurial HORUS</div>
        <div class="categoria">Ahora, en futbol tambien.</div>
      </div>

      <div class="producto">
        <a href="Modeloscomprar/producto7.html"><img src="imagenes/zapatillas/LasPinoV6.png" alt="LasPinoV6" /></a>
        <div class="precio"><del style="color: red;">$300</del>  $150</div>
        <div class="nombre">LasPinoV6</div>
        <div class="categoria">Habemus papam</div>
      </div>

      <div class="producto">
       <a href="Modeloscomprar/producto4.html"><img src="imagenes/Remera/HorusXCALF.png" alt="HorusXCALF" /></a>
        <div class="precio"><del style="color: red;">$210</del>  $99</div>
        <div class="nombre">HorusXCALF</div>
        <div class="categoria">Elegancia dorada.</div>
      </div>

      <div class="producto">
        <a href="Modeloscomprar/producto5.html"><img src="imagenes/Remera/HoruxXCUHG.png" alt="HorusXCUHG" /></a>
        <div class="precio"><del style="color: red;">$210</del>  $99</div>
        <div class="nombre">HorusXCUHG</div>
        <div class="categoria">Pasión que arde.</div>
      </div>

      <div class="producto">
       <a href="Modeloscomprar/producto11.html"> <img src="imagenes/zapatillas/Horus RDT.jpeg" alt="Horus RDT" /></a>
        <div class="precio">$210</div>
        <div class="nombre">Horus RDT</div>
        <div class="categoria">Rodríguez, Doño, Tulian. Si sabes, sabes.</div>
      </div>

      <div class="producto">
        <a href="Modeloscomprar/producto3.html"><img src="imagenes/gorras/Gorra rey blanca.png" alt="Gorra rey blanca" /></a>
        <div class="precio"><del style="color: red;">$210</del>  $120</div>
        <div class="nombre">Horus REY blanca</div>
        <div class="categoria">Al rey que no pidió corona, pero se la ganó con respeto.</div>
      </div>

      <div class="producto">
        <a href="Modeloscomprar/producto1.html"><img src="imagenes/gorras/Gorra rey azul.png" alt="Gorra rey azul" /></a>
        <div class="precio">$210</div>
        <div class="nombre">Horus REY azul</div>
        <div class="categoria">Al rey que no pidió corona, pero se la ganó con respeto.</div>
      </div>

      <div class="producto">
        <a href="Modeloscomprar/producto2.html"><img src="imagenes/gorras/Gorra rey negra.png" alt="Gorra rey negra" /></a>
        <div class="precio">$210</div>
        <div class="nombre">Horus REY negra</div>
        <div class="categoria">Al rey que no pidió corona, pero se la ganó con respeto..</div>
      </div>

      <div class="producto">
        <a href="Modeloscomprar/producto12.html"><img src="imagenes/zapatillas/Horus Blood.png" alt="Horus Blood" /></a>
        <div class="precio">$300</div>
        <div class="nombre">Horus Blo#d</div>
        <div class="categoria">Rojo que habla por vos.</div>
      </div>

      <div class="producto">
       <a href="Modeloscomprar/producto8.html"> <img src="imagenes/zapatillas/HorusBullet.png" alt="HorusBullet." /></a>
        <div class="precio"><del style="color: red;">$280</del>  $170</div>
        <div class="nombre">HorusBullet</div>
        <div class="categoria">Dispara tu energía...</div>
      </div>

      <div class="producto">
       <a href="Modeloscomprar/producto9.html"> <img src="imagenes/Remera/HorusEden.png" alt="HorusEden" /></a>
        <div class="precio">$200</div>
        <div class="nombre">HorusEden</div>
        <div class="categoria">La elegancia y el misterio del Edén en tu remera.</div>
      </div>

    </div>
  </div>

<div class="titulo-con-contador">
  <h1 class="productosh1">Descuentos Semanales</h1>
  <div id="contador"></div>
</div>
<div class="track">
  <div class="catalogo">

    <div class="producto">
       <a href="Modeloscomprar/producto10.html"><img src="imagenes/zapatillas/MalcomX.png" alt="MalcolmX" /></a>
      <div class="precio"><del style="color: red;">$240</del> $110</div>
      <div class="nombre">Vans X HORUS</div>
      <div class="categoria">If you don’t like this, you’re an id#ot!</div>
    </div>

    <div class="producto">
      <a href="Modeloscomprar/producto7.html"><img src="imagenes/zapatillas/LasPinoV6.png" alt="LasPinoV6" /></a>
      <div class="precio"><del style="color: red;">$300</del> $150</div>
      <div class="nombre">LasPinoV6</div>
      <div class="categoria">Habemus papam</div>
    </div>

    <div class="producto">
      <a href="Modeloscomprar/producto4.html"><img src="imagenes/Remera/HorusXCALF.png" alt="HorusXCALF" /></a>
      <div class="precio"><del style="color: red;">$210</del> $99</div>
      <div class="nombre">HorusXCALF</div>
      <div class="categoria">Elegancia dorada.</div>
    </div>

    <div class="producto">
      <a href="Modeloscomprar/producto5.html"><img src="imagenes/Remera/HoruxXCUHG.png" alt="HorusXCUHG" /></a>
      <div class="precio"><del style="color: red;">$210</del> $99</div>
      <div class="nombre">HorusXCUHG</div>
      <div class="categoria">Pasión que arde.</div>
    </div>

     <div class="producto">
        <a href="Modeloscomprar/producto8.html"> <img src="imagenes/zapatillas/HorusBullet.png" alt="HorusBullet." /></a>
        <div class="precio"><del style="color: red;">$280</del>  $170</div>
        <div class="nombre">HorusBullet</div>
        <div class="categoria">Dispara tu energía...</div>
    </div>

       <div class="producto">
        <a href="Modeloscomprar/producto3.html"><img src="imagenes/gorras/Gorra rey blanca.png" alt="Gorra rey blanca" /></a>
        <div class="precio"><del style="color: red;">$210</del>  $120</div>
        <div class="nombre">Horus REY blanca</div>
        <div class="categoria">Al rey que no pidió corona, pero se la ganó con respeto.</div>
      </div>

  </div>
</div>

  

  <h1 class="productosh1">Conocenos</h1>
  <div class="carrusel">
    <button class="flecha izquierda">&lt;</button>
    <div class="contenedor-cartas">
      <div class="carta" id="carta1">
        <img class="icono" src="imagenes/gif/1.gif" alt="" />
        <h3>Nuestra misión</h3>
        <p>
          Nos esforzamos por ofrecer soluciones innovadoras y efectivas para
          satisfacer las necesidades de nuestros clientes.
        </p>
      </div>
      <div class="carta" id="carta2">
        <img class="icono" src="imagenes/gif/3.gif" alt="" />
        <h3>Las personas primero, siempre</h3>
        <p>
          Detrás de cada logro hay un equipo que suma, que confía y que
          comparte una visión.
        </p>
      </div>
      <div class="carta" id="carta3">
        <img class="icono" src="imagenes/gif/4.gif" alt="" />
        <h3>Calidad sin atajos</h3>
        <p>
          Honestidad, transparencia y respeto. No vendemos humo ni falsas
          promesas.
        </p>
      </div>
      <div class="carta" id="carta4">
        <img class="icono" src="imagenes/gif/2.gif" alt="" />
        <h3>Crecemos con cada desafío</h3>
        <p>
          Cada reto nos enseñó, cada caída nos hizo más fuertes y cada éxito
          reafirmó nuestro propósito.
        </p>
      </div>
    </div>
    <button class="flecha derecha">&gt;</button>

   
  </div>
</body>

<footer class="footer">
    <div class="footer_contenedor">
      <!-- Título y redes -->
      <div class="footer_izquierda">
        <h2 class="footer_titulo">Horus</h2>
        <div class="footer_redes">
          <span>Seguinos</span>
          <a href="#" aria-label="TikTok"
            ><i class="fa-brands fa-tiktok"></i
          ></a>
          <a href="#" aria-label="YouTube"
            ><i class="fa-brands fa-youtube"></i
          ></a>
          <a href="#" aria-label="Instagram"
            ><i class="fa-brands fa-instagram"></i
          ></a>
          <a href="#" aria-label="Twitter/X"
            ><i class="fa-brands fa-twitter"></i
          ></a>
        </div>
      </div>

      <img
        src="/imagenes/horuslogo.png"
        alt="Logo Horus"
        class="footer_logo_central"
        onclick="scrollToTop()"
      />

      <!-- Información -->
      <div class="footer_links">
        <h4>Información</h4>
        <ul>
          <li class="li_info"><a href="Garantias.html">Garantías</a></li>
          <li class="li_info"><a href="ComoComprar.html">Cómo comprar</a></li>
          <li class="li_info"><a href="TerminosCond.html">Términos y condiciones</a></li>
        </ul>
      </div>

      <!-- Nosotros -->
      <div class="footer_nosotros">
        <h4>Nosotros</h4>
        <address>
          Chacabuco 480, X5172<br />
          La Falda, Córdoba
        </address>
        <p>+54 3548 43‑3410</p>
        <p>Horusarg@gmail.com</p>
      </div>

      <!-- Medios de pago -->
      <div class="footer_Mpago">
        <img src="/imagenes/descarga (1).png" alt="Medios de pago" />
      </div>
    </div>

    <script>
      function scrollToTop() {
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });
      }
    </script>
  </footer>


</html>