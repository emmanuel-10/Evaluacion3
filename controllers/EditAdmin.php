<?php

namespace controllers;

use modelo\UsuarioModelo as UsuarioModelo;

require_once("../modelo/UsuarioModelo.php");

class EditAdmin{

    public $rut;
    
    public $estado;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        
        $this->estado = $_POST['estado'];
       
    }

    
    public function editar()
    {
        session_start();
        if ($this->rut == "" || $this->estado == "" ) {
            $_SESSION['error_edit'] = "Completa todos los campos";
            header("Location: ../view/AdminGestionUser.php");
            return;
        }

        $data = ['rut' => $this->rut,'estado' => $this->estado];
        $modelo = new UsuarioModelo();

        $count = $modelo->editarUser($this->rut,$this->estado);
        if ($count == 1) {
            $_SESSION["ok_edit"] = "Tarea Actualizada";
        } else {
            $_SESSION['error_edit'] = "Error en la BD";
        }
        header("Location: ../view/AdminGestionUser.php");
    }
}


$obj = new EditAdmin();
$obj->editar();