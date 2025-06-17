<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
 
<style>
    /* Estilo general para toda la fila */
    .clickable-row {
      cursor: pointer;
      transition: background-color 0.5s;
    }

    /* Efecto al pasar el mouse */
    .clickable-row:hover {
      /*background-color:   #f0f0f0;*/
		background-color: #B5B5B5;
    }
  </style>
  <script>
    // Hace que al hacer clic en una fila se redirija a una URL
    function goTo(url) {
      window.location.href = url;
    }
  </script>
</head>
<body>

<table width="700" border="1">
  <tbody>
    <tr>
      <td width="70"><strong>ID</strong></td>
      <td width="93"><strong>Cod. Barra</strong></td>
      <td width="223"><strong>Descripción </strong></td>
      <td width="90"><strong>Precio 1</strong></td>
      <td width="90"><strong>Precio 2</strong></td>
      <td width="94"><strong>Fec. Actual.</strong></td>
    </tr>
    <tr class="clickable-row" onclick="goTo('detalle.php?id=a')">
      <td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td>
    </tr>
    <tr class="clickable-row" onclick="goTo('detalle.php?id=b')">
      <td>b</td><td>b</td><td>b</td><td>b</td><td>b</td><td>b</td>
    </tr>
    <tr class="clickable-row" onclick="goTo('detalle.php?id=c')">
      <td>c</td><td>c</td><td>c</td><td>c</td><td>c</td><td>c</td>
    </tr>
  </tbody>
</table>

</body>
</html>	
	
