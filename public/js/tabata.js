function FormatNumber( num ) {
    return (num < 10) ? '0' + num : num;
}

class Contador {


    constructor( value ) {
        this.value = value;
        this.default();
    }

    default()
    {
        this._value = this.value;
    }

    reset()
    {
        this.value = this._value;
    }

    aumentar() {
        this.value++;

    }

    disminuir() {
        if(this.value !== 0){
            this.value--;

        }

    }
    toString()
    {
        return FormatNumber( this.value );
    }
}


class Timer {


    constructor(min , seg) {
        this.min = min;
        this.seg = seg;
        this.setDefault();
    }

    setDefault()
    {
        this._min = this.min;
        this._seg = this.seg;
    }

    disminuir() {
        if( this.isZero() )return;
        if (this.seg === 0) {
            this.min--;
            this.seg = 59;


        } else {
            this.seg--;
        }

    }
    
    aumentar()
    {
        if( this.seg >= 59 )
        {
            this.min ++;
            this.seg = 0;
        }else 
        {
            this.seg ++;
        }

    }

    isZero() {
        return this.min === 0 && this.seg === 0;
    }

    reset()
    {
        this.min = this._min;
        this.seg = this._seg;
    }

    toString()
    {
        return FormatNumber( this.min ) +':'+ FormatNumber(this.seg);
    }

    toJS()
    {
        return {
            min: this.min,
            seg: this.seg
        }
    }
}

    

class Tabata {

    constructor()
    {
        this.preparation    = new Timer(0,10);
        this.work           = new Timer(0,20);
        this.rest           = new Timer(0,10);
        this.cycles         = new Contador(0);
        this.num            = new Contador(1);
        this.prepare        = true;
        this.editing        = true;
        this.e_types         = [{ id: 1, nombre: 'Ejercicio1'}];
    }

    set( field, type )
    {
        if( type === 'aumentar')
        {
            this[ field ].aumentar();
        }else
        {
            this[ field ].disminuir();
        }
    }

    reset()
    {
        this.prepare = true;
        this.preparation.reset();
        this.rest.reset();
        this.cycles.reset();
        this.work.reset();
    }

    toJS()
    {
        return {
            preparation: this.preparation.toJS(),
            work: this.work.toJS(),
            rest: this.rest.toJS(),
            cycles: this.cycles.value,
            num: this.num.value,
            e_types: this.e_types
        }
    }
}

function refrescar() {
    $cont_ciclo.innerText=tabata.cycles.toString();
    $cont_tabata.innerText=tabata.num.toString();
    $time_prepare.innerText=tabata.preparation.toString();
    $time_descanso.innerText=tabata.rest.toString();
    $time_ejercicio.innerText=tabata.work.toString();
}


const $cont_ciclo = document.getElementById('cont-ciclo');
const $cont_tabata = document.getElementById('cont-tabata');
const $time_prepare = document.getElementById('time-prepare');
const $time_ejercicio = document.getElementById('time-ejercicio');
const $time_descanso = document.getElementById('time-descanso');

const $time_main = document.getElementById('time-main');
const $estado_tabata = document.getElementById('estado_tabata');
const $estado_ciclos = document.getElementById('estado_ciclos');
const $numero_tabata = document.getElementById('numero_tabatas');
const tabata = new Tabata();

$('.accion-btn').on('click', function (e) {
    const element = e.currentTarget;
    const toSet = element.parentNode.id;
    const tipo = element.getAttribute('tipo');
    tabata.set( toSet, element.getAttribute('tipo') );

    if( element.getAttribute)
        refrescar();

    if( toSet === 'cycles' && tabata.editing)
    {
        if( tipo === 'aumentar')
            tabata.e_types.push({ id: 0, nombre: ''});
        else
            tabata.e_types.pop();

        $('#modal').modal('show');
    }

} );


const disminuirCiclos = ( )=>
{
    tabata.cycles.disminuir();
    tabata.e_types.pop();
    refrescar();
};

$('#modal').modal({
    backdrop: 'static',
    keyboard: false
});

let interval = null;


$('#btn-empezar').on('click',function (e) {
    if( ! interval )
    {
        $('.accion-btn').hide(100);
        interval = setInterval(HandleTabata, 1000);
    }

});

$('#btn-pausa').on('click',function (e) {
    if( interval )
    {
        clearInterval(interval);
        interval=null;

    }
});

$('#btn-detener').on('click', function (e) {
    if( interval )
    {
        tabata.num.reset();
        tabata.reset();
        $('.accion-btn').show(100);
        clearInterval(interval);
        interval = null;
        $time_main.innerText = '00:00';
    }
});


function HandleTabata() {
    if( tabata.num > 0 )
    {
        $numero_tabata.innerText = ( tabata.num._value - tabata.num.value + 1) + ' / ' + tabata.num._value;
        if( tabata.prepare )
        {
            if( ! tabata.preparation.isZero() )
            {
                tabata.preparation.disminuir();
                $time_main.innerText = tabata.preparation.toString();
                $estado_tabata.innerText = 'PREPARACIÓN';
            }else
            {
                console.log('Tabata prepare');
                tabata.prepare = false;
            }
        }else
        {
            if( tabata.cycles.value !== 0 )
            {
                $estado_ciclos.innerText = (tabata.cycles._value - tabata.cycles.value + 1) +' / ' + tabata.cycles._value;

                if( ! tabata.work.isZero() )
                {
                    tabata.work.disminuir();
                    $time_main.innerText = tabata.work.toString();
                    $estado_tabata.innerText = 'EJERCICIO';
                }else if( !tabata.rest.isZero() )
                {
                    tabata.rest.disminuir();
                    $time_main.innerText = tabata.rest.toString();
                    $estado_tabata.innerText = 'DESCANSO';
                }else
                {
                    tabata.work.reset();
                    tabata.rest.reset();

                    tabata.cycles.value--;
                }
            }else {
                tabata.num.value --;
                tabata.reset();

            }
        }
    }else
    {
        tabata.num.reset();
        tabata.reset();
        $('.accion-btn').show(100);
        clearInterval(interval);
        interval = null;
        $estado_tabata.innerText = '00:00';
    }
}

refrescar();