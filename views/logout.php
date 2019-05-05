<?php
include_once __DIR__.'/../controller/userSesion.php';

UserSesion::closeSesion();

header("location: ../index.php");

?>