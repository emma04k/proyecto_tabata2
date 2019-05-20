 <?php

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

            var_dump($userProfile);

            die();
        }
    }
}

?>
