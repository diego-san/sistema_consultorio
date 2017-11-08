<?php
$error=0;
if (isset($_GET['error']) && is_numeric($_GET['error'])) {
    $error = (int) $_GET['error'];
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Sistema Consultorio</title>
</head>
<body>
    <header>
        <div class="container ">
            <h1 class="text-center">Sistema Consultorio</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 login-padding">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 login-cabecera">
                            <div class="login-text">Identificación</div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 login-border">
                         <div class="row">
                        <div class="col-md-5 login-formulario">
                            <form class="form-signin" action="validar.php" method="get">
                                <div class="form-group">
                                    <label for="login-rut" class="sr-only">Rut</label>
                                    <input type="text" id="login-rut" class="form-control" placeholder="Ingresar Rut" required autofocus autocomplete="off" name="rut" minlength="9" maxlength="9">
                                </div>
                                <div class="form-group">
                                    <label for="login-password" class="sr-only">Contraseña</label>
                                    <input type="password" id="login-password" class="form-control" placeholder="Ingresar Contraseña" required autocomplete="off" name="password" minlength="4">
                                </div>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                            </form>
                        </div>
                        <div class="col-md-7 login-intruc">
                            <div class="alert alert-info">
                                <strong>instrucciones: </strong>
                                Ingresar Rut completo sin puntos ni guion, su Contraseña son sus últimos 5 dígitos de su Rut sin contar puntos ni guion. Recuerde cambiar su contraseña para mayor seguridad.
                            </div>
                        </div>
                         </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                    <?php if($error== 1):?>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 login-error">
                            <div class="alert alert-danger ">
                                <strong>Error! </strong> Rut o Contraseña Incorrecta
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <?php endif; ?>
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

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>