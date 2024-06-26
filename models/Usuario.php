
<?php
    class Usuario extends Conectar {
        
        public function login(){
			$conectar=parent::Conexion();
			parent::set_names();
			if(isset($_POST["enviar"])){
				
				$password = $_POST["password"];
				$correo = $_POST["correo"];

				if(empty($correo) and empty($password)){
					header("Location:".Conectar::ruta()."index.php?m=2");
					exit();
				}
			else {
				$sql = "SELECT * FROM tbl_ms_usuario WHERE CORREO_ELECTRONICO=? AND CONTRASEÑA =? AND ESTADO_USUARIO='Activo'";
				$sql = $conectar->prepare($sql);
                $sql->bindValue(1, $correo);
				$sql->bindValue(2, $password);
				$sql->execute();
				$resultado = $sql->fetch();
                if (is_array($resultado) && count($resultado) > 0) {
                    $_SESSION["ID_USUARIO"] = $resultado["ID_USUARIO"];
                    $_SESSION["NOMBRE_USUARIO"] = $resultado["NOMBRE_USUARIO"];
                    $_SESSION["CORREO_ELECTRONICO"] = $resultado["CORREO_ELECTRONICO"];
                    $_SESSION["ID_ROL"] = $resultado["ID_ROL"];

                    // Redirigir a la vista principal
                    header("Location:" . Conectar::ruta() . "view/home/");
                    exit();
                    //Si se encuentra un error lo mandara a la misma pagina
                } else {
                    header("Location:" . Conectar::ruta() . "index.php?m=1");
                    exit();
					} 
				}
			}
		}
		
		public function get_correo_usuario($correo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tbl_ms_usuario WHERE CORREO_ELECTRONICO=?;";
            $sql=$conectar->prepare($sql);
			$sql->bindValue(1,$correo);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }

    }
?>
