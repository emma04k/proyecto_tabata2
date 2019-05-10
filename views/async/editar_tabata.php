<?php
require_once '../../controller/tabata.controller.php';


 echo json_encode(TabataController::editar_Tabata($_POST['data'],$_GET['id']));
