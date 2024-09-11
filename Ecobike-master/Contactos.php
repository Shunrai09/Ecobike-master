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
    <section class="container" style="text-align: center; padding-top: 30px;">
        <h1>CONTACTO</h1>
    </section>
    <section class="container ">
        <div class="row">
            <div class="col-md-4" style="margin-left: 200px;">
                <form>
                    <div class="form-group">
                        <label for="inputPassword">
                            <h4>Llamanos al:</h4>
                        </label>

                    </div>
                    <div class="form-group">
                        <label for="inputPassword"><i class="bi bi-telephone-forward-fill"></i> +51
                            958001748</label>

                    </div>
                    <div class="form-group">
                        <label for="inputEmail"><i class="bi bi-telephone-forward-fill"></i> +51 957842512</label>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail"><i class="bi bi-telephone-forward-fill"></i> +51 957451422</label>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <form>
                    <div>
                        <h4>RECIBE NUESTRAS NOVEDADES</h4>
                        <div>
                            <div class="form-group">
                                <label for="inputPassword">Ingrese su nombre</label>
                                <input class="form-control" id="inputPassword" placeholder="Ingrese su nombre">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Ingrese su correo electronico</label>
                                <input class="form-control" id="inputPassword"
                                    placeholder="Ingrese su correo electronico">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Que nos quieres comentar</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark">ENVIAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="container" style="padding-top: 40px;">
        <div class="iconoscentrados redes-container">
            <ul>
                <li><a href="https://www.facebook.com/profile.php?id=100094300673013&is_tour_dismissed=true" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a></li>
                <li><a href="https://instagram.com/ecobikes_fanpage?igshid=ZGUzMzM3NWJiOQ==" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a></li>
                <li><a href="https://www.tiktok.com/@ecobike.oficial?is_from_webapp=1&sender_device=pc" target="_blank" class="tiktok"><i class="bi bi-tiktok"></i></a></li>
                <li><a href="http://wa.me/51918681205" target="_blank" class="whatsapp"><i class="bi bi-whatsapp"></i></a></li>
            </ul>
        </div>
    </section>

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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>