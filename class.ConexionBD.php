<?php

include_once "configuracion.php";

class ConexionBD
{

    public $host;
    public $usuario;
    public $password;
    public $bd_nombre;
    public $con;

    // Constructor de la clase
    public function __construct()
    {
        $this->host = BD_SERVIDOR;
        $this->usuario = BD_USUARIO;
        $this->password = BD_PASSWORD;
        $this->bd_nombre = BD_NOMBRE;
    }

    // Método para abrir una conexión a la base de datos
    public function conectar_bd()
    {
        $this->con = mysqli_connect($this->host, $this->usuario, $this->password) or die("Error conectando a la base de datos: " . mysqli_connect_error());
        mysqli_select_db($this->con, $this->bd_nombre) or die("Error seleccionando la base de datos.");
        return $this->con;
    }

    // Método para cerrar una conexión
    public function cerrar_conexion()
    {
        mysqli_close($this->con) or die("Error al cerrar la conexión con la base de datos.");
    }
}
