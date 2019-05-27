<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar Contraseña</title>
    <link rel="icon" href="public/recursos/img/escudo.png">

    <link rel="stylesheet" href="../public/css/estilos.css">
    <link rel="stylesheet" href="../public/css/material-kit.css">
    <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />



</head>

<body class="inicio">

<div id="Rcontraseña">
    <form id="form-recuperacion"  method="POST">

        <h4 class="info-title text-white">Recuperar Contraseña</h4>

        <div class="input-group col-10 ml-auto mr-auto margin">
            <div class="input-group-prepend">

                <i class="fas fa-envelope"></i>

            </div>
            <input type="email" id="recuperacion_mail" name="recuperacion_mail"  class="form-control" placeholder="correo" autocomplete="off" aria-label="Username" required aria-describedby="basic-addon1" style="color:white">
        </div>


        <div class="alert alert-danger " style="display: none;" id="alert-form">
            <div class="container">
                <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                <span id="text-alert"></span>
            </div>
        </div>
        <br>
        <div class="footer text-center ">
            <button type="submit" class="btn btn-info btn-round" id="ingresar">Enviar</button>
        </div>



    </form>
</div>

<script src="../public/js/jquery-3.3.1.min.js"></script>




<script>

    let $alert_form = $('#alert-form');
    const $form = $('#form-recuperacion');

    $('#form-recuperacion').on('submit', ( e ) =>
    {

        e.preventDefault();

        let peticion = $.ajax('../views/async/recuperar_pass.php',{
            method: 'POST',
            data: $('#form-recuperacion').serialize(),
            dataType: 'JSON'
        });


        peticion.done(( data ) =>
        {
            console.log('pasa por aca');
            if(data.enviado){
                swal ( {
                    title: "Su contraseña fue enviada con exito!",
                    icon: "success",
                } ) ;
                $form[0].reset();

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
