<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Select con búsqueda nativa</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>
    <h1>Selecciona una opción</h1>
<?php
// Conexión a la base de datos MySQL
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "bases";

$conn = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los datos desde MySQL
$sql = "SELECT id_rubro_sub, desc_rubro_sub FROM rubro_sub";
$resultado = $conn->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Crear el <select> dinámico
    echo '<select id_rubro_sub="miSelect" style="width: 200px;">';
    while ($fila = $resultado->fetch_assoc()) {
        echo '<option value="' . $fila['id_rubro_sub'] . '">' . $fila['desc_rubro_sub'] . '</option>';
    }
    echo '</select>';
} else {
    echo "No se encontraron rubro.";
}

// Cerrar la conexión
$conn->close();
?>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Inicializar Select2 en el select dinámico
    $('#miSelect').select2({
        placeholder: "Busca un producto",
        allowClear: true
    });
});
</script>

   <select name="Seleccion">
     <option value="1">1-valor</option>
     <option value="2">2-prueba</option>
     <option value="3">3-acceder</option>
     <option value="4">4-numeros</option>
     <option value="5">5-letras</option>
     <option value="6">6-codigo</option>
     <option value="7">7-php</option>
     <option value="8">8-java</option>
     <option value="9">9-script</option>
     <option value="10">10-blanco</option>
     <option value="11">11-azul</option>
     <option value="12">12-rojo</option>
     <option value="13">13-negro</option>
     <option value="14">14-proveedores</option>
   </select> 
    
</body>
</html>
</body>
</html>