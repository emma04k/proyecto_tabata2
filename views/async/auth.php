<?php
if( !isset($_POST['mail']) || !isset($_POST['pass'])) exit;

include_once './../../controller/userSesion.php';

$userForm = $_POST['mail'];
$passForm = $_POST['pass'];

echo json_encode(UserSesion::auth($userForm, $passForm));