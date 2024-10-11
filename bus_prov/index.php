<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Proveedor</title>
  <style>
    .result-item {
      cursor: pointer;
      padding: 5px;
      border: 1px solid #ccc;
    }
    .result-item:hover {
      background-color: #f0f0f0;
    }
  </style>
  <script>
    function buscarProveedor() {
      const buscarTermino = document.getElementById("Buscar_proveedor").value;

      // Enviar la solicitud AJAX a PHP
      if (buscarTermino) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "buscar.php?buscar=" + encodeURIComponent(buscarTermino), true);
        xhr.onload = function () {
          if (this.status === 200) {
            const resultados = JSON.parse(this.responseText);
            const resultadosDiv = document.getElementById("resultados");
            resultadosDiv.innerHTML = ''; // Limpiar resultados anteriores

            // Mostrar los resultados
            resultados.forEach(proveedor => {
              const div = document.createElement("div");
              div.classList.add("result-item");
              div.textContent = proveedor.nombre;
              div.onclick = function () {
                document.getElementById("id_proveedor").value = proveedor.id_acceso;
                document.getElementById("nomb_proveedor").value = proveedor.nombre;
                resultadosDiv.innerHTML = ''; // Limpiar resultados después de seleccionar
              };
              resultadosDiv.appendChild(div);
            });
          }
        };
        xhr.send();
      }
    }
  </script>
</head>
<body>

<form id="form1" name="form1" method="post">
  <label for="Buscar_proveedor">Buscar Proveedor:</label>
  <input type="text" name="Buscar_proveedor" id="Buscar_proveedor" oninput="buscarProveedor()">
  
  <div id="resultados"></div>
  
  <br>
  
  <label for="id_proveedor">ID Proveedor:</label>
  <input type="text" name="id_proveedor" id="id_proveedor" readonly>
  
  <br>
  
  <label for="nomb_proveedor">Nombre proveedor:</label>
  <input type="text" name="nomb_proveedor" id="nomb_proveedor" readonly>
</form>

</body>
</html>