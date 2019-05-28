<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Usuario</title>
    <?php
    include_once 'common/head.php';
    include_once 'common/nav.php';
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<br>

<div class="container col-md-4">
    <h3 class="text-center info-title text-dark" style="w">
        CREAR PERFIL
        <br><br>
    </h3>
    <!-- Default checked -->

    <form id="form-usuarios"  action="" method="POST"  >

        <div class="form-group">

            <label  class="info-title text-dark">Nombre completo</label>
            <input type="text" class="form-control" id="nombre" name="name"  autocomplete="off"  >

        </div>
        <div class="form-group">

            <label  class="info-title text-dark">fecha Nacimiento</label>
            <input type="date" class="form-control" id="fechaNac" name="fechaNac"  autocomplete="off"  >

        </div>

        <div class="form-group">

            <label  class="info-title text-dark">telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono"  autocomplete="off"  >

        </div>
        <div class="form-group">
            <div class="input-group-prepend">

                <span class="text-dark info-title">Sexo: </span>&nbsp;&nbsp;&nbsp;
                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M" checked>
                        M
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                &nbsp;&nbsp;&nbsp;

                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F" checked>
                        F
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>

            </div>

            <br><br>


        <div class="form-group">

            <label  class="info-title text-dark">Peso Kg</label>
            <input type="number" class="form-control" id="peso" name="peso"  autocomplete="off"  >

        </div>

        <div class="form-group">

            <label  class="info-title text-dark">Correo</label>
            <input type="email" class="form-control" id="mail" name="mail"  autocomplete="off"  >

        </div>


        <div class="form-group">
            <label  class="text-dark info-title">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" autocomplete="off" placeholder="Password">
        </div>



        <button type="submit" class="btn btn-primary" name="editar">Editar</button>
    </form>


    <script>
        const $form = $('#form-usuarios');

        $form.on('submit', ( e ) =>
        {
            e.preventDefault();
            let data = $form.serializeArray();
            let datos_formularios = {};

            data.forEach( function( element ){
                datos_formularios[ element.name ] = element.value;
            });
            let peticion = $.ajax('async/registro.php', {
                method: 'POST',
                dataType: 'JSON',
                data: { data: datos_formularios }
            });
            peticion.done( function ( data_respuesta ) {
                if(data_respuesta.registrado){
                    swal ( {
                        title: "Registrado con exito!",
                        icon: "success",
                    } ).then(( ) => {

                    });

                    $form[0].reset();
                }else if(!data_respuesta.registrado){
                    swal ( {
                        title: "Usuario ya existe!",
                        icon: "warning",
                    } ).then(( ) => {

                    });

                    $form[0].reset();
                }
            });
        });
    </script>


</body>
</html>



