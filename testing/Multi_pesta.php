<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pestañas tipo navegador</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .tabs {
      display: flex;
      border-bottom: 2px solid #ccc;
      margin-bottom: 10px;
    }

    .tab-button {
      padding: 10px 20px;
      border: 1px solid #ccc;
      border-bottom: none;
      border-radius: 8px 8px 0 0;
      background-color: #eee;
      margin-right: 5px;
      cursor: pointer;
    }

    .tab-button.active {
      background-color: #fff;
      font-weight: bold;
      border-bottom: 2px solid white;
    }

    .tab-content {
      border: 1px solid #ccc;
      padding: 15px;
      border-radius: 0 8px 8px 8px;
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    input {
      padding: 8px;
      width: 100%;
      box-sizing: border-box;
    }
  </style>
</head>
<body>

<div class="tabs">
  <div class="tab-button active" onclick="showTab(1)">Pestaña 1</div>
  <div class="tab-button" onclick="showTab(2)">Pestaña 2</div>
  <div class="tab-button" onclick="showTab(3)">Pestaña 3</div>
</div>

<div id="tab1" class="tab-content active">
  <h3>Pestaña 1</h3>
  <input type="text" class="sincronizado" placeholder="Texto sincronizado">
</div>

<div id="tab2" class="tab-content">
  <h3>Pestaña 2</h3>
  <input type="text" class="sincronizado" placeholder="Texto sincronizado">
</div>

<div id="tab3" class="tab-content">
  <h3>Pestaña 3</h3>
  <input type="text" class="sincronizado" placeholder="Texto sincronizado">
</div>

<script>
function showTab(num) {
  // Mostrar contenido
  document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
  document.getElementById('tab' + num).classList.add('active');

  // Activar botón
  document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
  document.querySelectorAll('.tab-button')[num - 1].classList.add('active');
}

// Sincronizar los inputs
document.querySelectorAll('.sincronizado').forEach(input => {
  input.addEventListener('input', e => {
    const valor = e.target.value;
    document.querySelectorAll('.sincronizado').forEach(otro => {
      if (otro !== e.target) otro.value = valor;
    });
  });
});
</script>

</body>
</html>
