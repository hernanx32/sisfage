<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLTE DataTable Example</title>
    <!-- jQuery -->
    
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- AdminLTE (opcional, si quieres usar estilos de AdminLTE) -->
    <link rel="stylesheet" href="path/to/adminlte.min.css">
</head>


<body>
    <table border="1" id="example" class="display" style="width:1200px">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Posición</th>
                <th>Oficina</th>
                <th>Edad</th>
                <th>Fecha de inicio</th>
                <th>Salario</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
		    <tr>
                <td>Prueba1</td>
                <td>Architect</td>
                <td>Linux</td>
                <td>53</td>
                <td>2011/04/25</td>
                <td>$510,400</td>
            </tr>
            <!-- Más filas -->
        </tbody>
    </table>

    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[3, "desc"]]
        });
    });
    </script>
</body>
</html>