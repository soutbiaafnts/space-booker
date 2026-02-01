document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form');

    form.addEventListener("submit", function (event) {
        const password = document.getElementById("password").value;
        const passwordRep = document.getElementById("password_rep").value;

        if (password !== passwordRep) {
            event.preventDefault();
            alert("As senhas não coincidem!");
        }
    });
});