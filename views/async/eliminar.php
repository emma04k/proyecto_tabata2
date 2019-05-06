<?php
include_once ('../../controller/tabata.controller.php');

echo json_encode( TabataController::eliminar($_GET['id']));
header('location: ../../views/lista_tabata.php');

