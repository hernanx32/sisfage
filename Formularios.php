
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario con Búsqueda</title>
</head>
<body>

<h2>Formulario de Cliente</h2>
 <form id="form_cli" method="GET" action="#">
    <label for="id_cliente">ID Cliente:</label>
    <input name="id_cliente" type="text" id="id_cliente" value="1" size="5" maxlength="5" readonly="readonly"><button type="button" onclick="abrirPopupBusqueda()">Buscar</button>
    <br>

    <label for="nombre_cliente">Nombre:</label>
    <input name="nombre_cliente" type="text" id="nombre_cliente" value="Consumidor Final" readonly>
    <br>

    <label for="direccion_cliente">Dirección:</label>
    <input name="direccion_cliente" type="text" id="direccion_cliente" value="Sin Domicilio" readonly>
    <br>
</form>
	
	
 <!-- Popup para búsqueda -->
<div id="popupBusqueda" style="display:none; position:fixed; top:20%; left:30%; background:white; border:1px solid black; padding:20px; z-index:1000;">
    <h3>Buscar Cliente</h3>
    <input type="text" id="busquedaCliente" name="busquedaCliente" placeholder="Ingrese nombre, dirección o ID" autocomplete="off" onFocus="buscarCliente()" onKeyPress="buscarCliente()">
   <!-- <button onclick="buscarCliente()">Buscar</button> -->
  <button onclick="cerrarPopup()">Cerrar</button>
    <div id="resultadosCliente" style="margin-top:10px;"></div>
</div>


	
	
<script>
function abrirPopupBusqueda() {
    document.getElementById('popupBusqueda').style.display = 'block';
	 setTimeout(() => inputBusqueda.focus(), 100); // Establece el foco al campo
    document.getElementById('resultadosCliente').innerHTML = '';
    const id = document.getElementById('id_cliente').value;
	const inputBusqueda = document.getElementById('busquedaCliente');
		
	document.getElementById('busquedaCliente').value = '';

	setTimeout(() => inputBusqueda.focus(), 100);
	

	
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
