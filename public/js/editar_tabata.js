$('.accion-btn').show(100);




$('#btn_editar').on('click', ( ) =>
{
    const nombre_tabata = $('#nombre_tabata').val();

    const peticion = $.ajax({
        url: 'async/editar_tabata.php?id='+idTabata,
        method: 'POST',
        dataType: 'JSON',
        data: { data: {...tabata.toJS(), nombre_tabata }}
    });

    peticion.done((data) =>
    {
        swal ( {
            title: "Editado con exito!",
            icon: "success",
        } ) ;
        window.location.href = 'lista_tabata.php';
    });
});