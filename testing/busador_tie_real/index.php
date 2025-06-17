<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Buscar en tiempo real</title>
  
</head>
<body>
  <h2>Buscar Articulo</h2>
  <input type="search" id="busqueda" placeholder="Escribe un nombre...">
  <label for="select">Filtro Busqueda:</label>
<select name="select" id="filtro">
  <option value="desc_larga" selected="selected">Descripcion</option>
  <option value="cod_bar">Cod. Barra</option>
  <option value="id_articulo">ID</option>
  </select>
<div id="resultados"></div>

	
	
  <script>
    const input = document.getElementById("busqueda");
    const filtro = document.getElementById("filtro");

    function buscar() {
      const q = input.value;
      const campo = filtro.value;

      if (q.length === 0) {
        document.getElementById("resultados").innerHTML = "";
        return;
      }

      fetch("buscar.php?q=" + encodeURIComponent(q) + "&campo=" + campo)
        .then(res => res.text())
        .then(data => {
          document.getElementById("resultados").innerHTML = data;
        });
    }

    input.addEventListener("input", buscar);
    filtro.addEventListener("change", buscar); // para actualizar si se cambia el filtro
	
  </script>
</body>
</html>