<?php
    include_once ('../../controller/registro.controller.php');

    if( isset( $_POST['data' ] ) )
    {
        echo json_encode( RegistroController::registrar( $_POST['data']) );

    }