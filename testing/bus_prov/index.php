<?php
// Procesar búsqueda si se realiza una solicitud GET
if (isset($_GET['q'])) {
    header('Content-Type: application/json');

    $host = 'localhost';
    $dbname = 'bases'; // Cambiar por el nombre de tu base de datos
    $user = 'roto';             // Cambiar por tu usuario de MySQL
    $password = '';      // Cambiar por tu contraseña de MySQL

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $q = $_GET['q'];
        $stmt = $conn->prepare('SELECT id_proveedor, nombre FROM proveedor WHERE nombre LIKE :query LIMIT 10');
        $stmt->execute(['query' => '%' . $q . '%']);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo json_encode([]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Proveedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        #resultados {
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
            display: none;
            position: absolute;
            width: 200px;
            background: #fff;
            z-index: 1000;
        }
        .resultado-item {
            padding: 5px;
            cursor: pointer;
        }
        .resultado-item:hover {
            background-color: #f0f0f0;
        }
        #buscar {
            width: 200px;
        }
    </style>
</head>
<body>
    <label for="buscar">Buscar Proveedor:</label>
    <input type="text" id="buscar" placeholder="Buscar Proveedor" maxlength="30">
    <div id="resultados"></div>

    <input type="text" id="id_prov" placeholder="ID" size="5" maxlength="30" readonly="readonly">
    <input type="text" id="prov_nomb" placeholder="Nombre" size="15" maxlength="30" readonly="readonly">

    <script>
        const buscarInput = document.getElementById('buscar');
        const resultadosDiv = document.getElementById('resultados');
        const idProvInput = document.getElementById('id_prov');
        const nombreProvInput = document.getElementById('prov_nomb');

        buscarInput.addEventListener('input', () => {
            const query = buscarInput.value.trim();
            if (query.length > 0) {
                fetch(`?q=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        resultadosDiv.innerHTML = '';
                        resultadosDiv.style.display = data.length > 0 ? 'block' : 'none';
                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.classList.add('resultado-item');
                            div.textContent = item.nombre;
                            div.dataset.id = item.id;
                            div.dataset.nombre = item.nombre;

                            div.addEventListener('click', () => {
                                idProvInput.value = div.dataset.id_proveedor;
                                nombreProvInput.value = div.dataset.nombre;
                                buscarInput.value = '';
                                resultadosDiv.style.display = 'none';
                            });

                            resultadosDiv.appendChild(div);
                        });
                    });
            } else {
                resultadosDiv.style.display = 'none';
            }
        });

        document.addEventListener('click', (e) => {
            if (!resultadosDiv.contains(e.target) && e.target !== buscarInput) {
                resultadosDiv.style.display = 'none';
            }
        });
    </script>
</body>
</html>
