<?php
require_once (__DIR__.'/../model/tabata.php');

class TabataController {


    public static function tabataById( $id )
    {
        return TabataModel::obtenerTabta( $id )->fetchAll();
    }


    public static function crearTabata()
    {

    }


    public static function obtenerTabataEjercicios()
    {
        return TabataModel::getTipoEjercicios()->fetchAll();
    }
}