<?php

namespace controllers;

use modelo\UsuarioModelo as UsuarioModelo;

require_once("../modelo/UsuarioModelo.php");

class ActionAdmin{
    public $bt_delete;
    public $bt_edit;

    public function __construct()
    {
        $this->bt_edit = $_POST['bt_edit'];
        $this->bt_delete = $_POST['bt_delete'];
    }

    public function procesar(){
        if(isset($this->bt_edit)){
            session_start();
            $_SESSION['editar'] = "ON";
            $modelo = new UsuarioModelo();
            $user = $modelo->buscarUsuario($this->bt_edit);
            $_SESSION['user'] = $user[0];
            header("Location: ../view/AdminGestionUser.php");
        }else{
            $modelo = new UsuarioModelo();
            $modelo->eliminarUser($this->bt_delete);
            header("Location: ../view/AdminGestionUser.php");
        }
    }
}

$obj = new ActionAdmin();
$obj->procesar();