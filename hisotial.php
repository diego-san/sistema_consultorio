<!DOCTYPE html>
<html lang="es">
<head>
    <title>CESFAM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<header>
    <div class="container">
        <h1 class="text-center">| Sistema Consultorio |</h1>
    </div>
</header>

<nav class="navbar navbar-default" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="panelnormal.php">Home</a></li>
                <li><a href="reserva.php">Pedir Consulta</a></li>
                <li><a href="hisotial.php">Historial</a></li>
                <li><a href="cambiarpass.php">Cambiar contraseña</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="close.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo">
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">Informacion personal</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 admin_dato">
                        <p class="lead"> <strong>Nombre: </strong><?php echo $datos[0][3]." ".$datos[0][4];?></p>
                        <p class="lead"> <strong>Rut: </strong><?php echo $datos[0][0]."-".$datos[0][1];?></p>
                        <p class="lead"> <strong>Numero de Ficha: </strong><?php echo $datos[0][2];?></p>
                        <p class="lead"> <strong>Fecha de nacimiento: </strong><?php echo $datos[0][5];?></p>
                        <p class="lead"> <strong>Numero de telefono: </strong><?php echo $datos[0][10];?></p>
                    </div>
                    <div class="col-md-6 admin_dato">
                        <?php if ($datos[0][6]=='M'):?>
                            <p class="lead"> <strong>Genero: </strong>Masculino</p>
                        <?php else:?>
                            <p class="lead"> <strong>Genero: </strong>Femenino</p>
                        <?php endif;?>
                        <p class="lead"> <strong>Servicio de Salud: </strong><?php echo $datos[0][8];?></p>
                        <p class="lead"> <strong>Ciudad de nacimiento: </strong><?php echo $datos[0][9];?></p>
                        <p class="lead"> <strong>Direccion: </strong><?php echo $datos[0][7];?></p>
                        <p class="lead"> <strong>Movilizacion: </strong><?php echo $datos[0][13];?></p>

                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</main>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="footer-text">Hospital Dr. Gustavo Fricke - Dirección: Alvarez 1532 - Viña del Mar - Teléfono: (32) 2577602-2577603</div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</footer>
<script src="js/jquery-3.2.1.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>