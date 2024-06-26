<?php
// Verificar si la sesión no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Conectar
{
    protected $dbh;

    public function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=localhost;dbname=proyectodes", "root", "");
            $this->set_names();
        } catch (PDOException $e) {
            print "¡Error BD! " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function Conexion()
    {
        return $this->dbh;
    }

    public function set_names()
    {
        $this->dbh->query("SET NAMES 'utf8'");
    }

    public static function ruta()
    {
        return "http://localhost/ProyectoDESvs1-1/";
    }
}
?>
