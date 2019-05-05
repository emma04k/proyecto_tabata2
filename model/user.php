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

    public static function registroUser($datos,$tabla){
       
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
        }else{
            return false;
        }

    
    }

}


?>