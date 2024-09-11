document.getElementById("btn-cerrar-sesion").addEventListener("click", function() {
    // Hacer una petición al archivo logout_usuario.php para cerrar la sesión
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/logout_usuario.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Redirigir a la página de inicio de sesión
        window.location.href = "Login.php";
      }
    };
    xhr.send();
  });
  