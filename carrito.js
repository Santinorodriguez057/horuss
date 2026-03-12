function displayCart() {
  const cart = JSON.parse(sessionStorage.getItem("cart")) || [];

  const cartItemsContainer = document.querySelector(".cart-items");
  const subtotalEl = document.querySelector(".subtotal");
  const grandTotalEl = document.querySelector(".grand-total");

  cartItemsContainer.innerHTML = "";

  if (cart.length === 0) {
    cartItemsContainer.innerHTML =
      "<p class=p_carrito>El carrito está vacío</p>";
    subtotalEl.textContent = "$0";
    grandTotalEl.textContent = "$0";
    return;
  }

  let subtotal = 0;

  cart.forEach((item, index) => {
    const itemTotal = item.price * item.quantity;
    subtotal += itemTotal;

    const cartItem = document.createElement("div");
    cartItem.classList.add("cart-item");
    cartItem.innerHTML = `
      <div class="product">
        <img src="${item.img}">
        <div class="item-detail">
          <p>${item.title}</p>
          <div class="size-box"><span class="size">${
            item.size || ""
          }</span></div>
        </div>
      </div>
      <span class="precio">$${item.price}</span>
      <div class="quantity"><input type="number" value="${
        item.quantity
      }" min="1" data-index="${index}"></div>
      <span class="total-price">$${itemTotal}</span>
      <button class="remove" data-index="${index}">X</button>
    `;
    cartItemsContainer.appendChild(cartItem);
  });

  subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
  grandTotalEl.textContent = `$${subtotal.toFixed(2)}`;

  // Eventos dinámicos
  document.querySelectorAll(".remove").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const i = e.target.dataset.index;
      cart.splice(i, 1);
      sessionStorage.setItem("cart", JSON.stringify(cart));
      displayCart();
    });
  });

  document.querySelectorAll(".quantity input").forEach((input) => {
    input.addEventListener("change", (e) => {
      const i = e.target.dataset.index;
      cart[i].quantity = parseInt(e.target.value);
      sessionStorage.setItem("cart", JSON.stringify(cart));
      displayCart();
    });
    document.getElementById("checkoutBtn").addEventListener("click", () => {
      window.location.href = "Checkout.html";
    });
  });
}

displayCart();
