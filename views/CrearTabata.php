<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear tabata</title>
    <?php include 'common/head.php'?>
</head>
<body>
    <?php include 'common/nav.php'?>

    <?php include 'tabata/principal.php' ?>

    <div class="mt-5 mb-5 container">
        <div class="input-group">
            <input class="form-control" id="nombre_tabata" value="" placeholder="Nombre del tabata"/>
        </div>
    </div>


    <div class="modal fade" id="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">Elegir Ejercicio</h5>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="select-tipo-ejercicio" class="col-form-label text-dark">Tipo ejercicio:</label>
                            <select type="text" class="form-control" id="select-tipo-ejercicio">
                                <option value="0">Seleccione el tipo ejercicio</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select-ejercicio" class="col-form-label text-dark">Ejercicio:</label>
                            <select class="form-control" id='select-ejercicio'>

                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="disminuirCiclos()" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_ejercicio_guardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 mt-3 container">
        <table class="table">
            <thead>
                <tr>
                    <th>Ciclo</th>
                    <th>Ejercicio</th>
                </tr>
            </thead>
            <tbody id="tabla-ejercicios-body">

            </tbody>
        </table>
    </div>

    <button class="btn btn-success btn-block" id="btn_crear">Crear</button>

    <script src="../public/js/crear_tabata.js"></script>

</body>
</html>

