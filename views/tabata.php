<?php require_once './../controller/userSesion.php';
UserSesion::privateRoute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabata</title>
 <?php include  'common/head.php'?>


</head>
<body>

<?php include 'common/nav.php';
      include 'tabata/principal.php';
?>



</body>
</html>