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
  `rut_administracion` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `digito_admin` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_administracion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_admin` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_administracion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `titulo_admin` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero_admin` bigint(20) NOT NULL,
  `correo_admin` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direcc_admin` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fech_nac_admin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;');
            $crear_tb_users->execute();

            $crear_tb_users = $this->pdo->prepare('CREATE TABLE `clinica_administracion` (
  `rut_clinica` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `digito_clin` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_clinica` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_clinica` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `titulo_clinica` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_clinica` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero_clinica` bigint(20) NOT NULL,
  `correo_clinica` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `direcc_clinica` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fech_nac_clinica` date NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;');
            $crear_tb_users->execute();

             $crear_tb_users = $this->pdo->prepare('CREATE TABLE `espera` (
  `rut_es` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_es` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_es` datetime NOT NULL,
  `id_es` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;');
            $crear_tb_users->execute();

            $crear_tb_users = $this->pdo->prepare('CREATE TABLE `historial` (
  `rut_histo` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `rut_especialista` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `informe_ante` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_atencion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `in_histo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;');
            $crear_tb_users->execute();

              $crear_tb_users = $this->pdo->prepare('CREATE TABLE `persona` (
  `rut_persona` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `digito_persona` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nro_ficha` int(11) NOT NULL,
  `nombre_persona` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_persona` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fech_nac_persona` date NOT NULL,
  `genero_persona` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_persona` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `servicio_salub` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad_nacimiento` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero_telefono` bigint(20) NOT NULL,
  `sector` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `establecimiento` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_persona` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;');
            $crear_tb_users->execute();

             $crear_tb_users = $this->pdo->prepare('CREATE TABLE `reserva` (
  `rut` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo_reveva` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `qr` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;');
            $crear_tb_users->execute();

              $crear_tb_users = $this->pdo->prepare('CREATE TABLE `user` (
  `rut` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;');
            $crear_tb_users->execute();

              $crear_tb_users = $this->pdo->prepare('

               ALTER TABLE `administracion`
  ADD PRIMARY KEY (`rut_administracion`),
  ADD KEY `fk_user_admin` (`rut_administracion`);

  ALTER TABLE `clinica_administracion`
  ADD PRIMARY KEY (`rut_clinica`);

  ALTER TABLE `espera`
  ADD PRIMARY KEY (`id_es`),
  ADD KEY `espera_reserva_rut_fk` (`rut_es`);

  ALTER TABLE `historial`
  ADD PRIMARY KEY (`in_histo`),
  ADD KEY `historial_persona_rut_persona_fk` (`rut_histo`),
  ADD KEY `historial_clinica_administracion_rut_clinica_fk` (`rut_especialista`);

  ALTER TABLE `persona`
  ADD PRIMARY KEY (`rut_persona`);

  ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `reserva_persona_rut_persona_fk` (`rut`);

  ALTER TABLE `user`
  ADD PRIMARY KEY (`rut`);

ALTER TABLE `historial`
  MODIFY `in_histo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

  ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

  ALTER TABLE `administracion`
  ADD CONSTRAINT `fk_user_admin` FOREIGN KEY (`rut_administracion`) REFERENCES `user` (`rut`);

  ALTER TABLE `clinica_administracion`
  ADD CONSTRAINT `fk_user_clinica` FOREIGN KEY (`rut_clinica`) REFERENCES `user` (`rut`);

  ALTER TABLE `espera`
  ADD CONSTRAINT `espera_reserva_id_reserva_fk` FOREIGN KEY (`id_es`) REFERENCES `reserva` (`id_reserva`);

ALTER TABLE `historial`
  ADD CONSTRAINT `historial_clinica_administracion_rut_clinica_fk` FOREIGN KEY (`rut_especialista`) REFERENCES `clinica_administracion` (`rut_clinica`),
  ADD CONSTRAINT `historial_persona_rut_persona_fk` FOREIGN KEY (`rut_histo`) REFERENCES `persona` (`rut_persona`);

  ALTER TABLE `persona`
  ADD CONSTRAINT `fk_user_persona` FOREIGN KEY (`rut_persona`) REFERENCES `user` (`rut`);
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_persona_rut_persona_fk` FOREIGN KEY (`rut`) REFERENCES `persona` (`rut_persona`);

INSERT INTO `user` (`rut`, `password`, `tipo`) VALUES
(1000000, "mu3mAXx4Xkzw6", "ROOT");


                ');
            $crear_tb_users->execute();

   



        endif;

    }
}
//ejecutamos la función my_db para crear nuestra bd y las tablas
$db = new Create_database();
$db->my_db();

?>