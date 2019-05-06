<?php
require_once (__DIR__.'/../model/tabata.php');

class TabataController {


    public static function tabataById( $id )
    {
        return TabataModel::obtenerTabta( $id )->fetchAll();
    }


    public static function crearTabata( $requestData )
    {
        session_start();
        $data = Array();
        $data['tPreparacion'] =( $requestData['preparation']['min'] * 60 ) + $requestData['preparation']['seg'];
        $data['tActividad'] = ( $requestData['work']['min'] * 60 ) + $requestData['work']['seg'];
        $data['tDescanso'] = ( $requestData['rest']['min'] * 60 ) + $requestData['rest']['seg'];
        $data['numSeries'] = intval($requestData['cycles']);
        $data['numRondas'] = intval($requestData['num']);
        $data['nombre_tabata'] = $requestData['nombre_tabata'];
        $data['idUsuario'] = $_SESSION['user_id'];
        return TabataModel::crear_tabata($data);
    }

    public static function eliminar($id)
    {
        TabataModel::eliminarTabata($id);

    }


    public static function obtenerTabataEjercicios()
    {
        return TabataModel::getTipoEjercicios()->fetchAll();
    }
}