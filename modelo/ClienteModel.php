<?php

namespace modelo;

require_once("Conexion.php");

class ClienteModel{

    public function BuscarClienteLogin($rut,$clave){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B AND estado=1 AND rol='vendedor'");
        $stm->bindParam(":A", $rut );
        $stm->bindParam(":B", md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function ListaClientes(){
        $stm = Conexion::conector()->prepare("SELECT * FROM cliente");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function insertarCliente($data){
        $stm = Conexion::conector()->prepare("INSERT INTO cliente VALUES(:rut_cliente,:nombre_cliente,:direccion_cliente,:telefono_cliente,:fecha_creacion,:email_cliente)");

        $stm->bindParam(":rut_cliente", $data['rut_cliente']);
        $stm->bindParam(":nombre_cliente", $data['nombre_cliente']);
        $stm->bindParam(":direccion_cliente", $data['direccion_cliente']);
        $stm->bindParam(":telefono_cliente", $data['telefono_cliente']);
        $stm->bindParam(":fecha_creacion", $data['fecha_creacion']);
        $stm->bindParam(":email_cliente", $data['email_cliente']);
        return $stm->execute();
    }

}