<?php
include_once 'conexion.php';

class Tabata extends DB
{

    public static function obtenerTabta($id)
    {
        $query = self::connect()->prepare('select .id as tabataID,t.nombre as tabataNombre from usuario inner join tabata t on usuario.id = t.idUsuario
                                            where usuario.id = :id');
        $query->execute(['id'=>$id]);
        return $query->fetch();
    }


}
