<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de tabata</title>
    <?php include  'common/head.php'?>


</head>
<body>

<?php include 'common/nav.php';
?>
<div class="text-center h1">Lista Tabata</div>

<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="10%"></td>
                    <td width="70%">
                        <h4><a href="#" class="font-weight-bold link">Nombre del tabata</a></h4>
                    </td>
                    <td width="20%">
                        <button class="btn btn-warning btn-sm btn-round">Editar</button>
                        <button class="btn btn-danger btn-sm btn-round">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>