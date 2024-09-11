    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>Ecobike</title>
    </head>

    <body class="login">
        <?php
            session_start();
        ?>
        <nav class="navbar navbar-expand-lg" style="padding-block: 15px;">
            <div class="container-fluid">
                <div class="col-md-4 Logo">
                    <a href="Ecobike.php"><img src="img/Logoecobike2.png" width="100px" alt=""></a>
                </div>
                
            </div>
            </div>
        </nav>

        <div class="container  d-flex justify-content-center iconoscentrados" style="background-color: rgb(148, 194, 64);">
                <div class="container-form sign-up">
                    <div class="welcome-back" >
                        <div class="message" >
                            <h2>Bienvenido a Ecobike</h2>
                            <p>Si ya tienes una cuenta por favor inicia sesion aqui</p>
                            <button class="sign-up-btn">Iniciar Sesion</button>
                        </div>
                    </div>
                    <form class="formulario" id="registrarse" action="php/registro_usuario.php" method="POST" enctype="multipart/form-data">
                        <h2 class="create-account" style="font-weight: bold;">Crear una cuenta</h2>
                        <div class="iconos">
                            <div class="border-iconG">
                                <i class="bi bi-google"></i>
                            </div>
                            <div class="border-iconF">
                                <i class='bi bi-facebook'></i>
                            </div>
                        </div>
                        <p class="cuenta-gratis">Crear una cuenta gratis</p>
                        <input type="text" placeholder="Nombre" name="nombre">
                        <input type="text" placeholder="Apellidos" name="apellido">
                        <input type="text" placeholder="Numero" name="numero">
                        <input type="email" placeholder="Email" name="email">
                        <input type="password" placeholder="Contraseña" name="passwd">
                        <div>
                            <button type="button" class="btn-perfil">
                                <i class="bi bi-camera"></i>
                                <input type="file" name="imagen">
                            </button>
                        </div>
                        
                        <button class="Registrarse" type="submit">Registrarse</button>
                    </form>
                </div>
                <div class="container-form sign-in">
                    <form class="formulario" id="ingresar" action="php\login_usuario.php" method="POST">
                        <h2 class="create-account" style="font-weight: bold;">Iniciar Sesion</h2>
                        <div class="iconos">
                            <div class="border-iconG">
                                <i class="bi bi-google"></i>
                            </div>
                            <div class="border-iconF">
                                <i class='bi bi-facebook'></i>
                            </div>
                        </div>
                        <p class="cuenta-gratis">¿Aun no tienes una cuenta?</p>
                        <input type="email" placeholder="Email" name="correo">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button type="submit" class="iniciar-sesion">Iniciar Sesion</button>
                    </form>
                    <div     class="welcome-back">
                        <div class="message">
                            <h2 >Bienvenido de nuevo</h2>
                            <p>Si aun no tienes una cuenta por favor registrese aqui</p>
                            <button class="sign-in-btn" >Registrarse</button>
                        </div>
                    </div>
                </div>
            </div>

        <script src="js/script.js"></script>
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