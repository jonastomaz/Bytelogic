document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.querySelector("form");

    if (!formulario) return;

    formulario.addEventListener("submit", function (e) {

        const email = document.getElementById("email");
        const senha = document.getElementById("password");

        if (email && email.value.trim() === "") {
            alert("Informe um e-mail.");
            e.preventDefault();
            return;
        }

        if (senha && senha.value.length < 6) {
            alert("A senha deve possuir pelo menos 6 caracteres.");
            e.preventDefault();
            return;
        }

    });

});