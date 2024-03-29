$('.accion-btn').hide(100);

tabata.editing = false;

const url = new URL( window.location.href );
const idTabata = url.searchParams.get('id');
const $editar_nombre = $('#nombre_tabata');

const peticionTabata = $.ajax({
    url: 'async/obtener_tabata.php?id='+idTabata,
    method:'GET',
    dataType: 'JSON',
});

peticionTabata.done( ( data ) =>
{
    tabata.cycles.set( data.cycles );
    tabata.num.set(data.num);
    tabata.preparation.set(data.preparation);
    tabata.work.set(data.work);
    tabata.rest.set(data.rest);
    tabata.e_types = data.e_types;
    refrescar();
    if( !tabata.editing ) //Saber si esta en modo editar
    {
        let renderTablaEjercicio = ( ) =>
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

        $editar_nombre.val( data.nombre );
        $('#tabla-ejercicios-body').html(renderTablaEjercicio());
    }

});