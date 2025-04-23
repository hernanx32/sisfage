<?php
session_start();
$fecha=date('Y-m-d');
@ $id_us=$_SESSION['id_usuario'];
@ $usuario=$_SESSION['usuario'];
@ $nro_cat=$_SESSION['id_acceso'];
@ $nom_completo=$_SESSION['nombre'];


$titulo='Sistema - ABM IVA';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");

include("Modulos/abmIva.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


if (isset($_GET['scr'])){
    $scr=$_GET['scr'];

    if($scr=="agregar"){
		agregar();
		$focus='desc_iva';	
		
    }elseif($scr=="agregando"){    
        
    }elseif($scr=="modificar"){

    }elseif($scr=="modificando"){
    
    }elseif($scr=="eliminar"){
        
    }elseif($scr=="eliminando"){
         
    }
    

}else{

?>
<form action="iva.php">
<table width="400" border="1" align="center">
  <tbody>
    <tr>
      <th colspan="3" scope="col">
        <label for="buscar_us">ABM IVA</label>
       </th>
      <th colspan="2" align="center" scope="col"><div align="center"><a href="iva.php?scr=agregar">AGREGAR IVA</a></div></th>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td width="30">NRO</td>
      <td width="110">DESC. IVA</td>
      <td width="30">PORCENTAJE</td>
      <td width="130">Acciones</td>
    </tr>

    <?PHP  
$sql = "
SELECT * FROM IVA";
      
$result = $conn->query($sql);      
      

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>";
        echo $row['id_iva'];
        echo "</td><td>";
        echo $row['nombre'];
        echo "</td><td>";
        echo $row['porcentaje'];
        echo "</td><td align='center'>";
        echo "<a href='iva.php?scr=modificar&id=".$row['id_iva']."'>Modificar</a> - <a  href='iva.php?scr=eliminar&id=".$row['id_iva']."' onclick='confirmarEnlace(event)'>Eliminar</a> </td></tr>"; 
    
    }
} else {
	  echo "<tr><td colspan='6'>0 resultados</td></tr>";
}
echo "</tbody></table></form>";
    

}      
      
      
if (!isset($focus)){
    $focus='texto2';
}

$conn->close();
pieprincipal($focus,$path);
?>
