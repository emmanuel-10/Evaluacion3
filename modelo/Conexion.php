<?php
namespace modelo;

class Conexion{
    public static $user="uxuifcgenlucwmwn";
    public static $pass="Skb1NgSy4AEuLgEHg5Ch";
    public static $URL="mysql:host=bpiebayo5nwaww024tgx-mysql.services.clever-cloud.com;dbname=bpiebayo5nwaww024tgx";
    
    public static function conector(){
        try{  
            return new \PDO(Conexion::$URL,Conexion::$user,Conexion::$pass);
        }catch(\PDOException $e){  
            return null;
        }
    }

}