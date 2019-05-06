
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
let tipo_ejercicios = [];
let html_tipo_ejercicios;

const peticion = $.ajax({
    method: 'get',
    dataType: 'json',
    url: 'async/tipo_ejercicio.php'
});

peticion.done(( data ) =>
{
    tipo_ejercicios = data || [];
    html_tipo_ejercicios = renderTipoEjercicios();
    renderElegirEjercicios();

    $('.form-e-name').on('change', function () {
        const name = $( this ).val();
        console.log(name)
    });
    $('.form-e-type').on('change', function () {
        const id = $( this ).val();
        const pos = $( this ).attr('pos');

        console.log('Ql')
    });
});



const renderTipoEjercicios = () =>
{
    const html = tipo_ejercicios.map(( tp ) =>
    {
        return `<option value="${tp.id}">${tp.nombre}</option>`
    });

    return html;
};

const renderElegirEjercicios = ( ) =>
{
    let html = '';

    for( let a = 0;  a < tabata.cycles.value ; a++ )
    {
        html += `
                 <tr>
                    <td>${a+1}</td>
                    <td class="row">
                        <div class="col">
                            <select  class="form-control form-e-type" pos="${a}">
                                <option selected>Seleccione un tipo de ejercicio</option>
                                ${ html_tipo_ejercicios }
                            </select>
                        </div>
                        <div class="col">
                            <input class="form-control form-e-name" pos="${a}" type="text" placeholder="Nombre del ejercicio">
                        </div>
                    </td>
                </tr>
        `;
    }
    $tabla_ejercicios.html( html );
};

