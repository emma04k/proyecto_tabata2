<?php
require_once ("vendor/autoload.php");
require_once ("app/auth/auth.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesion</title>
    <link rel="icon" href="public/recursos/img/escudo.png">

    <link rel="stylesheet" href="public/css/estilos.css">
    <link rel="stylesheet" href="public/css/material-kit.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   
    
    
</head> 

<body class="inicio">

    <div id="login">
        <form id="form-login"  method="POST">
         
            <h4 class="info-title text-white">BIENVENIDO</h4>

                <div class="input-group col-10 ml-auto mr-auto margin">
                        <div class="input-group-prepend">
                
                              <i class="fas fa-envelope"></i>
                           
                        </div>
                        <input type="email" id="mail" name="mail"  class="form-control" placeholder="correo" autocomplete="off" aria-label="Username" required aria-describedby="basic-addon1" style="color:white">
                </div>

                <div class="input-group col-10 ml-auto mr-auto margin">
                        <div class="input-group-prepend">
                                <i class="fas fa-lock"></i>
                        </div>
                    
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="password" aria-label="Username" autocomplete="off"aria-describedby="basic-addon1" required>
                </div>
                <div class="alert alert-danger " style="display: none;" id="alert-form">
                        <div class="container">
                            <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                            <span id="text-alert"></span>
                        </div>
               </div>
                <br>
                <div class="footer text-center ">
                    <button type="submit" class="btn btn-info btn-round" id="ingresar">Ingresar</button>
                </div>
            <a href="./views/formulario.php"  >Registrarse</a>
            <br><br>
            <?php
            Auth::getUserAuth();
            ?>
            <a href="?login=Facebook">Iniciar Sesion con Google</a>
            <br>
            <a href="#">Olvidaste la contraseña</a>



                
           

         

        </form>
    </div>
    
    <script src="public/js/jquery-3.3.1.min.js"></script>
    
    


    <script>

        let $alert_form = $('#alert-form');

        $('#form-login').on('submit', ( e ) => 
        {
            e.preventDefault();

            let peticion = $.ajax('views/async/auth.php', {
                method: 'POST',
                data: $('#form-login').serialize(),
                dataType: 'JSON'
            });


            peticion.done(( data ) => 
            {

                if( data.encontrado )
                {
                    console.log('Pasa por aca');
                    window.location.href = "./views/lista_tabata.php";
                }else 
                {
                    $alert_form.text('Usuario no encontrado');
                    $alert_form.show(100);

                }
            });
        });
    </script>

</body>
</html>