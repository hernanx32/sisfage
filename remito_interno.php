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
      <th width="221" colspan="4" scope="col"><a class="btn btn-success" href="remito_interno_carga.php">Agregar Remito</a></th>
      </tr>
    <tr>
      <td width="78" bgcolor="#A6A6A6"><label for="NroRem:">Nro. Rem:</label></td>
      <td width="125" bgcolor="#A6A6A6"><label for="Origen2">Origen:</label></td>
      <td width="162" bgcolor="#A6A6A6"><label for="destino2">Destino:</label></td>
      <td width="169" bgcolor="#A6A6A6">Fecha:</td>
      <td colspan="5" rowspan="2" bgcolor="#A6A6A6"><input type="button"  class="btn btn-secondary" name="button" id="button" value="Buscar"></td>
      </tr>
    <tr>
      <td height="26" bgcolor="#A6A6A6"><input name="NroRem:" type="text" id="NroRem:" size="10" maxlength="10"></td>
      <td bgcolor="#A6A6A6"><input name="Origen" type="text" id="Origen" size="10" maxlength="15"></td>
      <td bgcolor="#A6A6A6"><input name="destino" type="text" id="destino" size="10" maxlength="15"></td>
      <td bgcolor="#A6A6A6"><input name="fecha" type="text" id="fecha" placeholder="<?PHP echo date('d-m-Y');?>"></td>
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
