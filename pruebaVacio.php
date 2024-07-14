<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLTE DataTable Example</title>
    <!-- jQuery -->
    
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- AdminLTE (opcional, si quieres usar estilos de AdminLTE) -->
    <link rel="stylesheet" href="path/to/adminlte.min.css">
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<p>Da clic en el siguiente enlace para ver la alerta:</p>
<a href="#" id="showAlert">Mostrar alerta</a>

<div id="alertBox" class="alert-box">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>¡Alerta!</strong> Este es un mensaje tipo alerta.
</div>

<script>
document.getElementById("showAlert").addEventListener("click", function(event) {
  event.preventDefault(); // Evitar que el enlace redireccione a otra página
  
  // Mostrar la alerta
  document.getElementById("alertBox").style.display = "block";
});
</script>
</body>
</html>