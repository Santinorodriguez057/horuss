

// Subir arriba al hacer click en el logo del footer
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}

// Abrir/cerrar filtros 
document.querySelectorAll(".filtro-titulo").forEach((btn) => {
  btn.addEventListener("click", () => {
    const contenido = btn.nextElementSibling;
    contenido.style.display =
      contenido.style.display === "block" ? "none" : "block";
  });
});

// Lista de productos 
const productos = [
  { nombre: "Gorra rey azul", precio: 210, img: "imagenes/gorras/Gorra rey azul.png", categoria: "Accesorios", link: "/horus/modeloscomprar/producto1.html" },
  { nombre: "HorusXCALF", precio: 99, img: "imagenes/Remera/HorusXCALF.png", categoria: "Ropa", link: "/horus/modeloscomprar/producto4.html" },
  { nombre: "HorusEden", precio: 200, img: "imagenes/Remera/HorusEden.png", categoria: "Ropa", link: "/horus/modeloscomprar/producto9.html" },
  { nombre: "MalcomX", precio: 210, img: "imagenes/zapatillas/MalcomX.png", categoria: "Calzado", link: "/horus/modeloscomprar/producto10.html" },
  { nombre: "Horus Blood", precio: 300, img: "imagenes/zapatillas/Horus Blood.png", categoria: "Calzado", link: "/horus/modeloscomprar/producto12.html" },
  { nombre: "HoruxXCUHG", precio: 99, img: "imagenes/Remera/HoruxXCUHG.png", categoria: "Ropa", link: "/horus/modeloscomprar/producto5.html" },
  { nombre: "Gorra rey negra", precio: 210, img: "imagenes/gorras/Gorra rey negra.png", categoria: "Accesorios", link: "/horus/modeloscomprar/producto2.html" },
  { nombre: "LasPinoV6", precio: 150, img: "imagenes/zapatillas/LasPinoV6.png", categoria: "Calzado", link: "/horus/modeloscomprar/producto7.html" },
  { nombre: "vansxhorus", precio: 110, img: "imagenes/zapatillas/vansxhorus.png", categoria: "Calzado", link: "/horus/modeloscomprar/producto6.html" },
  { nombre: "Botineshorus", precio: 300, img: "imagenes/zapatillas/Botineshorus.png", categoria: "Calzado", link: "/horus/modeloscomprar/producto13.html" },
  { nombre: "Gorra rey blanca", precio: 120, img: "imagenes/gorras/Gorra rey blanca.png", categoria: "Accesorios", link: "/horus/modeloscomprar/producto3.html" },
  { nombre: "Horus RDT", precio: 210, img: "imagenes/zapatillas/Horus RDT.jpeg", categoria: "Calzado", link: "/horus/modeloscomprar/producto11.html" },
  { nombre: "HorusBullet", precio: 170, img: "imagenes/zapatillas/HorusBullet.png", categoria: "Calzado", link: "/horus/modeloscomprar/producto8.html" },
];


productos.forEach((p, i) => {
  if (!p.id) p.id = `prod${i}`;
});

const productosOriginales = [...productos];

let paginaActual = 1;
const porPagina = 8;

let favoritos = JSON.parse(localStorage.getItem("favoritos")) || [];
let mostrandoSoloFavoritos = false;


const verFavBtn = document.getElementById("ver-favoritos");
if (verFavBtn) {
  verFavBtn.addEventListener("click", () => {
    mostrandoSoloFavoritos = !mostrandoSoloFavoritos;
    verFavBtn.textContent = mostrandoSoloFavoritos ? "Mostrar todos" : "Ver favoritos";
    mostrarProductos(1);
  });
}

const btnFavoritos = document.getElementById("ver-favoritos");

