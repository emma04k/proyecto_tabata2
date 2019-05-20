<?php
include_once 'model/user.php';
include_once 'controller/userSesion.php';
include_once 'controller/registro.controller.php';

$user = new User();
$userSesion = new UserSesion();
$registro = new RegistroController();





if(isset($_SESSION['user'])){

    $user->setUser($userSesion->getCurrentUser());
    header('Location: views/tabata.php');

}
include_once 'views/login.php'; 





?>