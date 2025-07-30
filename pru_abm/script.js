$(document).ready(function () {
    // Alta
    $('#form-iva').on('submit', function (e) {
        e.preventDefault();
        $.post('acciones.php', $(this).serialize() + '&accion=agregar', function () {
            location.reload(); // O podés agregar la fila dinámicamente
        });
    });

    // Modificación en tiempo real
    $('.edit-nombre, .edit-porcentaje').on('blur', function () {
        let campo = $(this).hasClass('edit-nombre') ? 'nombre' : 'porcentaje';
        let valor = $(this).text();
        let id = $(this).closest('tr').data('id');

        $.post('acciones.php', {
            accion: 'editar',
            id: id,
            campo: campo,
            valor: valor
        });
    });

    // Baja
    $('.borrar').on('click', function () {
        if (!confirm("¿Seguro que querés eliminar este registro?")) return;
        let id = $(this).closest('tr').data('id');
        $.post('acciones.php', { accion: 'borrar', id: id }, function () {
            location.reload();
        });
    });
});
