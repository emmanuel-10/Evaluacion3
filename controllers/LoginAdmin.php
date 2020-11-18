<?php
namespace controllers;

use modelo\UsuarioModelo as UsuarioModelo;

require_once("../modelo/UsuarioModelo.php");

class LoginAdmin{
    public $rut;
    public $clave;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['clave'];
    }


    public function IniciarSesion(){
        session_start();
        if($this->rut == "" || $this->clave == ""){
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../loginAdmin.php");
            return;
        }
        $modelo = new UsuarioModelo();
        $array = $modelo->BuscarUserLogin($this->rut,$this->clave);
        if(count($array) == 0 ){
            $_SESSION['error'] = "Rut o Clave no se encuentra";
            header("Location: ../loginAdmin.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];

        header("Location: ../view/AdminGestionUser.php");
    }
}

$obj = new LoginAdmin();
$obj->IniciarSesion();