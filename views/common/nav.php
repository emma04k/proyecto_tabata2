<?php require_once './../controller/userSesion.php';
UserSesion::privateRoute();
?>
<nav class="navbar navbar-expand-lg  row text-white info-title" id="fondo-color">
    <!-- Navbar content -->

    <div class="col-md-3">
        <img src="../public/recursos/img/escudo.png" id="escudo" alt="escudo">

        <div id="reloj" style="margin-left: 24%">
            <span id="horas"></span>
            <span>:</span>
            <span id="minutos"></span>
            <span>:</span>
            <span id="segundos"></span>
            <span id="tipo"></span>
        </div>

        <div id="fecha" style=" margin-left: 10%;">
            <span id="dia"></span>
        </div>


    </div>
    <div class="col-md-6 text-center">
        <p class="tamaño-titulo">FACULTAD DE INGENIERIA DE SISTEMAS</p>

        <p>Programacion web grupo 1</p>


    </div>
    <div class="col-md-2">

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">

                </li>
                <li class="nav-item dropdown">
                    <a id="user_name" class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <?php

                        echo UserSesion::getNombre();
                        ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fas fa-cog icon-margin  text-info"></i> <span
                                class="text-center">Configuracion</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i
                                class="fas fa-sign-out-alt icon-margin text-info"></i>Cerrar sesión</a>
                    </div>
                </li>

            </ul>
        </div>


    </div>


</nav>

<div id="contenedor">

</div>
<script src="../public/js/reloj.js"></script>
