<?php
$fecha="2025-06-27";
echo $fecha;
$conexion = new mysqli("localhost", "root", "LauLukLulu477!", "bases");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$q = isset($_GET['q']) ? $conexion->real_escape_string($_GET['q']) : '';
$campo = isset($_GET['campo']) ? $_GET['campo'] : 'desc_larga';

// Solo permitimos "nombre" o "email" como campos válidos
$camposValidos = ['desc_larga', 'cod_bar', 'id_articulo'];
if (!in_array($campo, $camposValidos)) {
    $campo = 'desc_larga';
}

if($campo === 'cod_bar'){
	$sql = "SELECT id_articulo, cod_bar, desc_larga, precio1, precio2, fec_act FROM articulo WHERE $campo LIKE '%$q%' AND estado = '1' LIMIT 100";
	print('Con codigo');
}else{
	$sql = "SELECT id_articulo, cod_bar, desc_larga, precio1, precio2, fec_act FROM articulo WHERE $campo LIKE '%$q%' AND estado = '1' LIMIT 100";
	print('Sin codigo');
}


$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
	echo "<table width='1000' border='1'>  
		<tbody>  
		<tr>
    		<td width='70'><strong>ID</strong></td>
    		<td width='93'><strong>Cod. Barra</strong></td>
			<td width='523'><strong>Descripción</strong></td>
      		<td width='90'><strong>Precio 1</strong></td>
      		<td width='90'><strong>Precio 2</strong></td>
      		<td width='94'><strong>Fec. Actual.</strong></td>
    	</tr>";
    while($row = $resultado->fetch_assoc()) {
		echo "<tr class='MarcaFila'>
			<td>" . htmlspecialchars($row["id_articulo"]) ."</td>
      		<td>" . htmlspecialchars($row["cod_bar"]) ."</td>
      		<td>" . htmlspecialchars($row["desc_larga"]) ."</td>
      		<td align='right'>$ " . htmlspecialchars(number_format($row["precio1"], 2))."</td>
      		<td align='right'>$	" . htmlspecialchars(number_format($row["precio2"], 2))."</td>";
      		
		$fec_modifica =$row['fec_act'];
        
		if($fecha==$fec_modifica){
        echo "<td bgcolor='#09D320'>";    
        }else{
        echo "<td>";    
        }		
			
		$fechaOriginal = $fec_modifica; // Fecha en formato ISO
        $timestamp = strtotime($fechaOriginal);
        echo date("d/m/Y", $timestamp) ."</td>
        	
		</tr>";	 
	}
	
	echo "</tbody></table>";
	
} else {
    echo "<p>No se encontraron resultados</p>";
}

$conexion->close();
?>