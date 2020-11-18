<?php

namespace controllers;

require_once("../modelo/UsuarioModelo.php");

use modelo\UsuarioModelo as UsuarioModelo;

class InsertAdmin{
    public $rut;
    public $nombre;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre']; 
    }

    public function insertarUser(){
        session_start();
        if($this->rut == "" || $this->nombre == ""){
            $_SESSION['error'] = "Completa los datos";
            header("Location: ../view/AdminGestionUser.php");
            return;
        }
        $model = new UsuarioModelo();
        $data = ["rut"=>$this->rut,"nombre"=>$this->nombre];
        $count = $model->insertarUsuario($data);
        if($count == 1){
            $_SESSION['respuesta'] = "Usuario creado con exito";
        }else{
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        header("Location: ../view/AdminGestionUser.php");
    }
}

$obj = new InsertAdmin();
$obj->insertarUser();