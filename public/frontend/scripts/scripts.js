const plz = (elem) => document.querySelector(elem);
const shipping = plz("#location");
const subtotal = plz("#subtotal");
const totalInput = plz("#totalInput");
const totalText = plz("#totalText");
const ongkirText = plz("#ongkirText");
const ongkirInput = plz("#ongkirInput");

function myShipping(obj) {
    var priceOngkir = obj.options[obj.selectedIndex].getAttribute("data-price");
    ongkirText.innerHTML =
        "Rp." + new Intl.NumberFormat("ID").format(priceOngkir);
    ongkirInput.value = parseFloat(priceOngkir);
    Total = parseFloat(subtotal.value) + parseFloat(priceOngkir);
    totalInput.value = parseFloat(subtotal.value) + parseFloat(priceOngkir);
    totalText.innerHTML = "Rp." + new Intl.NumberFormat("ID").format(Total);
}
