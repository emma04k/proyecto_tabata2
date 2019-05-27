<?php
require_once '../../controller/tabata.controller.php';
require_once '../../model/user.php';




if(isset($_POST['editar'])){

    $tips = 'jpg';
    $type = array('image/jpeg'=>'jpg');
    $id =$_SESSION['user_id'];





    $nombreFoto = $_FILES['perfil']['name'];
    $ruta = $_FILES['perfil']['tmp_name'];
    $name = $id.'.'.$tips;

    $caja =$_POST['mi_caja'];

    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];



    if($caja=='on'){
        $hab=0;
    }else{
        $hab=1;
    }
    echo $hab;

    if($pass== '' ){
        $id=User::getExistingUser_id($id);
        $pass =$id['password'];

    }



    if($nombreFoto !=''){

        if (is_uploaded_file($ruta)) {
            $destino = "../../../proyecto_tabataphp/public/recursos/perfiles/" . $name;
            copy($ruta, $destino);
        }
        UserSesion::editarPerfil($nombre,$pass,$_SESSION['user_id'],$destino,$hab);
    }else{
        UserSesion::editarPerfil($nombre,$pass,$_SESSION['user_id'],$_SESSION['foto'],$hab);
    }


    header('location:../../views/editar_perfil.php');
}





