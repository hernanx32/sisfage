<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Popup Modal</title>
  <style>
    /* Estilos del fondo del modal */
    .popup-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
      z-index: 1000;
    }

    /* Estilos del contenido del modal */
    .popup-content {
      position: fixed;
      top: 50%;
      left: 50%;
      width: 800px;
      height: 500px;
      background-color: white;
      transform: translate(-50%, -50%);
      padding: 20px;
      box-shadow: 0 0 10px #000;
      border-radius: 8px;
    }

    /* Botón para cerrar */
    .close-btn {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 50px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <input name="buscar" type="search" autofocus="autofocus" id="buscar" placeholder="Buscar Articulo" size="30" maxlength="30" >
  <input type="button" value="Buscar Articulo" onClick="mostrarPopup()">
	
  <!-- Modal -->
<div class="popup-overlay" id="popup">
    <div class="popup-content">
      <span class="close-btn" onclick="cerrarPopup()">&times;</span>
      <h2>Buscar Articulo</h2>


		
		
		
		
		<table width="790" border="1" align="center">
	  <tbody>
	    <tr>
	      <td><input name="bus_art_modal" type="text" id="bus_art_modal" size="30" maxlength="30"> <label for="filtro_campo">Campos:</label>
            <select name="filtro_campo" id="filtro_campo">
              <option value="id">Cod. Interno</option>
              <option value="cod_bar">Codigo de Barra</option>
              <option value="desc_larga" selected="selected">Descripción</option>
          </select>
          <input type="button" name="btn_buscar_modal" id="btn_buscar_modal" value="Buscar"></td>
        </tr>
	    <tr>
	      <td>Resultados</td>
        </tr>
  </tbody>
</table>
		


    </div>
  </div>

<script>
    function mostrarPopup() {
	//	OBTENEMOS EL VALOR DE CAMPO DE BUSQUEDA
	const nombre = document.getElementById('buscar').value;	
	document.getElementById('bus_art_modal').value = nombre;	
		
    document.getElementById('popup').style.display = 'block';

		//AL PRESIONAR ESCAPE CIERRA LA VENTANA	
		document.addEventListener("keydown", function(event) {
			if (event.key === "Escape") {
    		cerrarPopup();
  			}
		});	
		}

	
    function cerrarPopup() {
      document.getElementById('popup').style.display = 'none';
	}
	
	
	
	
//AL PRESIONAR ENTER EN EL CAMPO DE BUSQUEDA ME MUESTRE LA VENTANA 	
document.getElementById("buscar").addEventListener("keydown", function(event) {
  if (event.key === "Enter") {
    event.preventDefault(); // evita que se envíe un formulario si está dentro de uno
    mostrarPopup();
  }
});	

</script>

</body>
</html>
