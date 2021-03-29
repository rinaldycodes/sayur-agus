const el = (elem) => document.querySelector(elem);
const shipping = el("#location");
const subtotal = el("#subtotal");
const totalInput = el("#totalInput");
const totalText = el("#totalText");
const ongkirText = el("#ongkirText");
const ongkirInput = el("#ongkirInput");

function myShipping(obj) {
    var priceOngkir = obj.options[obj.selectedIndex].getAttribute("data-price");
    ongkirText.innerHTML =
        "Rp." + new Intl.NumberFormat("ID").format(priceOngkir);
    ongkirInput.value = parseFloat(priceOngkir);
    Total = parseFloat(subtotal.value) + parseFloat(priceOngkir);
    totalInput.value = parseFloat(subtotal.value) + parseFloat(priceOngkir);
    totalText.innerHTML = "Rp." + new Intl.NumberFormat("ID").format(Total);
}

// DETAIL PRODUCT
const min = el("#min");
const plus = el("#plus");
const qty = el("#qty");
const qtyContainer = el("#qtyContainer");
const btnAddToCart = el("#add-to-cart");
const messageQty = el("#messageQty");

if (qty.max == 0) {
    qtyContainer.style.display = "none";
    messageQty.innerHTML = "Stok tidak tersedia";
    btnAddToCart.disabled = true;
}

min.onclick = () => {
    if (qty.value == 1) {
        messageQty.innerHTML = "Minimal 1 item";
    } else {
        --qty.value;
    }
};

plus.onclick = () => {
    if (qty.value == qty.max) {
        messageQty.innerHTML = "Sudah mencapai maksimal stok!";
    } else {
        ++qty.value;
    }
};
