<?php

    include("conexion_be.php");

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Encriptar la contraseña ingresada por el usuario
    $contrasenaEncriptada = hash('sha512', $contrasena);

    // Validación de inicio de sesión
    $query = "SELECT * FROM users WHERE email = '$correo' and passwd = '$contrasenaEncriptada'";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        // Error en la consulta
        echo "Error: " . mysqli_error($conexion);
        exit;
    }

    session_start();

    if (mysqli_num_rows($resultado) > 0) {
        // Después de registrar al usuario exitosamente
        $_SESSION['email'] = $correo; // Guardar el correo en la sesión
        setcookie('sesion_iniciada', 'true', time() + 3600, '/'); // Establecer la cookie por 1 hora
        header("location: ../Usuario.php");
        exit;
    } else {
        // Usuario no válido
        echo "<script>alert('Correo no registrado o contraseña incorrecta. Por favor, verifique los datos introducidos.');
            window.location= '../Iniciar.php'
            </script>";
    }

?>