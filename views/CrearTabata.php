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

    <div class="text-center h1 mb-4"> Crear Tabata </div>

    <?php include 'tabata/principal.php' ?>

    <div class="mt-5 mb-5 container">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Ciclo #</th>
                    <th> Ejercicio</th>
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

