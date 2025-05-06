<?php
// Suponiendo que esto forma parte del archivo Formularios.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario con Búsqueda</title>
</head>
<body>

<h2>Formulario de Cliente</h2>
<form>
    <label for="id_cliente">ID Cliente:</label>
    <input type="text" id="id_cliente" name="id_cliente">
    <br>

    <label for="nombre_cliente">Nombre:</label>
    <input type="text" id="nombre_cliente" name="nombre_cliente" readonly>
    <br>

    <label for="direccion_cliente">Dirección:</label>
    <input type="text" id="direccion_cliente" name="direccion_cliente" readonly>
    <br>

    <button type="button" onclick="abrirPopupBusqueda()">Buscar</button>
</form>

<!-- Popup para búsqueda -->
<div id="popupBusqueda" style="display:none; position:fixed; top:20%; left:30%; background:white; border:1px solid black; padding:20px; z-index:1000;">
    <h3>Buscar Cliente</h3>
    <input type="text" id="busquedaCliente" placeholder="Ingrese nombre, dirección o ID">
    <button onclick="buscarCliente()">Buscar</button>
    <button onclick="cerrarPopup()">Cerrar</button>
    <div id="resultadosCliente" style="margin-top:10px;"></div>
</div>

<script>
function abrirPopupBusqueda() {
    document.getElementById('popupBusqueda').style.display = 'block';
    document.getElementById('resultadosCliente').innerHTML = '';
    const id = document.getElementById('id_cliente').value;
    if (id && !isNaN(id)) {
        document.getElementById('busquedaCliente').value = id;
        buscarCliente();
    } else {
        document.getElementById('busquedaCliente').value = '';
    }
}

function cerrarPopup() {
    document.getElementById('popupBusqueda').style.display = 'none';
}

function buscarCliente() {
    const criterio = document.getElementById('busquedaCliente').value;
    fetch('buscar_cliente.php?criterio=' + encodeURIComponent(criterio))
        .then(res => res.text())
        .then(data => {
            document.getElementById('resultadosCliente').innerHTML = data;
        });
}

function seleccionarCliente(id, nombre, direccion) {
    document.getElementById('id_cliente').value = id;
    document.getElementById('nombre_cliente').value = nombre;
    document.getElementById('direccion_cliente').value = direccion;
    cerrarPopup();
}
</script>

</body>
</html>