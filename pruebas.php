<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda y selección por ID o Nombre (con MySQL)</title>       
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .autocomplete-items {
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            position: absolute;
            max-height: 150px;
            overflow-y: auto;
            width: 100%;
        }
        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }
    </style>
</head>
<body>

<h2>Buscar y seleccionar opción por ID o Nombre (con MySQL)</h2>
<!-- Campo de búsqueda -->
<input id="searchInput" type="text" placeholder="Buscar por ID o Nombre..." oninput="searchDatabase(this.value)">
<!-- Campo donde se colocará el nombre seleccionado -->
<input id="selectedName" type="text" placeholder="Nombre seleccionado">
<!-- Campo donde se colocará el ID seleccionado -->
<input id="selectedId" type="text" placeholder="ID seleccionado">

<!-- Contenedor para las sugerencias -->
<div id="suggestions" class="autocomplete-items"></div>

<script>
function searchDatabase(query) {
    const suggestionBox = document.getElementById("suggestions");
    suggestionBox.innerHTML = ""; // Limpiar sugerencias previas

    if (!query) {
        return;
    }

    // Realizar la solicitud AJAX a search.php
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "search.php?query=" + query, true);
    xhr.onload = function() {
        if (this.status === 200) {
            const results = JSON.parse(this.responseText);

            // Recorrer los resultados y mostrarlos
            results.forEach(item => {
                const suggestionItem = document.createElement("div");
                
                // Mostrar el ID y el nombre en la sugerencia
                suggestionItem.textContent = `ID: ${item.id_usuario} - Nombre: ${item.nombre}`;

                // Al hacer clic en un elemento, mostrar el nombre y el ID en los campos correspondientes
                suggestionItem.addEventListener("click", () => {
                    document.getElementById("selectedName").value = item.nombre;
                    document.getElementById("selectedId").value = item.id_usuario;
                    document.getElementById("searchInput").value = ""; // Limpiar el campo de búsqueda
                    suggestionBox.innerHTML = ""; // Limpiar las sugerencias
                });

                suggestionBox.appendChild(suggestionItem);
            });
        }
    };
    xhr.send();
}
</script>

</body>
</html>