btnFavoritos.addEventListener("click", () => {
  btnFavoritos.classList.toggle("activo");
});
// Filtros 
function obtenerFiltros() {
  const categorias = [];
  if (document.getElementById("filtro-calzado").checked) categorias.push("Calzado");
  if (document.getElementById("filtro-ropa").checked) categorias.push("Ropa");
  if (document.getElementById("filtro-accesorios").checked) categorias.push("Accesorios");

  const aplicarDescuento = document.getElementById("filtro-descuentos").checked;
  const textoBusqueda = document.getElementById("query").value.toLowerCase();

  let filtrados = productosOriginales;

  // Filtrar por categoría
  if (categorias.length > 0) {
    filtrados = filtrados.filter((p) => categorias.includes(p.categoria));
  }

  // Filtrar por descuentos
  if (aplicarDescuento) {
    filtrados = filtrados.filter((p) => p.precio < 200);
  }

  // Filtrar por el nombre o su categoria
  if (textoBusqueda.trim() !== "") {
    filtrados = filtrados.filter(
      (p) =>
        p.nombre.toLowerCase().includes(textoBusqueda) ||
        p.categoria.toLowerCase().includes(textoBusqueda)
    );
  }


  if (mostrandoSoloFavoritos) {
    filtrados = filtrados.filter((p) => favoritos.includes(p.id));
  }

  // Ordenar
  const orden = document.getElementById("ordenar").value;
  if (orden === "precio-asc") filtrados.sort((a, b) => a.precio - b.precio);
  if (orden === "precio-desc") filtrados.sort((a, b) => b.precio - a.precio);
  if (orden === "nombre-asc") filtrados.sort((a, b) => a.nombre.localeCompare(b.nombre));
  if (orden === "nombre-desc") filtrados.sort((a, b) => b.nombre.localeCompare(a.nombre));

  return filtrados;
}

// Mostrar productos
function mostrarProductos(pagina) {
  const contenedor = document.getElementById("productos");
  contenedor.innerHTML = "";

  const productosFiltrados = obtenerFiltros();
  const inicio = (pagina - 1) * porPagina;
  const fin = inicio + porPagina;
  const productosPagina = productosFiltrados.slice(inicio, fin);

  productosPagina.forEach((prod) => {
    const esFav = favoritos.includes(prod.id);
    const card = document.createElement("div");
    card.classList.add("card");
    card.innerHTML = `
      <div class="heart-container">
        <label class="container">
          <input type="checkbox" class="fav-toggle" data-id="${prod.id}" ${esFav ? "checked" : ""} />
          <div class="checkmark">
            <svg viewBox="0 0 256 256">
              <rect fill="none" height="256" width="256"></rect>
              <path
                d="M224.6,51.9a59.5,59.5,0,0,0-43-19.9,60.5,60.5,0,0,0-44,17.6L128,59.1l-7.5-7.4C97.2,28.3,59.2,26.3,35.9,47.4a59.9,59.9,0,0,0-2.3,87l83.1,83.1a15.9,15.9,0,0,0,22.6,0l81-81C243.7,113.2,245.6,75.2,224.6,51.9Z"
                stroke-width="20px"
                stroke="#000"
                fill="none"
              ></path>
            </svg>
          </div>
        </label>
      </div>

      <a href="${prod.link}" class="card-link">
        <img src="${prod.img}" alt="${prod.nombre}">
        <h4>${prod.nombre}</h4>
        <p class="price">$${prod.precio}</p>
      </a>
    `;
    contenedor.appendChild(card);


    const toggle = card.querySelector(".fav-toggle");
    toggle.addEventListener("change", (e) => {
      const id = e.target.dataset.id;
      if (e.target.checked) {

        if (!favoritos.includes(id)) favoritos.push(id);
      } else {

        const pos = favoritos.indexOf(id);
        if (pos !== -1) favoritos.splice(pos, 1);
      }
      localStorage.setItem("favoritos", JSON.stringify(favoritos));
    });
  });

  paginaActual = pagina;
}

// Paginación
function cambiarPagina(num) {
  mostrarProductos(num);
  window.scrollTo({ top: 0, behavior: "smooth" });
}


document.getElementById("filtro-descuentos").addEventListener("change", () => mostrarProductos(1));
document.getElementById("filtro-calzado").addEventListener("change", () => mostrarProductos(1));
document.getElementById("filtro-ropa").addEventListener("change", () => mostrarProductos(1));
document.getElementById("filtro-accesorios").addEventListener("change", () => mostrarProductos(1));
document.getElementById("ordenar").addEventListener("change", () => mostrarProductos(1));
document.getElementById("query").addEventListener("input", () => mostrarProductos(1));

// Mostrar/Ocultar filtros 
const sidebar = document.querySelector(".sidebar-filtros");
const toggleBtn = document.getElementById("toggle-filtros");
const layout = document.querySelector(".layout");

toggleBtn.addEventListener("click", () => {
  sidebar.classList.toggle("oculto");
  layout.classList.toggle("expandir");
  toggleBtn.textContent = sidebar.classList.contains("oculto") ? "Mostrar filtros" : "Ocultar filtros";
});

// Mostrar productos al inicio
mostrarProductos(paginaActual);
