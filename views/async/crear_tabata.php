<?php
    require_once './../../controller/tabata.controller.php';


    echo json_encode(TabataController::crearTabata( $_POST['data'] ));