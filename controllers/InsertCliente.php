<?php

namespace controllers;

use modelo\ClienteModel as ClienteModel;

require_once("../modelo/ClienteModel.php");


class InsertCliente{
    public $rut_cliente;
    public $nombre_cliente;
    public $direccion_cliente;
    public $telefono_cliente;
    public $fecha_creacion;
    public $email_cliente;

    public function __construct()
    {
        $this->rut_cliente = $_POST['rut_cliente'];
        $this->nombre_cliente = $_POST['nombre_cliente'];
        $this->direccion_cliente = $_POST['direccion_cliente'];
        $this->telefono_cliente = $_POST['telefono_cliente'];
        $this->fecha_creacion = $_POST['fecha_creacion'];
        $this->email_cliente = $_POST['email_cliente'];
    }

    public function insertarCliente(){
        session_start();
        if($this->rut_cliente == "" || $this->nombre_cliente == "" || $this->direccion_cliente == "" || $this->telefono_cliente == "" || $this->fecha_creacion == "" || $this->email_cliente == ""){
            $_SESSION['error'] = "Completa los datos";
            header("Location: ../view/UserGestion.php");
            return;
        }
        $model = new ClienteModel();
        $data = ["rut_cliente"=>$this->rut_cliente,"nombre_cliente"=>$this->nombre_cliente,"direccion_cliente"=>$this->direccion_cliente,"telefono_cliente"=>$this->telefono_cliente,"fecha_creacion"=>$this->fecha_creacion,"email_cliente"=>$this->email_cliente];
        $count = $model->insertarCliente($data);
        if($count == 1){
            $_SESSION['respuesta'] = "Cliente creado con exito";
        }else{
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        header("Location: ../view/UserGestion.php");
    }

}

$obj = new InsertCliente();
$obj->insertarCliente();