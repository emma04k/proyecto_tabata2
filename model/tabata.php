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


    public static function getTipoEjercicios()
    {
        $query = self::connect()->query("SELECT * FROM `tipoejercicio`");

        return $query;
    }

    public static function eliminarTabata($id)
    {
        $query=self::connect()->prepare('DELETE FROM tabata WHERE id=:id');
        $query->execute(['id'=>$id]);

        if($query->execute()){
            return true;
        }else{
            return false;
        }


    }

    public static function  editarTabata($datos)
    {
        $query=self::connect()->prepare('UPDATE tabata SET ');
        $query->execute([]);

        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }


    public static  function crear_tabata( $data )
    {
        $query = self::connect()->query(
            "INSERT INTO `tabata` (`id`, `nombre`, `tPreparacion`, `tActividad`, `tDescanso`, `numSeries`, `numRondas`, `idUsuario`) VALUES (NULL, '$data[nombre_tabata]', '$data[tPreparacion]', '$data[tActividad]', '$data[tDescanso]', '$data[numSeries]', '$data[numRondas]', '$data[idUsuario]');");
        return true;
    }


}


