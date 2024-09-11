<?php
session_start();

// Eliminar la sesión y la cookie
session_destroy();
setcookie('sesion_iniciada', '', time() - 3600, '/');

// Redirigir a la página de inicio de sesión
header("location: Iniciar.php");
exit;
?>
