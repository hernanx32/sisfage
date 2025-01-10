<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador con MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <label for="dato" class="form-label">Buscar dato</label>
        <div class="input-group">
            <input type="text" id="dato"  placeholder="Selecciona un dato" readonly>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buscadorModal">Buscar</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="buscadorModal" tabindex="-1" aria-labelledby="buscadorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buscadorLabel">Buscar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="buscar" class="form-control mb-3" placeholder="Escribe para buscar">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody id="resultados">
                            <!-- Aquí se cargarán los resultados -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#buscar').on('input', function() {
                let query = $(this).val();
                $.ajax({
                    url: 'buscar.php',
                    method: 'POST',
                    data: { query: query },
                    success: function(data) {
                        $('#resultados').html(data);
                    }
                });
            });

            $(document).on('click', '.seleccionar', function() {
                let dato = $(this).data('dato');
                $('#dato').val(dato);
                $('#buscadorModal').modal('hide');
            });
        });
    </script>
</body>
</html>