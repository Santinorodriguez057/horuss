const cartItems = JSON.parse(sessionStorage.getItem("cart")) || [];
const cartContainer = document.getElementById("cart-items");
const cartTotal = document.getElementById("cart-total");

let total = 0;
cartContainer.innerHTML = "<h3>Productos:</h3>";
cartItems.forEach((item) => {
  const itemDiv = document.createElement("div");
  itemDiv.textContent = `${item.title} - Cantidad: ${item.quantity} - $${
    item.price * item.quantity
  }`;
  cartContainer.appendChild(itemDiv);
  total += item.price * item.quantity;
});

cartTotal.textContent = `Total: $${total}`;
// --- Detección de tipo de tarjeta y formateo ---
const InputTarjeta = document.getElementById("numtarjeta");
const cardCvvInput = document.getElementById("card-cvv");
const phoneInput = document.getElementById("phone");

// Crear indicador visual si no existe
let cardTypeEl = document.getElementById("tipotarjeta");
if (!cardTypeEl && InputTarjeta) {
  cardTypeEl = document.createElement("span");
  cardTypeEl.id = "tipotarjeta";
  cardTypeEl.className = "tipotarjeta";
  InputTarjeta.parentNode.insertBefore(cardTypeEl, InputTarjeta.nextSibling);
}

function detectCardType(number) {
  const n = number.replace(/\D/g, "");
  if (/^4/.test(n)) return "Visa";
  if (/^(5[1-5]|2(?:2[2-9]|[3-6]\d|7[01]|720))/.test(n)) return "Mastercard";
  if (/^3[47]/.test(n)) return "Amex";
  return "";
}

// Luhn (opcional pero recomendado)
function luhnCheck(cardNumber) {
  const digits = cardNumber
    .replace(/\D/g, "")
    .split("")
    .reverse()
    .map((d) => parseInt(d, 10));
  let sum = 0;
  for (let i = 0; i < digits.length; i++) {
    let val = digits[i];
    if (i % 2 === 1) {
      val *= 2;
      if (val > 9) val -= 9;
    }
    sum += val;
  }
  return sum % 10 === 0;
}

InputTarjeta &&
  InputTarjeta.addEventListener("input", () => {
    const rawDigits = InputTarjeta.value.replace(/\D/g, "").slice(0, 19);
    const type = detectCardType(rawDigits);
    if (cardTypeEl) {
      if (type === "Visa") {
        cardTypeEl.innerHTML = `<img src="imagenes/Visa.png" alt="Visa" class="logo-tarjeta">`;
      } else if (type === "Mastercard") {
        cardTypeEl.innerHTML = `<img src="imagenes/Mastercard.png" alt="Mastercard" class="logo-tarjeta">`;
      } else if (type === "Amex") {
        cardTypeEl.innerHTML = `<img src="imagenes/Amex.png" alt="Amex" class="logo-tarjeta">`;
      } else {
        cardTypeEl.innerHTML = "";
      }
    }
    if (cardCvvInput) cardCvvInput.maxLength = type === "Amex" ? 4 : 3;

    // formatear con espacios cada 4 dígitos
    const formatted = rawDigits.replace(/(\d{4})(?=\d)/g, "$1 ").trim();
    InputTarjeta.value = formatted;
  });

// evitar pegar texto no numérico
InputTarjeta &&
  InputTarjeta.addEventListener("paste", (e) => {
    const text = (e.clipboardData || window.clipboardData).getData("text");
    if (!/^[\d\s-]+$/.test(text)) e.preventDefault();
  });

// --- Validación del teléfono ---
// Normalizar: conservar '+' inicial si existe y eliminar otros caracteres
function normalizePhone(input) {
  if (!input) return "";
  const s = input.trim();
  const hasPlus = s.startsWith("+");
  const digits = s.replace(/\D/g, "");
  return (hasPlus ? "+" : "") + digits;
}

