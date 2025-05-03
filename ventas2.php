<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Ventas';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
//include("Modulos/abmProv/abmProv.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


//PANTALLA PRINCIPAL DE USUARIO

?>
<form id="frm_ventas" action="ventas2.php" method="GET">
  <table width="1100" border="3" align="center" id="tab">
  <tbody>
    <tr>
      <th width="102" align="right" scope="col">Fecha:</th>
      <th width="367" align="left" scope="col"><input name="fecha_fac" type="date" id="fecha_fac" value="<?PHP echo $fecha; ?>" readonly="readonly"></th>
      <th width="102" rowspan="4" align="center" valign="middle" scope="col"><img src="img/X.png" width="93" height="93" alt=""/></th>
      <th width="204" align="right" scope="col">Sucursal:</th>
      <th width="291" align="left" scope="col"><input name="id_sucursal" type="text" id="id_sucursal" value="001" size="6" maxlength="6" readonly="readonly">
        -
        <input name="nomb_sucursal" type="text" id="nomb_sucursal" value="Casa Central" size="18" maxlength="18" readonly="readonly"></th>
    </tr>
    <tr>
      <th align="right">ID.Cliente:</th>
      <td align="left"><input name="id_cliente" type="text" id="id_cliente" value="1" size="10" maxlength="10" readonly="readonly"></td>
      <th align="right">Punto Vta. / Nro Comp.:</th>
      <td align="left"><input name="PV" type="text" id="PV" value="001" size="6" maxlength="6" readonly="readonly">
        -        <input name="nro_comp" type="text" id="nro_comp" value="00000001" size="18" maxlength="18" readonly="readonly"></td>
    </tr>
    <tr>
      <th align="right">Nombre:</th>
      <td align="left"><input name="nombre_cli" type="text" id="nombre_cli" value="Consumidor Final" size="50" maxlength="50" readonly="readonly"></td>
      <th align="right">Lista de Presio:</th>
      <td align="left"><input name="List_Pre" type="text" id="List_Pre" value="Lista 1" size="18" maxlength="18" readonly="readonly"></td>
    </tr>
    <tr>
      <th align="right">Direccion:</th>
      <td align="left"><input name="direc_cli" type="text" id="direc_cli" value="-" size="50" maxlength="50" readonly="readonly"></td>
      <th align="right">Condicion de Venta: </th>
      <td align="left"><input name="cond_vta" type="text" id="cond_vta" value="Contado" size="18" maxlength="18" readonly="readonly"></td>
    </tr>
    <tr>
      <th align="right">CUIT:</th>
      <td align="left"><input name="cuit" type="text" id="cuit" value="11-11111111-1" size="18" maxlength="18" readonly="readonly"></td>
      <td>&nbsp;</td>
      <th align="right">Vendedor:</th>
      <td align="left"><input name="id_vendedor" type="text" id="id_vendedor" value="5" size="6" maxlength="6" readonly="readonly">
-
  <input name="nomb_vendedor" type="text" id="nomb_vendedor" value="Jose Alcides" size="18" maxlength="18" readonly="readonly"></td>
    </tr>
    <tr>
      <th colspan="5" align="right">&nbsp;</th>
      </tr>
    <tr>
      <th height="42" colspan="5" align="left" valign="middle">
        <label for="agre_articulo">Articulo:</label>
        <input name="agre_articulo" type="text" autofocus="autofocus" id="agre_articulo" tabindex="1">
        - 
        
        <label for="agre_canti">Cantidad:</label>
        <input name="agre_canti" type="number" id="agre_canti" max="100" min="1" value="1"> 
        - 
        <input type="submit" value="Agregar Articulo"></th>
      </tr>
    <tr>
      <th colspan="5" align="left">&nbsp;</th>
      </tr>
    <tr>
      <th height="68" colspan="5" align="left"><table width="1000" border="1" align="center">
        <tbody>
          <tr>
            <th width="74" scope="col">ID</th>
            <th width="382" scope="col">Detalle</th>
            <th width="80" scope="col">Cant.</th>
            <th width="150" scope="col">P. Unit.</th>
            <th width="150" scope="col">Sub. Total</th>
            <th width="124" scope="col">Eliminar</th>
            </tr>
          <tr>
            <td colspan="6">&nbsp;</td>
            </tr>
        </tbody>
      </table></th>
    </tr>
    <tr>
      <th height="28" colspan="2" align="left">&nbsp;</th>
      <th height="28" align="left">&nbsp;</th>
      <th height="28" align="left">&nbsp;</th>
      <th height="28" align="left">&nbsp;</th>
    </tr>
  </tbody>
</table>
</form>
<?PHP
//actualizado
$focus='agre_articulo';
$conn->close();
pieprincipal($focus,$path);
?>
 <script>
  window.onload = function() {
    document.getElementById("agre_articulo").focus();
  };
</script> 