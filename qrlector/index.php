




<!DOCTYPE html>
<html lang="es">
<head>
    <title>CESFAM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/validar.js"></script>
    <script type="text/javascript" src="./main.js"></script>
    <script type="text/javascript" src="./llqrcode.js"></script>
</head>

<body>
<header>
    <div class="container">
        <h1 class="text-center">| Verifica Llegada |</h1>
    </div>
</header>

<main>

    <div class="container">

        <div class="row camara">

            <div class="col-md-6 col-md-offset-3 ">
                <div style="display:none" id="result"></div>
                <div class="selector" id="webcamimg" onclick="setwebcam()" align="left" ></div>
                <div class="selector" id="qrimg" onclick="setimg()" align="right" ></div>
                <center id="mainbody"><div id="outdiv" ></div></center>
                <canvas id="qr-canvas" width="200" height="200" ></canvas>
            </div>
            <div class="col-md-3 ">
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 login-intruc">
                    <div class="alert alert-info">
                        <strong>instrucciones: </strong>
                        color codigo QR de reserva y espere confirmacion
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
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
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">load();</script>
<script src="../js/jquery-3.2.1.js"></script>
</body>
</html>
