<?php
require_once '../../model/user.php';
User::desactivarUser($_GET['id']);
header('location:../lista_user.php');


