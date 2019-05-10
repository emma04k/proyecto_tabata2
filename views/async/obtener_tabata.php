<?php
include_once ('../../controller/tabata.controller.php');


echo json_encode( TabataController::getTabataByID( $_GET['id'] ) );

