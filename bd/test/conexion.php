<?php


$usuario = "root";
$clave = "";
$db_nombre = "sistema_consultorio";
$host = "localhost";

try {
   $conn = new PDO("mysql:host=$host;dbname=$db_nombre", $usuario, $clave);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

?>
<?php
class Create_database
{
 protected $pdo;

 
 public function __construct()
 {
 $this->pdo = new PDO("mysql:host=localhost;", "root", "");
 }
 //creamos la base de datos y las tablas que necesitemos
 public function my_db()
 {
        //creamos la base de datos si no existe
 $crear_db = $this->pdo->prepare('CREATE DATABASE IF NOT EXISTS sistema_consultorio COLLATE utf8_spanish_ci');   
 $crear_db->execute();
 
 //decimos que queremos usar la tabla que acabamos de crear
 if($crear_db):
 $use_db = $this->pdo->prepare('USE sistema_consultorio');   
 $use_db->execute();
 endif;
 
 //si se ha creado la base de datos y estamos en uso de ella creamos las tablas
 if($use_db):
 //creamos la tabla usuarios
 $crear_tb_users = $this->pdo->prepare('CREATE TABLE `administracion` (
  `rut_administracion` char(8) NOT NULL,
  `digito_admin` char(1)  COLLATE utf8_spanish_ci NOT NULL,
  `nombre_administracion` varchar(45) NOT NULL,
  `cargo_admin` varchar(45) NOT NULL,
  `apellido_administracion` varchar(45) NOT NULL,
  `titulo_admin` varchar(45) NOT NULL,
  `numero_admin` bigint(20) NOT NULL,
  `correo_admin` varchar(100) NOT NULL,
  `direcc_admin` varchar(200) NOT NULL,
  `fech_nac_admin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;'); 
 $crear_tb_users->execute();
 
 //creamos la tabla posts
 $crear_tb_posts = $this->pdo->prepare('CREATE TABLE `clinica_administracion` (
  `rut_clinica` char(8) NOT NULL,
  `digito_clin` char(1) NOT NULL,
  `nombre_clinica` varchar(45) NOT NULL,
  `apellido_clinica` varchar(45) NOT NULL,
  `titulo_clinica` varchar(45) NOT NULL,
  `cargo_clinica` varchar(45) NOT NULL,
  `numero_clinica` bigint(20) NOT NULL,
  `correo_clinica` varchar(200) NOT NULL,
  `direcc_clinica` varchar(200) NOT NULL,
  `fech_nac_clinica` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;'); 
 $crear_tb_posts->execute();

  $crear_tb_posts = $this->pdo->prepare('CREATE TABLE `contacto` (
  `rut_contacto` char(8) NOT NULL,
  `nombre_contacto` varchar(45) NOT NULL,
  `apellido_contacto` varchar(45) NOT NULL,
  `numero_contacto` bigint(20) NOT NULL,
  `direcc_contacto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;'); 
 $crear_tb_posts->execute();

 $crear_tb_posts = $this->pdo->prepare('CREATE TABLE `historial` (
  `rut_histo` char(8) NOT NULL,
  `rut_especialista` char(8) NOT NULL,
  `informe_ante` varchar(2000) NOT NULL,
  `tipo_atencion` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL,
  `in_histo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;'); 
 $crear_tb_posts->execute();

$crear_tb_posts = $this->pdo->prepare('CREATE TABLE `persona` (
  `rut_persona` char(8) NOT NULL,
  `digito_persona` char(1) NOT NULL,
  `nro_ficha` int(11) NOT NULL,
  `nombre_persona` varchar(45) NOT NULL,
  `apellido_persona` varchar(45) NOT NULL,
  `fech_nac_persona` date NOT NULL,
  `genero_persona` char(1) NOT NULL,
  `direccion_persona` varchar(45) NOT NULL,
  `servicio_salub` varchar(45) NOT NULL,
  `ciudad_nacimiento` varchar(45) NOT NULL,
  `numero_telefono` bigint(20) NOT NULL,
  `sector` varchar(45) NOT NULL,
  `establecimiento` varchar(45) NOT NULL,
  `tipo_persona` varchar(45) NOT NULL,
  `rut_contac` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;'); 
 $crear_tb_posts->execute();

 $crear_tb_posts = $this->pdo->prepare('CREATE TABLE `reserva` (
  `rut` char(8) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo_reveva` varchar(45) NOT NULL,
  `id_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;'); 
 $crear_tb_posts->execute();

  $crear_tb_posts = $this->pdo->prepare('CREATE TABLE `user` (
  `rut` char(8) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;'); 
 $crear_tb_posts->execute();

  $crear_tb_posts = $this->pdo->prepare('ALTER TABLE `administracion`
  ADD PRIMARY KEY (`digito_admin`),
  ADD KEY `fk_user_admin` (`rut_administracion`);'); 
 $crear_tb_posts->execute();

  $crear_tb_posts = $this->pdo->prepare('ALTER TABLE `clinica_administracion`
  ADD PRIMARY KEY (`rut_clinica`);'); 
 $crear_tb_posts->execute();

   $crear_tb_posts = $this->pdo->prepare('ALTER TABLE `contacto`
  ADD PRIMARY KEY (`rut_contacto`);'); 
 $crear_tb_posts->execute();

  $crear_tb_posts = $this->pdo->prepare('ALTER TABLE `historial`
  ADD PRIMARY KEY (`in_histo`),
  ADD KEY `historial_persona_rut_persona_fk` (`rut_histo`),
  ADD KEY `historial_clinica_administracion_rut_clinica_fk` (`rut_especialista`);'); 
 $crear_tb_posts->execute();

   $crear_tb_posts = $this->pdo->prepare('ALTER TABLE `persona`
  ADD PRIMARY KEY (`rut_persona`),
  ADD KEY `persona_contacto_rut_contacto_fk` (`rut_contac`);'); 
 $crear_tb_posts->execute();

    $crear_tb_posts = $this->pdo->prepare('ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `reserva_persona_rut_persona_fk` (`rut`);'); 
 $crear_tb_posts->execute();

   $crear_tb_posts = $this->pdo->prepare('
	ALTER TABLE `user`
  ADD PRIMARY KEY (`rut`);
ALTER TABLE `historial`
  MODIFY `in_histo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

  ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
	ALTER TABLE `administracion`
  ADD CONSTRAINT `fk_user_admin` FOREIGN KEY (`rut_administracion`) REFERENCES `user` (`rut`);
	ALTER TABLE `clinica_administracion`
  ADD CONSTRAINT `fk_user_clinica` FOREIGN KEY (`rut_clinica`) REFERENCES `user` (`rut`);
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_persona_rut_contac_fk` FOREIGN KEY (`rut_contacto`) REFERENCES `persona` (`rut_contac`);
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_clinica_administracion_rut_clinica_fk` FOREIGN KEY (`rut_especialista`) REFERENCES `clinica_administracion` (`rut_clinica`),
  ADD CONSTRAINT `historial_persona_rut_persona_fk` FOREIGN KEY (`rut_histo`) REFERENCES `persona` (`rut_persona`);
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_user_persona` FOREIGN KEY (`rut_persona`) REFERENCES `user` (`rut`);
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_persona_rut_persona_fk` FOREIGN KEY (`rut`) REFERENCES `persona` (`rut_persona`);



   	'); 
 $crear_tb_posts->execute();

  $crear_tb_posts = $this->pdo->prepare('
	INSERT INTO `user` (`rut`, `password`, `tipo`) VALUES(1000000, 
	"mu3mAXx4Xkzw6", "ROOT");

  	'); 
 $crear_tb_posts->execute();


 endif;
 
 }
}
//ejecutamos la función my_db para crear nuestra bd y las tablas
$db = new Create_database();
$db->my_db();