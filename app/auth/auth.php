 <?php


 include_once 'model/user.php';
 include_once  'controller/registro.controller.php';

class Auth{
    protected  static  $allow = ['Google','Facebook'];

    protected static  function  issetRequest(){
        if(isset($_GET['login'])){
            if(in_array($_GET['login'],self::$allow)){
                return true;
            }
        }
        return false;
    }

    public  static  function  getUserAuth(){
        if(self::issetRequest()){
            $servicio = $_GET['login'];

            $hybridAuth = new Hybrid_Auth(__DIR__."\config.php");
            $adapter = $hybridAuth->authenticate($servicio);

            $userProfile = $adapter->getUserProfile();
             self::storeUser($userProfile);
            header('Location: views/lista_tabata.php');

            die();
        }
    }

    public static  function  storeUser($socialUser)
    {
        $user = User::getExistingUser($socialUser->email);
        if(!$user){
            $user = array(
                'name' => $socialUser->firstName,
                'mail' => $socialUser->email,
                'pass' => '',
                'telefono' => '',
                'fechaNac' => '',
                'sexo' => '',
                'peso' => ''
            );
            RegistroController::registrar($user);

        }

       UserSesion::setCurrentUser($user);
    }


}

?>
