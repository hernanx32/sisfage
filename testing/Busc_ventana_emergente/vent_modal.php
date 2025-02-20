<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda en MySQL</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h3>Buscar Cliente</h3>
    <input type="text" id="buscador" class="form-control" placeholder="Escriba un nombre y presione Enter">

    <div id="resultado" class="mt-3"></div>

    <!-- Modal -->
    <div class="modal fade" id="modalResultados" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Seleccione un Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <ul id="listaResultados" class="list-group"></ul>
          </div>
        </div>
      </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#buscador").keypress(function(event) {
                if (event.which == 13) {  // Tecla Enter
                    event.preventDefault();
                    let query = $("#buscador").val();
                    if (query.trim() === "") return;

                    $.getJSON("buscar.php", { query: query }, function(data) {
                        if (data.length === 0) {
                            $("#resultado").html("<p class='text-danger'>No se encontraron resultados.</p>");
                        } else if (data.length === 1) {
                            $("#resultado").html("<p class='text-success'>Cliente seleccionado: " + data[0].id_articulo + " (" + data[0].desc_larga + ")</p>");
                        } else {
                            $("#listaResultados").empty();
                            data.forEach(cliente => {
                                $("#listaResultados").append(`<li class='list-group-item' data-id='${cliente.id_articulo}'>${cliente.desc_larga} (${cliente.id_proveedor})</li>`);
                            });
                            $("#modalResultados").modal("show");
                        }
                    });
                }
            });

            $(document).on("click", "#listaResultados li", function() {
                let nombre = $(this).text();
                $("#resultado").html("<p class='text-primary'>Cliente seleccionado: " + nombre + "</p>");
                $("#modalResultados").modal("hide");
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
