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
    <body>
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

        <section class="container">
            <h1 class="titulotienda" style="text-align: center;">Tienda Online</h1>
            <Nav>
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item subnavbar">
                        <a class="nav-link" aria-current="page" href="Bicicletas.php" style="color: aliceblue;">Bicicletas</a>
                    </li>
                    <li class="nav-item subnavbar">
                        <a class="nav-link" href="Monopatines.php" style="color: aliceblue;">Monopatines</a>
                    </li>
                    <li class="nav-item subnavbar">
                        <a class="nav-link" style="color: aliceblue;" href="Repuestos.php">repuestos</a>
                    </li>
                </ul>
            </Nav>
        </section>
        <section class="container" style="padding-top: 20px;">
            <div class="textocard">
                <h1 style="margin-bottom: 80px;">BICICLETAS</h1>
            </div>
            <div class="row">
            <div class="col-md-4 card1">
                <div class="card" style="width: 21rem;">
                    <img src="img/bicicleta1.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                            <h5 class="card-title">Ecobike Classic</h5>
                            <h5 style="font-size: 15px">Precio <span class="precio">S/ 3499.00</span></h5>
                            <a href="#" class="btn btncard buttoncarrito">Agregar al carrito<i class="bi bi-cart"></i></a>
                            <p></p>
                            <a href="#" class="btn btn-warning"> Farovitos <i class="bi bi-star"></i></a>
                    </div>
                </div>
            </div>

                <div class="col-md-4 card1">
                    <div class="card" style="width: 21rem;">
                        <img src="img/bicicleta2.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ecobike Retro</h5>
                            <h5 style="font-size: 15px">Precio <span class="precio">S/ 2599.00</span></h5>
                            <a href="#" class="btn btncard">Agregar al carrito<i class="bi bi-cart"></i></a>
                            <p>
    
                            </p>
                            <a href="#" class="btn btn-warning"> Farovitos <i class="bi bi-star"></i></a>
                        </div>
                    </div>
                </div>
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
            integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
            crossorigin="anonymous"></script>
        <script src="js/carrito.js"></script>
    </body>

</html>