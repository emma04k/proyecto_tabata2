
$('#btn_crear').on('click', () =>
{

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
                            <select  class="form-control">
                                <option selected>Seleccione un tipo de ejercicio</option>
                                ${ html_tipo_ejercicios }
                            </select>
                        </div>
                        <div class="col">
                            <input class="form-control" id="text" type="text" placeholder="Nombre del ejercicio">
                        </div>
                    </td>
                </tr>
        `;
    }
    $tabla_ejercicios.html( html );
};

$('#text').change(function () {
    alert('Qlitos')
});



