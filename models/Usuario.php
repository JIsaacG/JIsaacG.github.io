<?php
class Usuario extends Conectar
{
    public function login()
    {
        $conectar = parent::Conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $contrasena = $_POST["contrasena"];
            $correo = $_POST["correo"];

            if (empty($correo) or empty($contrasena)) {
                header("Location:" . Conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM tbl_ms_usuario WHERE CORREO_ELECTRONICO=? AND ESTADO_USUARIO='1'";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo);
                $stmt->execute();
                $resultado = $stmt->fetch();

                if (is_array($resultado) && count($resultado) > 0) {
                    // Si usas contraseñas encriptadas
                    if (password_verify($contrasena, $resultado["contrasena"])) {
                        $_SESSION["ID_USUARIO"] = $resultado["ID_USUARIO"];
                        $_SESSION["NOMBRE_USUARIO"] = $resultado["NOMBRE_USUARIO"];
                        $_SESSION["CORREO_ELECTRONICO"] = $resultado["CORREO_ELECTRONICO"];
                        $_SESSION["ID_ROL"] = $resultado["ID_ROL"];
                        // Redirigir a la vista principal
                        header("Location:" . Conectar::ruta() . "view/home/");
                        exit();
                    } else {
                        // Contraseña incorrecta
                        header("Location:" . Conectar::ruta() . "index.php?m=1");
                        exit();
                    }
                } else {
                    // Usuario no encontrado o no activo
                    header("Location:" . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }

    public function get_correo_usuario($correo)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_ms_usuario WHERE CORREO_ELECTRONICO=?;";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $correo);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
