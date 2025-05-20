<?PHP
	$descip='-';
	$precio='-';
	$stock='-';
?>
		
<!doctype html>
<html>
<head>

<?php
global $EstCon, $conn;

$conn= new mysqli("127.0.0.1", "root", "LauLukLulu477!", "bases");
$conn->set_charset("utf8");


if($conn->connect_error){
	die('Error de Conexion '.$conn->connect_error);
	$EstCon = 'Error';
}else{
	$EstCon = 'OK';
	
}


?>
	
	
	<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
	
	<table width="990" border="0" align="center">
        <tbody>
          <tr>
            <td>Codigo: 
              <input name="buscar_art" type="search" autofocus="autofocus" id="buscar_art" tabindex="1" size="30" maxlength="30"> 
              - 
              <input type="button" name="btn_buscar" id="btn_buscar" value="Buscar"> 
              - Cantidad: 
              <input name="canti" type="number" id="canti" max="1000" min="1" tabindex="2" value="1"></td>
          </tr>
          <tr>
            <td>Detalle: <?PHP echo $descip; ?> - Precio: <?PHP echo $precio; ?> - Stock: <?PHP echo $stock; ?> - 
              <input name="btn_agregar" type="button" id="btn_agregar" tabindex="3" value="Agregar"></td>
          </tr>
        </tbody>
      </table>
</body>
</html>