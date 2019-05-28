<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Rviewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    <link rel="icon" href="../public/recursos/img/escudo.png">

    <link rel="stylesheet" href="../public/css/estilos.css">
    <link rel="stylesheet" href="../public/css/material-kit.css">
    <link rel="stylesheet" href="../public/css/material-kit.min.css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script>

</head>
<body class="inicio">
    <div id="formulario">
        <form id="form-registro" method="POST" >
                

            <h4 class="info-title text-white">REGISTRO</h4>

            <div class="input-group col-10 ml-auto mr-auto margin-top">
                <div class="input-group-prepend">
        
                      <i class="fas fa-user"></i>
                   
                </div>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre Completo" autocomplete="off" required aria-describedby="basic-addon1" style="color:white">
            </div>

            <div class="input-group col-10 ml-auto mr-auto margin-top">
                <div class="input-group-prepend">
        
                    <i class="fas fa-calendar-day"></i>
                   
                </div>
                <input type="date" id="fechaNac"  name="fechaNac" class="form-control" placeholder="Fecha de nacimiento" autocomplete="off"  required aria-describedby="basic-addon1" style="color:white">
             </div>
             
             <div class="input-group col-10 ml-auto mr-auto margin-top">
                <div class="input-group-prepend">
        
                    <i class="fas fa-phone"></i>
                   
                </div>
                <input type="number" id="telefono" name="telefono" class="form-control" placeholder="telefono" autocomplete="off"  required aria-describedby="basic-addon1" style="color:white">
             </div>

             <div class="input-group col-10 ml-auto mr-auto margin-top">
                <div class="input-group-prepend">
        
                    <i class="fas fa-restroom"></i>

                    <span style="color:white" >Sexo: </span>&nbsp;&nbsp;&nbsp;
                   
                </div>

                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M">
                        M&nbsp;&nbsp;
                        <span class="circle ">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>

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

             <div class="input-group col-10 ml-auto mr-auto margin-top">
                <div class="input-group-prepend">
        
                    <i class="fas fa-weight"></i>
                </div>
                <input type="number" id="peso" name="peso" class="form-control" placeholder="Peso kg" autocomplete="off"  required aria-describedby="basic-addon1" style="color:white">
             </div>


                <div class="input-group col-10 ml-auto mr-auto margin-top">
                        <div class="input-group-prepend">
                
                              <i class="fas fa-envelope"></i>
                           
                        </div>
                        <input type="email" id="mail" name="mail" class="form-control" placeholder="Correo" autocomplete="off"  required aria-describedby="basic-addon1" style="color:white">
                </div>



                <div class="input-group col-10 ml-auto mr-auto margin-top">
                        <div class="input-group-prepend">
                                <i class="fas fa-lock"></i>
                        </div>
                    
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña"  autocomplete="off"aria-describedby="basic-addon1" required>
                </div>

                
                <div class="input-group col-10 ml-auto mr-auto margin-top">
                    <div class="input-group-prepend">
                            <i class="fas fa-lock"></i>
                    </div>
                
                    <input type="password" id="passR" name="passR" class="form-control" placeholder="Repetir Contraseña"  autocomplete="off"aria-describedby="basic-addon1" required>
                </div>

                <div class="alert alert-danger " style="display: none;" id="alert-form">
                        <div class="container">
                            <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                            <span id="text-alert"></span>
                        </div>
               </div>
                <br>

                <div class="footer text-center ">
                    <button type="submit" class="btn btn-success btn-round" id="ingresar">Registrar</button>
                </div>

              
                
        
        </form>
    </div>

 


    
    <script src="../public/js/jquery-3.3.1.min.js"></script>

    <script>
        const $form = $('#form-registro');
        let $alert_form = $('#alert-form');
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
                    $alert_form.text('Ya existe un usuario registrado con este correo');
                    $alert_form.show(90);
                    $form[0].reset();
                }
            });
        });
    </script>
</body>
</html>