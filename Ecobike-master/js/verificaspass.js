// Agregar eventos input a los campos de contraseña
document.getElementById("passwd").addEventListener("input", checkpass);
document.getElementById("passwd2").addEventListener("input", checkpass);

function checkpass() {
    let pass = document.getElementById("passwd").value;
    let pass2 = document.getElementById("passwd2").value;
    let btnRegistrarse = document.getElementById("btn-registrarse");
    let message = document.getElementById("message");

    if (pass.length !== 0) {
        if (pass !== pass2) {
            message.innerHTML = "Las Contraseñas no coinciden";
            message.style.color = "white";
            message.style.fontWeight = "bold";
            message.style.backgroundColor = "red";
            btnRegistrarse.disabled = true; // Desactivar el botón
        } else {
            message.innerHTML = "";
            btnRegistrarse.disabled = false; // Activar el botón
        }
    } else {
        message.innerHTML = "";
        btnRegistrarse.disabled = true; // Desactivar el botón
    }
}
