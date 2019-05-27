<?php
 include_once 'conexion.php';

class User extends DB {
    private $correo;
    private $nombre;

    public function userExists($user,$pass){
        $md5pass= md5($pass);
        
        $query = $this->connect()->prepare("SELECT * FROM usuario WHERE correo =:user AND password =:pass");
        $query->execute(['user'=>$user,'pass'=>$pass]);
        
        if($query->rowCount()){

            $user=$query->fetch();
            if( $user['habilitado'] == '0'){
                return $user;
            }else{
                return false;
            }
        }else{
            return false;
           
        }
    }



    public static function  getExistingUser($user)
    {
        $query = self::connect()->prepare("SELECT * FROM usuario WHERE correo =:user");
        $query->execute(['user'=>$user]);

        if($query->rowCount()){

            return $query->fetch();

        }else{
            return false;

        }
    }

    public static function  getExistingUser_id($id)
    {
        $query = self::connect()->prepare("SELECT * FROM usuario WHERE id =:id");
        $query->execute(['id'=>$id]);

        if($query->rowCount()){

            return $query->fetch();

        }else{
            return false;

        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE correo =:correo ');
        $query->execute(['correo'=>$user]);

        foreach($query as $currentUser){
            $this->nombre= $currentUser['nombre'];
            $this->correo= $currentUser['correo'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public  static  function editarPerfil($nombre,$pass,$id,$foto,$hab){
       $query = self::connect()->query("UPDATE usuario SET nombre='$nombre',password = '$pass',foto = '$foto',habilitado='$hab' WHERE  id= $id" );
       $user=self::getExistingUser_id($id);
       UserSesion::setCurrentUser($user);
       return true;

    }
    public static function registroUser($datos,$tabla){
      if(self::getExistingUser($datos['mail']))
      {
          return false;
      }
        $consulta=  self::connect()->prepare("INSERT INTO $tabla (id,nombre, correo, password, telefono,
          fechanac , sexo, pesokg) VALUES(null,:nombre,:correo,:password,:telefono,:fecha,:sexo,:peso)");
        $consulta->bindParam(':nombre',$datos['name']);
        $consulta->bindParam(':correo',$datos['mail']);
        $consulta->bindParam(':password',$datos['pass']);
        $consulta->bindParam(':telefono',$datos['telefono']);
        $consulta->bindParam(':fecha',$datos['fechaNac']);
        $consulta->bindParam(':sexo',$datos['sexo']);
        $consulta->bindParam(':peso',$datos['peso']);
        //return true;
        if($consulta->execute()){
            return true;
        }

    
    }

}


?>