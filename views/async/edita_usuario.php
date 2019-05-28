<?php
include_once './../../model/user.php';

if( !isset($_POST['data'] ) ) exit;

User::EditUser($_POST['data'], (int)($_GET['id'] ));

ob_clean();
echo json_encode(['editado' => true ]);
