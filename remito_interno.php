<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Remitos Internos';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("menu.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);

//cargamos valores del formulario
$sql=$conn->query("SELECT * FROM `usuario` WHERE id_usuario ='$id_us' ");
		while($row = $sql->fetch_assoc()) {
            $dusu=$row['usuario'];
            $dclave=$row['clave'];
            $did_acc=$row['id_acceso'];
            $dnombre=$row['nombre'];
            $demail=$row['email'];
            $dsuc=$row['id_sucursal'];
        }
?>

<form action="/Sisfage/remito_interno.php?scr=Buscar" method="post" name="form1" id="form1" accept-charset="UTF-8">
   
<table width="790" border="1" align="center">
  <tbody>
    <tr>
      <th colspan="5" scope="col">Buscar Remito</th>
      <th width="214" colspan="4" rowspan="3" scope="col"><a href="remito_interno_carga.php">Agregar Remito</a></th>
      </tr>
    <tr>
      <td width="84" bgcolor="#A6A6A6"><label for="NroRem:">Nro. Rem:</label></td>
      <td width="144" bgcolor="#A6A6A6"><input type="text" name="NroRem:" id="NroRem:"></td>
      <td width="67" bgcolor="#A6A6A6"><label for="Origen">Origen:</label></td>
      <td width="169" bgcolor="#A6A6A6"><input type="text" name="Origen" id="Origen"></td>
      <td width="72" rowspan="2" bgcolor="#A6A6A6"><input type="button" name="button" id="button" value="Buscar"></td>
      </tr>
    <tr>
      <td bgcolor="#A6A6A6"><label for="fecha">Fecha:</label></td>
      <td bgcolor="#A6A6A6"><input name="fecha" type="text" id="fecha" placeholder="<?PHP echo date('d-m-Y');?>"></td>
      <td bgcolor="#A6A6A6"><label for="destino">Destino:</label></td>
      <td bgcolor="#A6A6A6"><input type="text" name="destino" id="destino"></td>
      </tr>
  </tbody>
</table>
</form>

<table width="790" border="1" align="center">
  <tbody>
    <tr>
      <th bgcolor="#BCDAF1" scope="col">Suc. Ori</th>
      <th bgcolor="#BCDAF1" scope="col">Nro.Remito</th>
      <th bgcolor="#BCDAF1" scope="col">Fecha</th>
      <th bgcolor="#BCDAF1" scope="col">Destino</th>
      <th bgcolor="#BCDAF1" scope="col">Usuario</th>
      <th width="227" colspan="4" bgcolor="#BCDAF1" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td width="70">&nbsp;</td>
      <td width="165">&nbsp;</td>
      <td width="67">&nbsp;</td>
      <td width="78">&nbsp;</td>
      <td width="143">&nbsp;</td>
      <th colspan="4" scope="col">&nbsp;</th>
      </tr>
  </tbody>
</table>


<?php
$focus='d_nombre';
$conn->close();

pieprincipal($focus,$path);

?>