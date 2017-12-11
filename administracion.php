<?php
require "bd/consulta.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$rut=$varsesion;

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'ADMINISTRACION') {
    header("Location:login.php");
    die();
}
//tiempo de sesion
if(isset($_SESSION['tiempo']) ) {
    $inactivo = 1200;
    $vida_session = time() - $_SESSION['tiempo'];
    if($vida_session > $inactivo)
    {
        session_unset();
        session_destroy();
        header("Location:login.php");
        exit();
    }

}
$_SESSION['tiempo'] = time();

$get = new consulta();
$datos=$get->info_root($rut);
$lista= $get->pendiente();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                <li class="active"><a href="administracion.php">Home</a></li>
                <li><a href="in_paciente.php">Ingresar Paciente</a></li>
                <li><a href="buscarpe.php">Busqueda Paciente</a></li>
                <li><a href="resetp.php">Restablecer Contraseña Persona</a></li>
                <li><a href="listaespera.php">Lista Espera</a></li>
                <li><a href="grafica.php">Grafica</a></li>
                <li><a href="datosadmin.php"> Mis Datos</a></li>
                <li><a href="cambiarpass.php">Cambiar Contraseña</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="close.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container-fluid admin-fondo">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1 admin_tirulo">
                <h2 class="text-center">Informacion</h2>
            </div>
            <div class="col-md-1"></div>


        </div>


        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo div-scroll" >
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">General</p>
                    </div>
                </div>
                <?php if (!empty($lista)):?>
                    <?php foreach ($lista as$key => $value):?>
                        <?php if ($value[2]=="GENERAL"):?>
                            <?php
                            $infoper=$get->panelnormal($value[0]);
                            ?>
                            <div class="row datos_bottom" >
                                <div class="col-md-8">
                                    <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                    <p class="lead"><strong>Nombre: </strong><?php echo $infoper[0][3]." ".$infoper[0][4];?><strong> Rut: </strong><?php echo $infoper[0][0]."-".$infoper[0][1];?></p>
                                    <p class="lead"> <strong>Numero De Telefono: </strong><?php echo $infoper[0][10];?> </p>
                                </div>
                                <div class="col-md-4  reserva bot">
                                    <button type="button" class="btn btn-primary btn-block " onclick="return confirmar(<?php echo $value[4];?>,<?php echo $value[0];?>)">Confimar</button>
                                    <button type="button" class="btn btn-danger btn-block " onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-md-12 reserva  ">
                        <h2 class="text-cente reserva ">No hay Reserva</h2>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo div-scroll" >
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">GINECOLOGIA</p>
                    </div>
                </div>
                <?php if (!empty($lista)):?>
                    <?php foreach ($lista as$key => $value):?>
                        <?php
                        $infoper=$get->panelnormal($value[0]);
                        ?>
                        <?php if ($value[2]=="GINECOLOGIA"):?>
                            <?php
                            $infoper=$get->panelnormal($value[0]);
                            ?>
                            <div class="row datos_bottom" >
                                <div class="col-md-8 ">
                                    <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                    <p class="lead"><strong>Nombre: </strong><?php echo $infoper[0][3]." ".$infoper[0][4];?><strong> Rut: </strong><?php echo $infoper[0][0]."-".$infoper[0][1];?></p>
                                    <p class="lead"> <strong>Numero De Telefono: </strong><?php echo $infoper[0][10];?> </p>
                                </div>
                                <div class="col-md-4  reserva bot">
                                    <button type="button" class="btn btn-primary btn-block " onclick="return confirmar(<?php echo $value[4];?>,<?php echo $value[0];?>)">Confimar</button>
                                    <button type="button" class="btn btn-danger btn-block " onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-md-12 reserva  ">
                        <h2 class="text-cente reserva ">No hay Reserva</h2>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo div-scroll" >
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">PEDIATRIA</p>
                    </div>
                </div>
                <?php if (!empty($lista)):?>
                    <?php foreach ($lista as$key => $value):?>
                        <?php
                        $infoper=$get->panelnormal($value[0]);
                        ?>
                        <?php if ($value[2]=="PEDIATRIA"):?>
                            <?php
                            $infoper=$get->panelnormal($value[0]);
                            ?>
                            <div class="row datos_bottom " >
                                <div class="col-md-8">
                                    <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                    <p class="lead"><strong>Nombre: </strong><?php echo $infoper[0][3]." ".$infoper[0][4];?><strong> Rut: </strong><?php echo $infoper[0][0]."-".$infoper[0][1];?></p>
                                    <p class="lead"> <strong>Numero De Telefono: </strong><?php echo $infoper[0][10];?> </p>
                                </div>
                                <div class="col-md-4  reserva bot">
                                    <button type="button" class="btn btn-primary btn-block " onclick="return confirmar(<?php echo $value[4];?>,<?php echo $value[0];?>)">Confimar</button>
                                    <button type="button" class="btn btn-danger btn-block " onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-md-12 reserva  ">
                        <h2 class="text-cente reserva ">No hay Reserva</h2>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo div-scroll" >
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">MENTAL</p>
                    </div>
                </div>
                <?php if (!empty($lista)):?>
                    <?php foreach ($lista as$key => $value):?>
                        <?php
                        $infoper=$get->panelnormal($value[0]);
                        ?>
                        <?php if ($value[2]=="MENTAL"):?>
                            <?php
                            $infoper=$get->panelnormal($value[0]);
                            ?>
                            <div class="row  datos_bottom" >
                                <div class="col-md-8">
                                    <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                    <p class="lead"><strong>Nombre: </strong><?php echo $infoper[0][3]." ".$infoper[0][4];?><strong> Rut: </strong><?php echo $infoper[0][0]."-".$infoper[0][1];?></p>
                                    <p class="lead"> <strong>Numero De Telefono: </strong><?php echo $infoper[0][10];?> </p>
                                </div>
                                <div class="col-md-4  reserva bot">
                                    <button type="button" class="btn btn-primary btn-block " onclick="return confirmar(<?php echo $value[4];?>,<?php echo $value[0];?>)">Confimar</button>
                                    <button type="button" class="btn btn-danger btn-block " onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-md-12 reserva  ">
                        <h2 class="text-cente reserva ">No hay Reserva</h2>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo div-scroll" >
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">KINESIOLOGIA</p>
                    </div>
                </div>
                <?php if (!empty($lista)):?>
                    <?php foreach ($lista as$key => $value):?>
                        <?php
                        $infoper=$get->panelnormal($value[0]);
                        ?>
                        <?php if ($value[2]=="KINESIOLOGIA"):?>
                            <?php
                            $infoper=$get->panelnormal($value[0]);
                            ?>
                            <div class="row  datos_bottom" >
                                <div class="col-md-8">
                                    <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                    <p class="lead"><strong>Nombre: </strong><?php echo $infoper[0][3]." ".$infoper[0][4];?><strong> Rut: </strong><?php echo $infoper[0][0]."-".$infoper[0][1];?></p>
                                    <p class="lead"> <strong>Numero De Telefono: </strong><?php echo $infoper[0][10];?> </p>
                                </div>
                                <div class="col-md-4  reserva bot">
                                    <button type="button" class="btn btn-primary btn-block " onclick="return confirmar(<?php echo $value[4];?>,<?php echo $value[0];?>)">Confimar</button>
                                    <button type="button" class="btn btn-danger btn-block " onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-md-12 reserva  ">
                        <h2 class="text-cente reserva ">No hay Reserva</h2>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo div-scroll" >
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">OFTAMOLOGIA</p>
                    </div>
                </div>
                <?php if (!empty($lista)):?>
                    <?php foreach ($lista as$key => $value):?>
                        <?php
                        $infoper=$get->panelnormal($value[0]);
                        ?>
                        <?php if ($value[2]=="OFTAMOLOGIA"):?>
                            <?php
                            $infoper=$get->panelnormal($value[0]);
                            ?>
                            <div class="row datos_bottom" >
                                <div class="col-md-8">
                                    <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                    <p class="lead"><strong>Nombre: </strong><?php echo $infoper[0][3]." ".$infoper[0][4];?><strong> Rut: </strong><?php echo $infoper[0][0]."-".$infoper[0][1];?></p>
                                    <p class="lead"> <strong>Numero De Telefono: </strong><?php echo $infoper[0][10];?> </p>
                                </div>
                                <div class="col-md-4  reserva bot">
                                    <button type="button" class="btn btn-primary btn-block " onclick="return confirmar(<?php echo $value[4];?>,<?php echo $value[0];?>)">Confimar</button>
                                    <button type="button" class="btn btn-danger btn-block " onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-md-12 reserva  ">
                        <h2 class="text-cente reserva ">No hay Reserva</h2>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo div-scroll" >
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">DENTAL</p>
                    </div>
                </div>
                <?php if (!empty($lista)):?>
                <?php foreach ($lista as$key => $value):?>
                        <?php
                            $infoper=$get->panelnormal($value[0]);
                        ?>
                        <?php if ($value[2]=="DENTAL"):?>
                            <?php
                            $infoper=$get->panelnormal($value[0]);
                            ?>
                            <div class="row datos_bottom" >
                                <div class="col-md-8">
                                    <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                    <p class="lead"><strong>Nombre: </strong><?php echo $infoper[0][3]." ".$infoper[0][4];?><strong> Rut: </strong><?php echo $infoper[0][0]."-".$infoper[0][1];?></p>
                                    <p class="lead"> <strong>Numero De Telefono: </strong><?php echo $infoper[0][10];?> </p>
                                </div>
                                <div class="col-md-4  reserva bot">
                                    <button type="button" class="btn btn-primary btn-block " onclick="return confirmar(<?php echo $value[4];?>,<?php echo $value[0];?>)">Confimar</button>
                                    <button type="button" class="btn btn-danger btn-block " onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>
                                </div>
                            </div>
                        <?php endif;?>
                <?php endforeach;?>
                <?php else:?>
                    <div class="col-md-12 reserva  ">
                        <h2 class="text-cente reserva ">No hay Reserva</h2>
                    </div>
                <?php endif;?>
            </div>
    </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo div-scroll" >
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">MATERNAL</p>
                    </div>
                </div>
                <?php if (!empty($lista)):?>
                    <?php foreach ($lista as$key => $value):?>
                        <?php
                        $infoper=$get->panelnormal($value[0]);
                        ?>
                        <?php if ($value[2]=="MATERNAL"):?>
                            <?php
                            $infoper=$get->panelnormal($value[0]);
                            ?>
                            <div class="row datos_bottom" >
                                <div class="col-md-8">
                                    <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                    <p class="lead"><strong>Nombre: </strong><?php echo $infoper[0][3]." ".$infoper[0][4];?><strong> Rut: </strong><?php echo $infoper[0][0]."-".$infoper[0][1];?></p>
                                    <p class="lead"> <strong>Numero De Telefono: </strong><?php echo $infoper[0][10];?> </p>
                                </div>
                                <div class="col-md-4  reserva bot">
                                    <button type="button" class="btn btn-primary btn-block " onclick="return confirmar(<?php echo $value[4];?>,<?php echo $value[0];?>)">Confimar</button>
                                    <button type="button" class="btn btn-danger btn-block " onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-md-12 reserva  ">
                        <h2 class="text-cente reserva ">No hay Reserva</h2>
                    </div>
                <?php endif;?>
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
<script src="js/validar.js"></script>

</body>
</html>