<?php
include_once './../../email.php';
$correo = $_POST['recuperacion_mail'];
$user = User::getExistingUser($correo);
if (!$user) {
 echo  json_encode(['enviado' => false]);


} else {
    echo json_encode(['enviado' => true]);
    $pass = $user['password'];
    Email::enviarMail($correo,$pass);
}
