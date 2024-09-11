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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">BLOG</h1>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6 iconoscentrados">
                <div class="card " style="width: 38rem; height: 38rem; background-color: #ebebeb;">
                    <img src="img/blog.jpg" alt="" style="width: 560px; height: 315px;">
                    <div class="card-body" >
                        <h5 class="card-title text-center">Monopatines y bicicletas eléctricas</h5>
                        <p class="card-text texto-justificado">Los monopatines y bicicletas eléctricas son opciones de
                            transporte amigables con el medio ambiente que ofrecen beneficios significativos. Estos
                            vehículos funcionan con motores eléctricos y no emiten gases contaminantes ni partículas
                            tóxicas, lo que contribuye a mejorar la calidad del aire y reducir la contaminación
                            ambiental.</p>
                    </div>
                    <div class="card-body">
                        <a href="https://www.enbici.biz/comprar-bicicleta-electrica/#:~:text=Muchas%20pruebas%20tambi%C3%A9n%20han%20demostrado,estas%20bicicletas%20es%20incre%C3%ADblemente%20alta."
                            class="card-link" style="color: rgb(148, 194, 64)">Más informacion</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card " style="width: 38rem; height: 38rem; background-color: #ebebeb;">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{gkHG68o8zkk}" frameborder="0"
                        allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Animate a comprar una bicicleta electrica</h5>
                        <p class="card-text texto-justificado">Todo la información que necesitas si quieres animarte a
                            usar
                            una bicicleta eléctrica.</p>
                            <p class="card-text texto-justificado">Desde recomendaciones hasta el porque es beneficiosa comprar una bicicleta electrica</p>
                    </div>
                    <div class="card-body">
                        <a href="https://www.youtube.com/watch?v=4780ZXtmQto"
                            class="card-link" style="color: rgb(148, 194, 64)">Ver video</a>
                    </div>
                </div>
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
</body>

</html>