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
    include_once './../controller/tabata.controller.php';

    $tabatas = TabataController::tabataByUserId( UserSesion::getID() );


?>



<div class="text-center h1">Lista Tabata</div>
<div class="text-right pb-5 pr-5">
    <a href="crearTabata.php" class="btn btn-success btn-sm btn-round text-white  " >Crear tabata</a>
</div>
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
                <?php foreach ( $tabatas as $tabata ){ ?>
                    <tr>
                        <td width="10%"><?= $tabata['tabataID'] ?></td>
                        <td width="70%">
                            <h4><a href="mostrar_tabata.php?id=<?=$tabata['tabataID']?>" class="font-weight-bold link"><?= $tabata['tabataNombre'] ?></a></h4>
                        </td>
                        <td width="20%">
                            <a      href="editar_tabata.php?id=<?=$tabata['tabataID']?>"
                                    class="btn btn-warning btn-sm btn-round text-white">Editar</a>

                            <a href="async/eliminar.php?id=<?=$tabata['tabataID']?>">
                                <button class="btn btn-danger btn-sm btn-round">Eliminar</button></a>

                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>