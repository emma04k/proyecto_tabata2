<?php

require_once (__DIR__.'/../model/user.php');
class RegistroController{
    public static function registrar($data){

        if(User::registroUser($data,'usuario')){
            return [ 'registrado' => true ];
        }else{
           return [ 'registrado' => false ];
        }
    }
        

}


?>