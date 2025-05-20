<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Buscador de Artículos</title>
  <style>
    #popup {
      display: none;
      position: fixed;
      top: 10%;
      left: 50%;
      transform: translateX(-50%);
      width: 60%;
      background: white;
      border: 1px solid #aaa;
      padding: 20px;
      z-index: 1000;
    }
    #overlay {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      z-index: 999;
    }
  </style>
</head>
<body>

<button onclick="abrirPopup()">Buscar Artículo</button>

<div id="overlay" onclick="cerrarPopup()"></div>
<div id="popup">
  <h2>Buscar Artículo</h2>
  <input type="text" id="busqueda" placeholder="Ingrese nombre del artículo" onkeyup="buscarArticulo()">
  <div id="resultado"></div>
  <button onclick="cerrarPopup()">Cerrar</button>
</div>

<script>
  function abrirPopup() {
    document.getElementById('popup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
  }

  function cerrarPopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
  }

  function buscarArticulo() {
    const query = document.getElementById('busqueda').value;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "bus_art.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      document.getElementById("resultado").innerHTML = this.responseText;
    };
    xhr.send("busqueda=" + encodeURIComponent(query));
  }
</script>

</body>
</html>
