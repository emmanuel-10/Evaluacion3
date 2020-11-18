<?php
namespace controllers;

use modelo\ClienteModel as ClienteModel;

require_once("../modelo/ClienteModel.php");

class LoginUser{
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
            header("Location: ../loginUser.php");
            return;
        }
        $modelo = new ClienteModel();
        $array = $modelo->BuscarClienteLogin($this->rut,$this->clave);
        if(count($array) == 0 ){
            $_SESSION['error'] = "Rut o Clave no se encuentra";
            header("Location: ../loginUser.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];

        header("Location: ../view/UserGestion.php");
    }
}

$obj = new LoginUser();
$obj->IniciarSesion();