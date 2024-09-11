<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Ecobike</title>
</head>

<body>

    <?php
        session_start();

        if (!isset($_COOKIE['sesion_iniciada']) || $_COOKIE['sesion_iniciada'] !== 'true') {
            // Redirigir a la página de inicio de sesión si la sesión no está iniciada
            header("location: Iniciar.php");
            exit;
        }

        // Obtener el correo electrónico del usuario de la sesión
        $correo = $_SESSION['email'];

        // Realizar la consulta a la base de datos para obtener el nombre del usuario
        include("php/conexion_be.php"); // Incluir archivo de conexión a la base de datos

        $query = "SELECT * FROM users WHERE email = '$correo'";
        $resultado = mysqli_query($conexion, $query);
        // Verificar si se encontró el usuario en la base de datos
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $imagen_base64 = $row['imagen'];
            $email = $row['email'];
            $numero = $row['numero'];
        } else {
            // No se encontró el usuario en la base de datos
            // Redirigir a la página de inicio de sesión
            header("location: Iniciar.php");
            exit;
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    ?>
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <div class="col-md-4 Logo">
                <a href="Ecobike.php"><img src="img/Logoecobike2.png" width="350px" alt=""></a>
            </div>
            <div class="col-md-6 Info ">
                    <ul class="lista">
                        <a class="navbar-brand link" href="Ecobike.php">Inicio</a>
                        <a class="navbar-brand link" href="Blog.php">Blog</a>
                        <a class="navbar-brand link" href="Tienda.php">Tienda Online</a>
                        <a class="navbar-brand link" href="Contactos.php">Contactos</a>
                        <a class="navbar-brand link" href="Nosotros.php">Nosotros</a>
                    </ul>
                </div>
            <div class="col-md-1">
                <a class="navbar-brand" href="Carrito.php"><img src="img/Carrito de compras.webp" width="60px" alt=""></a>
            </div>
            <div class="col-md-1">
                    <?php
                        include("php/conexion_be.php");
                        if (isset($_COOKIE['sesion_iniciada']) && $_COOKIE['sesion_iniciada'] === 'true' && isset($_SESSION['email'])) {
                            // Si la sesión está iniciada y la clave 'email' está definida en $_SESSION, mostrar la imagen de perfil
                            $correo = $_SESSION['email'];
                            $query = "SELECT imagen FROM users WHERE email = '$correo'";
                            $resultado = mysqli_query($conexion, $query);
                            
                            if (mysqli_num_rows($resultado) > 0) {
                                $row = mysqli_fetch_assoc($resultado);
                                $imagen_base64 = $row['imagen'];
                                $imagen_data = base64_decode($imagen_base64);
                                $imagen_mime = finfo_buffer(finfo_open(), $imagen_data, FILEINFO_MIME_TYPE);
                                echo '<a class="navbar-brand" href="Usuario.php"><img src="data:' . $imagen_mime . ';base64,' . $imagen_base64 . '" alt="Imagen" class="img-fluid rounded-circle" style="width: 60px; height: 60px;"></a>';
                            } else {
                                // No se encontró la imagen de perfil
                                echo '<a class="navbar-brand" href="Usuario.php"><button type="button" class="btn btn-outline-dark">Iniciar</button></a>';
                            }
                        } else {
                            // Si la sesión no está iniciada o la clave 'email' no está definida en $_SESSION, redirigir a Iniciar.php
                            echo '<a class="navbar-brand" href="Iniciar.php"><button type="button" class="btn btn-outline-dark">Iniciar</button></a>';
                        }
                    ?>

                </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
        <div class="text-center">
            <h1 style="font-weight: bold; margin-block: 30px;">
                Mi Perfil
            </h1>
        </div>
        <div class="text-center">
            <?php
            $imagen_base64 = $row['imagen'];
            $imagen_data = base64_decode($imagen_base64);
            $imagen_mime = finfo_buffer(finfo_open(), $imagen_data, FILEINFO_MIME_TYPE);
            echo '<img src="data:' . $imagen_mime . ';base64,' . $imagen_base64 . '" alt="Imagen" class="img-fluid" style="border-radius: 100%; width: 400px; margin-block: 20px;">';
            ?>
        </div>

            <div class="text-center" style="margin-top: 50px; margin-bottom: 30px;">
                <h3 style="font-weight: bold;"> MI Informacion Personal</h3>
            </div>
            <div>
                <div class="text-align" style="margin-left: 100px;">
                    <div class="row">
                        <form class="row g-3">
                            <div class="col-md-4">
                                <label for="inputEmail4" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" placeholder="Juan David" value="<?php echo $nombre; ?>">
                            </div>

                            <div class="col-md-4">
                                <label for="inputPassword4" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" placeholder="Perez" value="<?php echo $apellido; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail4" class="form-label">Apellido Materno</label>
                                <input type="email" class="form-control" placeholder="Matinez" value="<?php echo $apellido; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="inputEmail4"
                                    placeholder="sasdsasadas@dasd" value="<?php echo $email; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Numero</label>
                                <input type="datetime" class="form-control" placeholder="958147789" value="<?php echo $numero; ?>">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Dirrecion</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                    placeholder="Av los loros n°2134">
                            </div>
                            <div class="col-md-5">
                                <label for="inputCity" class="form-label">Ciudad</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="Trujillo">
                            </div>
                            <div class="col-md-5">
                                <label for="inputState" class="form-label">Departamento</label>
                                <select id="inputState" class="form-select">
                                    <option>Amazonas</option>
                                    <option>Áncash</option>
                                    <option>Apurimac.</option>
                                    <option>Arequipa</option>
                                    <option>Arequipa</option>
                                    <option>Ayacucho</option>
                                    <option>Cajamarca</option>
                                    <option>Callao</option>
                                    <option>Cusco</option>
                                    <option>Huancavelica</option>
                                    <option>Huánuco</option>
                                    <option>Ica</option>
                                    <option>Junín</option>
                                    <option>La Libertad</option>
                                    <option>Lima</option>
                                    <option>Loreto</option>
                                    <option>Madre De Dios</option>
                                    <option>Moquegua</option>
                                    <option>Pasco</option>
                                    <option>Piura</option>
                                    <option>Puno</option>
                                    <option>San Martín</option>
                                    <option>Tacna</option>
                                    <option>Tumbes</option>
                                    <option>Ucayaly</option>
                                </select>
                            </div>
                            <div class="col-md-2 text-align">
                                <label for="inputZip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                            <div class="col-12">
                            </div>
                            <div class="col-12 text-end">
                                <div>
                                    <button type="submit" class="btn"
                                        style="margin-bottom: 5px; width: 150px;  background-color: rgb(148, 194, 64); color: aliceblue; ">Guardar</button>
                                </div>
                                <div>
                                    <a href=""><button type="submit" class="btn btn-danger" id="btn-cerrar-sesion" style="width: 150px; margin-bottom: 30px;">Cerrar Sesion</button></a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

            <div class="">


            </div>
        </div>
    </div>


    <footer>
        <div class="container" style="background-color: rgb(148, 194, 64);">
            <div class="row">
                <div class="col-md-4">
                    <h4>Productos</h4>
                    <a href="Bicicletas.php" class="link-unstyled"><div>Bicicletas</div></a>
                    <a href="Monopatines.php" class="link-unstyled"><div>Monopatines</div></a>
                    <a href="Contacto.php" class="link-unstyled"><div>Contacto</div></a>
                    <div>Garantia</div>
                </div>
                <div class="col-md-4">
                    <h4>Sobre ecobike</h4>
                    <div>Políticas de Privacidad</div>
                    <a href="Blog.php" class="link-unstyled"><div>Blog</div></a>
                    <a href="Nosotros.php" class="link-unstyled"><div>Nosotros</div></a>
                    <a href="Contacto.php" class="link-unstyled"><div>Contacto</div></a>
                </div>
                <div class="col-md-4 redes-sociales">
                    <div>
                        <h4>Siguenos</h4>
                        <div>
                            <a href="https://www.facebook.com/profile.php?id=100094300673013&is_tour_dismissed=true" target="_blank"><img src="img/facebook.png" width="51px" alt=""></a>
                            <a href="https://instagram.com/ecobikes_fanpage?igshid=ZGUzMzM3NWJiOQ==" target="_blank"><img src="img/instagram.png" width="50px" alt=""></a>
                            <a href="https://www.tiktok.com/@ecobike.oficial?is_from_webapp=1&sender_device=pc" target="_blank"><img src="img/tiktok.png" width="50px" alt=""></a>
                            <a href="http://wa.me/51918681205" target="_blank"><img src="img/whatsapp.png" width="50px" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
        <script>
            document.getElementById("btn-cerrar-sesion").addEventListener("click", function() {
            // Hacer una petición al archivo logout_usuario.php para cerrar la sesión
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "logout_usuario.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                // Redirigir a la página de inicio de sesión
                window.location.href = "Iniciar.php";

                }
            };
            xhr.send();
            });
        </script>
</body>

</html>