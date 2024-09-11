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
    <nav class="navbar navbar-expand-lg" style="padding-block: 15px;">
        <div class="container-fluid">
            <div class="col-md-4 Logo">
                <a href="Ecobike.php"><img src="img/Logoecobike2.png" width="100px" alt=""></a>
            </div>
            
        </div>
        </div>
    </nav>

    <div class="container">
        <div class="circle">
            <div class="number">1</div>
            <div class="text">Carrito de compras</div>
        </div>
        <div class="line"></div>
        <div class="circle">
            <div class="number">2</div>
            <div class="text">Realizar pago</div>
        </div>
    </div>


    <section class="centrado">
        <div class="cardcarrito" style="background-color: white;">

        </div>
        <div class="cardcarrito" style="background-color: white;">

        </div>
        <div class="cardcarrito" style="background-color: white;">

        </div>
        <div class="cardcarrito" style="background-color: white;">

        </div>
    </section>
  



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