// Validar: entre 7 y 15 dígitos y preferir que no empiece en 0 (pedimos código de país)
function validatePhone(input) {
  if (!input) return false;
  const normalized = normalizePhone(input);
  const digits = normalized.replace(/\D/g, "");
  if (digits.length < 7 || digits.length > 15) return false;
  if (/^0/.test(digits)) return false; // opcional, evita números locales sin código
  return true;
}

// Crear un elemento de ayuda/alerta junto al input de teléfono si no existe
let phoneErrorEl = document.getElementById("phone-error");
if (!phoneErrorEl && phoneInput) {
  phoneErrorEl = document.createElement("span");
  phoneErrorEl.id = "phone-error";
  phoneErrorEl.className = "phone-error";
  phoneErrorEl.setAttribute("aria-live", "polite");
  phoneErrorEl.style.marginLeft = "8px";
  phoneErrorEl.style.fontSize = "0.9em";
  phoneInput.parentNode.insertBefore(phoneErrorEl, phoneInput.nextSibling);
}

// Feedback en vivo mientras escribe
phoneInput &&
  phoneInput.addEventListener("input", () => {
    const ok = validatePhone(phoneInput.value);
    if (!phoneErrorEl) return;
  });

// Normalizar al perder foco (no haga cambios agresivos)
phoneInput &&
  phoneInput.addEventListener("blur", () => {
    if (!phoneInput.value) return;
    const normalized = normalizePhone(phoneInput.value);
    if (normalized.startsWith("+")) {
      const m = normalized.match(/^\+(\d{1,3})(\d{4,})$/);
      if (m) phoneInput.value = `+${m[1]} ${m[2]}`;
      else phoneInput.value = normalized;
    } else {
      phoneInput.value = normalized;
    }
  });

// submit: validaciones básicas + Luhn
document
  .getElementById("checkout-form")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("name").value.trim();
    const address = document.getElementById("address").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const cardNumberRaw = document.getElementById("numtarjeta").value.trim();
    const cardExpiry = document.getElementById("exptarjeta").value.trim();
    const cardCvv = document.getElementById("card-cvv").value.trim();

    if (
      !name ||
      !address ||
      !email ||
      !phone ||
      !cardNumberRaw ||
      !cardExpiry ||
      !cardCvv
    ) {
      alert("Por favor completa todos los campos.");
      return;
    }

    const cardDigits = cardNumberRaw.replace(/\D/g, "");
    const cardType = detectCardType(cardDigits);

    // Validar teléfono en el submit
    if (!validatePhone(phone)) {
      alert(
        "Teléfono inválido. Verifica e incluye código de país, p. ej. +54 9 351 1234567"
      );
      if (phoneInput) phoneInput.focus();
      return;
    }

    if (!/^\d{13,19}$/.test(cardDigits) || !luhnCheck(cardDigits)) {
      alert("Número de tarjeta inválido.");
      return;
    }

    const m = cardExpiry.match(/^(0[1-9]|1[0-2])\/?([0-9]{2})$/);
    if (!m) {
      alert("Fecha de vencimiento inválida. Usa MM/AA.");
      return;
    }
    const month = parseInt(m[1], 10);
    const year = 2000 + parseInt(m[2], 10);
    const expDate = new Date(year, month, 0, 23, 59, 59);
    if (expDate < new Date()) {
      alert("La tarjeta está vencida.");
      return;
    }

    // Validar longitud del CVV según el tipo detectado
    if (cardType === "Amex") {
      if (!/^\d{4}$/.test(cardCvv)) {
        alert("El CVV de Amex debe tener 4 dígitos.");
        return;
      }
    } else {
      if (!/^\d{3}$/.test(cardCvv)) {
        alert("El CVV debe tener 3 dígitos.");
        return;
      }
    }

    alert("✅ Compra realizada con éxito. ¡Gracias por tu pedido!");
    sessionStorage.removeItem("cart");
    window.location.href = "Inicio.php";
  });
