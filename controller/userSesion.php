<?php

include_once (__DIR__.'/../model/user.php');

session_start();

class UserSesion{

    public function __construct(){
        
    }

    public static function setCurrentUser($user){

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nombre'] = $user['nombre'];
    }

    public static function getCurrentUser(){
        return $_SESSION['user'];
    }
    
    public static function closeSesion(){
        session_unset();
        session_destroy();
    }

    public static function auth( $mail, $pass)
    {
        $db = new User();

        $userExits = $db->userExists($mail, $pass);

        if( $userExits )
        {
            self::setCurrentUser( $userExits );
            return [ 'encontrado' => true ];
        }

        return [ 'encontrado' => false ];
    }

    public static function getNombre()
    {
        return $_SESSION['nombre'];
    }

    public static function getID()
    {
        return $_SESSION['user_id'];
    }

    public static function privateRoute()
    {
        if( ! isset($_SESSION['user_id']) )
            header('Location: ../index.php');
    }
}

?>