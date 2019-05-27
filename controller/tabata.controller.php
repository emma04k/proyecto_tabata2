<?php
require_once (__DIR__.'/../model/tabata.php');
include_once (__DIR__.'./userSesion.php');

class TabataController {


    public static function tabataByUserId($id )
    {
        return TabataModel::obtenerTabtas( $id )->fetchAll();
    }


    public static function crearTabata( $requestData )
    {
        $data = Array();
        $data['tPreparacion'] =( $requestData['preparation']['min'] * 60 ) + $requestData['preparation']['seg'];
        $data['tActividad'] = ( $requestData['work']['min'] * 60 ) + $requestData['work']['seg'];
        $data['tDescanso'] = ( $requestData['rest']['min'] * 60 ) + $requestData['rest']['seg'];
        $data['numSeries'] = intval($requestData['cycles']);
        $data['numRondas'] = intval($requestData['num']);
        $data['nombre_tabata'] = $requestData['nombre_tabata'];
        $data['ejercicios'] = isset($requestData['e_types']) ? $requestData['e_types'] : [];
        $data['idUsuario'] = $_SESSION['user_id'];
        return TabataModel::crear_tabata($data);
    }

    public static  function editar_Tabata($requestData,$id)
    {

        $data = Array();
        $data['tPreparacion'] =( $requestData['preparation']['min'] * 60 ) + $requestData['preparation']['seg'];
        $data['tActividad'] = ( $requestData['work']['min'] * 60 ) + $requestData['work']['seg'];
        $data['tDescanso'] = ( $requestData['rest']['min'] * 60 ) + $requestData['rest']['seg'];
        $data['numSeries'] = intval($requestData['cycles']);
        $data['numRondas'] = intval($requestData['num']);
        $data['nombre_tabata'] = $requestData['nombre_tabata'];
        $data['ejercicios'] = $requestData['e_types'];
        $data['idUsuario'] = $_SESSION['user_id'];
        return TabataModel::editarTabata( $data, $id );
    }

    public static function eliminar($id)
    {
        TabataModel::eliminarTabata($id);

    }


    public static function obtenerInformacionEjercicios()
    {
        $ejercicios = TabataModel::getEjercicios()->fetchAll();
        $data = array();
        foreach ( $ejercicios as $ejercicio )
        {
            $data[ $ejercicio['tipoeID'] ]['nombre'] = $ejercicio['tipoeNombre'];
            $data[ $ejercicio['tipoeID'] ]['ejercicios'][] = [
                'nombre'    => $ejercicio['ejercicioNombre'],
                'id'        => $ejercicio['ejercicioID']
            ];
        }
        return $data;
    }




    public static function getTabataByID( $id )
    {
        return TabataModel::obtener_tabata( $id, UserSesion::getID() );
    }
}