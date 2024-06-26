<?php
    require('class.phpmailer.php');
    include("class.smtp.php");

    require_once("../config/conexion.php");
    require_once("../Models/Usuario.php");

    class Email extends PHPMailer{
        
        public function recuperar($correo){
            $usuario = new Usuario();
            $datos = $usuario->get_correo_usuario($correo);
            foreach ($datos as $row) {
                $nom = $row["NOMBRE_USUARIO"];
                $pass = $row["CONTRASEÑA"];
            }

            $this->IsSMTP();
            $this->Host = 'smtp.office365.com';
            $this->Port = 587;
            $this->SMTPAuth = true;
            $this->Username = $this->tu_email = "PruebaDES_IMPLEMENTACION@hotmail.com";
            $this->Password = $this->tu_password = "Prueba123456";
            $this->SMTPSecure = 'tsl';
            $this->From = $this->tu_email;
            $this->CharSet='UTF8';
            $this->addAddress($correo);
            $this->WordWrap = 50;
            $this->IsHTML(true);
            $this->Subject = "Recuperar Contraseña";
                   $cuerpo = file_get_contents('../public/recuperar.html');
                   $cuerpo = str_replace('lblnomx',$nom,$cuerpo);
                   $cuerpo = str_replace('lblpassx',$pass,$cuerpo);
            $this->Body = $cuerpo;
            $this->IsHTML(true);
            return $this->Send();
        }
    }
?>