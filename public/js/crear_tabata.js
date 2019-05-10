

$('#btn_crear').on('click', () =>
{
    const nombre_tabata = $('#nombre_tabata').val();

    const peticion = $.ajax({
        url: 'async/crear_tabata.php',
        method: 'POST',
        dataType: 'JSON',
        data: { data: {...tabata.toJS(), nombre_tabata }}
    });

    peticion.done((data) =>
    {
        alert('Creado con exito');
        window.location.href = 'lista_tabata.php';
    });
});




const $tabla_ejercicios = $('#tabla-ejercicios-body');
const $select_tipo_ejercicio = $('#select-tipo-ejercicio');
const $btn_ejercicio_guardar = $('#btn_ejercicio_guardar');
const $select_ejercicio = $('#select-ejercicio');
let tipo_ejercicios = [];
let html_tipo_ejercicios;
let dataE = null;




const renderTipoEjercicios = ( ) =>
{
    let html = ' <option value="0">Seleccione el tipo ejercicio</option> ';
    for( let dat in dataE )
    {
        html += `<option value="${dat}">${ dataE[dat].nombre }</option>`;
    }

    return html;
};

const renderEjercicio = ( id ) =>
{
    let html = '<option value="0">Seleccione el ejercicio</option>';

    html += dataE[ id ].ejercicios.map( ( ej ) =>
    {
        return `<option value="${ ej.id }">${ ej.nombre }</option>`
    });

    return html;
};

const peticion = $.ajax({
    method: 'get',
    dataType: 'json',
    url: 'async/ejercicio_information.php'
});

peticion.done(( data ) =>
{
    dataE = data;


    $select_tipo_ejercicio.html(renderTipoEjercicios());


    $select_tipo_ejercicio.on('change', (e ) =>
    {
        $select_ejercicio.html( renderEjercicio( $select_tipo_ejercicio.val() ) );
    });
});


const renderTablaEjercicio = ( ) =>
{
    return tabata.e_types.map(( e, index ) =>
    {
        return `
                <tr>
                    <td width="10%">${ index + 1 }</td>
                    <td width="90%">${ e.nombre }</td>
                </tr>
        `;
    });
};

$btn_ejercicio_guardar.on('click', ( ) =>
{
    if ( $select_tipo_ejercicio.val() !== '0' && $select_ejercicio.val() !== '0')
    {
        const selectedE = $select_ejercicio.val();
        const ejercicio    = dataE[ $select_tipo_ejercicio.val() ].ejercicios.find( ( e ) => e.id === Number( selectedE ));
        tabata.e_types.push({ id: selectedE, nombre: ejercicio.nombre || ''});
        $('#modal').modal('hide');
        $tabla_ejercicios.html(renderTablaEjercicio());
    }
});
