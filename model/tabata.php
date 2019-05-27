<?php
include_once 'conexion.php';

class TabataModel extends DB
{

    public static function obtenerTabtas($id)
    {
        $query = self::connect()->prepare('select t.id as tabataID,t.nombre as tabataNombre from usuario inner join tabata t on usuario.id = t.idUsuario where usuario.id = :id');

        $query->execute(['id' => $id]);
        return $query;
    }

    public static function obtener_tabata($idTabata,$idUsuario)
    {
        $query = self::connect()->prepare('SELECT 
        tabata.id,
        tabata.nombre,
        tabata.tDescanso,
        tabata.tPreparacion,
        tabata.tActividad,
        tabata.numSeries,
        tabata.numRondas,
        ejercicio.id as idEjercicio,
        ejercicio.nombre as eNombre,
        ejercicio.archivo as eArchivo,
        tipoejercicio.nombre as tNombre
        FROM tabata  INNER JOIN ejercicioxtabata ON ejercicioxtabata.idTabata =tabata.id INNER JOIN ejercicio  
                                                ON ejercicio.id =ejercicioxtabata.idEjercicio
                                                INNER JOIN tipoejercicio
                                                ON tipoejercicio.id = ejercicio.idTipoEjercicio
                                                WHERE tabata.id = :idTabata AND tabata.idUsuario = :idUsuario');

        $query->execute(['idTabata' => $idTabata,'idUsuario' => $idUsuario]);

        $data = array();

        while ( $row = $query->fetch( PDO::FETCH_ASSOC ) )
        {
            if( ! isset( $data['nombre'] ) )
            {
                $data['nombre'] = $row['nombre'];
                $data['work']   = [
                    'min' => 0,
                    'seg' => $row['tActividad']
                ];
                $data['rest']   = [
                    'min' => 0,
                    'seg' => $row['tDescanso']
                ];
                $data['preparation'] = [
                    'min' => 0,
                    'seg' => $row['tPreparacion']
                ];
                $data['cycles'] = $row['numSeries'];
                $data['num']    = $row['numRondas'];
            }
            $data['e_types'][ ]    = [
                'id' => $row['idEjercicio'],
                'nombre' => $row['eNombre'],
                'tNombre' => $row['tNombre'],
                'archivo' => $row['eArchivo']
            ];
        }

        return $data;
   }


    public static function getTipoEjercicios()
    {
        $query = self::connect()->query("SELECT * FROM `tipoejercicio`");

        return $query;
    }

    public static function eliminarTabata($id)
    {
        $query = self::connect()->prepare('DELETE FROM tabata WHERE id=:id');
        $query->execute(['id' => $id]);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }


    }

    public static function editarTabata($data, $id)
    {
        $query = self::connect()->query("UPDATE tabata SET 
    tPreparacion = '$data[tPreparacion]', 
    tActividad = '$data[tActividad]', 
    tDescanso = '$data[tDescanso]',
    numSeries = '$data[numSeries]', 
    numRondas='$data[numRondas]' WHERE id=$id ");
        self::connect()->query("DELETE FROM `ejercicioxtabata` WHERE idTabata=$id");
        foreach ($data['ejercicios'] as $ejercicio) {
            $query = self::connect()->query(
                "INSERT
                            into ejercicioxtabata
                            (idTabata, idEjercicio) VALUES ($id,$ejercicio[id])"
            );
        }

        return true;
    }


    public static function crear_tabata($data)
    {
        $query = self::connect()->query(
            "INSERT INTO `tabata` (`id`, `nombre`, `tPreparacion`, `tActividad`, `tDescanso`, `numSeries`, `numRondas`, `idUsuario`) VALUES (NULL, '$data[nombre_tabata]', '$data[tPreparacion]', '$data[tActividad]', '$data[tDescanso]', '$data[numSeries]', '$data[numRondas]', '$data[idUsuario]');");

        $tabataID = self::connect()->lastInsertId();

        foreach ($data['ejercicios'] as $ejercicio) {
            $query = self::connect()->query(
                "INSERT
                            into ejercicioxtabata
                            (idTabata, idEjercicio) VALUES ($tabataID,$ejercicio[id])"
            );
        }
        return true;
    }

    public static function getEjercicios()
    {
        return self::connect()->query("SELECT
tipoejercicio.nombre as tipoeNombre,
tipoejercicio.id as tipoeID,
ejercicio.id as ejercicioID,
ejercicio.nombre as ejercicioNombre
FROM tipoejercicio
INNER JOIN ejercicio
ON tipoejercicio.id = ejercicio.idTipoEjercicio");
    }
}


