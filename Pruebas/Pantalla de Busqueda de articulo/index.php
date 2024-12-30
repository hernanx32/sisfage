<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Búsqueda con JavaScript</title>
  <style>
    .search-box { width: 300px; padding: 10px; border: 1px solid #ccc; }
    .results { border: 1px solid #ccc; max-height: 200px; overflow-y: auto; }
    .result-item { padding: 10px; cursor: pointer; }
    .result-item:hover { background-color: #f0f0f0; }
  </style>
</head>
<body>
  <h1>Pantalla de Búsqueda</h1>
  <input type="text" id="searchInput" class="search-box" placeholder="Escribe para buscar..." />
  <div id="resultsContainer" class="results"></div>

  <script>
    const searchInput = document.getElementById("searchInput");
    const resultsContainer = document.getElementById("resultsContainer");

    // Simulación de datos de búsqueda
    const data = ["Apple", "Banana", "Cherry", "Date", "Elderberry", "Fig", "Grape", "Honeydew"];

    // Función para filtrar datos
    searchInput.addEventListener("input", () => {
      const query = searchInput.value.toLowerCase();
      resultsContainer.innerHTML = "";

      if (query) {
        const filtered = data.filter(item => item.toLowerCase().includes(query));
        filtered.forEach(item => {
          const div = document.createElement("div");
          div.textContent = item;
          div.classList.add("result-item");

          // Acción al seleccionar un resultado
          div.addEventListener("click", () => {
            sendSelectionToPHP(item);
          });

          resultsContainer.appendChild(div);
        });
      }
    });

    // Función para enviar la selección a PHP
    function sendSelectionToPHP(selection) {
      fetch("procesar.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `selection=${encodeURIComponent(selection)}`
      })
      .then(response => response.text())
      .then(data => {
        alert("Resultado enviado: " + data);
      })
      .catch(error => console.error("Error:", error));
    }
  </script>
</body>
</html>
