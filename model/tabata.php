<?php
include_once 'conexion.php';

class TabataModel extends DB
{

    public static function obtenerTabta($id)
    {
        $query = self::connect()->prepare('select t.id as tabataID,t.nombre as tabataNombre from usuario inner join tabata t on usuario.id = t.idUsuario where usuario.id = :id');

        $query->execute(['id'=>$id]);
        return $query;
    }


}
