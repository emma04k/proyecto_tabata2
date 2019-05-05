<main id="main">
    <div class="row">
        <div class="col col-md-5 mt-3">
            <div class="container">
                <small>
                    CICLOS
                </small>
                <div class="pb-3">
                    <small id="estado_ciclos" >

                    </small>
                </div>
                <div>
                    <small>
                        TABATA
                    </small>
                    <div>
                        <small id="numero_tabatas">

                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-md-2  text-center text-white info-title mb-1 pt-3 " id="tabata-title">TABATA
        </div>
        <div class="col col-md-3 offset-md-2 text-right">
            <div>
                <button class="btn btn-round btn-outline-success" id="btn-empezar">
                    <i class="material-icons text-success">play_arrow</i>
                    Empezar
                </button>
            </div>
            <div>
                <button class="btn btn-round btn-outline-warning" id="btn-pausa">
                    <i class="material-icons text-warning">pause</i>
                    Pausar
                </button>
            </div>
            <div>
                <button class="btn btn-round btn-outline-danger" id="btn-detener">
                    <i class="material-icons text-danger">stop</i>
                    Detener
                </button>
            </div>
            <div class="mt-3">

            </div>
        </div>
    </div>

    <div class="text-center" id="estado_tabata">

    </div>

    <div class="text-center ">
        <h1 class="timer-text" id="time-main">00:00</h1>
    </div>
    <div class="text-center">
    </div>
    <hr style="background: white"/>
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <div class="row">
                    <div class="col col-md-3 text-center">
                        <h3 class="">Ciclos</h3>
                        <h3 class="timer-text" id="cont-ciclo">00</h3>
                        <div id="cycles">
                            <i class="btn btn-sm btn-success btn-round fas fa-plus accion-btn" tipo="aumentar"></i>
                            <i class="btn btn-sm btn-danger btn-round fas fa-minus accion-btn" tipo="disminuir"></i>
                        </div>
                    </div>
                    <div class="col col-md-3 offset-md-5 text-center">
                        <h3 class="">Tabatas</h3>
                        <h3 class="timer-text" id="cont-tabata">00</h3>
                        <div id="num">
                            <i class="btn btn-sm btn-success btn-round fas fa-plus accion-btn accion-btn"
                               tipo="aumentar"></i>
                            <i class="btn btn-sm btn-danger btn-round fas fa-minus accion-btn accion-btn"
                               tipo="disminuir"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-md-8">
                <div class="row">
                    <div class="col col-md-3 offset-md-1 text-center">
                        <h3>Preparación</h3>
                        <h2 class="timer-text" id="time-prepare">00:00</h2>
                        <div id="preparation">
                            <i class="btn btn-sm btn-danger btn-round fas fa-minus accion-btn" tipo="disminuir"></i>
                            <i class="btn btn-sm btn-success btn-round fas fa-plus accion-btn" tipo="aumentar"></i>
                        </div>
                    </div>
                    <div class="col col-md-3 offset-md-1 text-center">
                        <h3>Ejercicio</h3>
                        <h2 class="timer-text" id="time-ejercicio">00:00</h2>
                        <div id="work">
                            <i class="btn btn-sm btn-danger btn-round fas fa-minus accion-btn" tipo="disminuir"></i>
                            <i class="btn btn-sm btn-success btn-round fas fa-plus accion-btn" tipo="aumentar"></i>
                        </div>
                    </div>

                    <div class="col col-md-3 offset-md-1 text-center">
                        <h3>Descanso</h3>
                        <h2 class="timer-text" id="time-descanso">00:00</h2>
                        <div id="rest">
                            <i class="btn btn-sm btn-danger btn-round fas fa-minus accion-btn" tipo="disminuir"></i>
                            <i class="btn btn-sm btn-success btn-round fas fa-plus accion-btn" tipo="aumentar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="../public/js/reloj.js"></script>
<script src="../public/js/tabata.js"></script>

