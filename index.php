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

}/*else if(isset($_POST['mail']) && isset($_POST['pass'])){
 //echo 'validacion';
 $userForm = $_POST['mail'];
 $passForm = $_POST['pass'];

 if($user->userExists($userForm,$passForm)){
     $userSesion->setCurrentUser($userForm);
     $user->setUser($userForm);
     include_once 'views/tabata.php';
 }else{
     $errorLogin='Contraseña o/y Correo  no coinciden';
     include_once 'views/login.php';
 }


}else{
*/
include_once 'views/login.php'; 





?>