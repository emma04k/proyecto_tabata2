

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

});