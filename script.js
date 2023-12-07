document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("myform").addEventListener("submit", function (event) {
        event.preventDefault();
        alert("Adicionado ao carrinho com sucesso!");
    });
});