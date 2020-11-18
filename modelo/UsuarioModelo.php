<?php

namespace modelo;

require_once("Conexion.php");

class UsuarioModelo{


    public function BuscarUserLogin($rut,$clave){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B AND estado=1 AND rol='administrador'");
        $stm->bindParam(":A", $rut );
        $stm->bindParam(":B", md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarUsuario($rut)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A");
        $stm->bindParam(":A", $rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function ListaUsuarios(){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function insertarUsuario($data){
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:rut,:nombre,'vendedor',md5('12345'),'1')");

        $stm->bindParam(":rut", $data['rut']);
        $stm->bindParam(":nombre", $data['nombre']);
        return $stm->execute();
    }

    public function eliminarUser($rut)
    {
        $stm = Conexion::conector()->prepare("DELETE FROM usuario where rut=:A");
        $stm->bindParam(":A", $rut);
        return $stm->execute();
    }


    public function editarUser($rut, $estado)
    { 
        $stm = Conexion::conector()->prepare("UPDATE usuario SET estado=:A WHERE rut=:B");
        $stm->bindParam(":A", $estado);
        $stm->bindParam(":B", $rut);
        return $stm->execute();
    }

}