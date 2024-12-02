<?PHP

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
?>

<form action="abmArticulo.php?scr=agregarnuevo" method="post" name="form1" id="form1">
  <table width="800" border="0" align="center">
    <tbody>
      <tr>
        <th colspan="2" scope="col">
        <div class="card-header">
        <h3 class="card-title">Agregar Nuevo Articulos</h3>
        </div>
        </th>
      </tr>
      <tr>
        <td width="296" bgcolor="#A1A1A1"><label for="id_arti">Cod.Ref.:</label>
        <input name="id_arti" type="number" id="id_arti" max="99999999" min="0" readonly="readonly"></td>
        <td width="488" align="right" bgcolor="#A1A1A1"><label for="id_usuario">Us. ID - F.Act.:</label>
        <input name="id_usuario" type="text" id="id_usuario" max="5" min="5" readonly="readonly"> - <input name="fecha_act" type="text" id="fecha_act" max="10" min="10" readonly="readonly"></td>
      </tr>
      <tr>
        <td><label for="cod_bar">Cod. Barra:</label>
          <input name="cod_bar" type="text" required="required" id="cod_bar" size="20" maxlength="20">
        <strong>(*)</strong></td>
        <td>Validar:</td>
      </tr>
      <tr>
        <td><label for="desc_corta">Desc. Corta:</label>
        <input name="desc_corta" type="text" required="required" id="desc_corta" size="20" maxlength="20"><strong>(*)</strong></td>
        <td><label for="desc_larga">Desc. Larga:</label>
        <input name="desc_larga" type="text" required="required" id="desc_larga" size="40" maxlength="40"><strong>(*)</strong></td>
      </tr>
      <tr>
        <td><label for="id_rubro">Rubro:</label>
          <select name="rubro" id="rubro">
            <option value="1" selected="selected">Varios</option>
            <option value="2">Repuestos</option>
        </select></td>
        <td><label for="id_rubro_sub">Sub Rubro:</label>
          <select name="rubro_sub" id="rubro_sub">
            <option value="1" selected="selected">Varios</option>
            <option value="2">Repuestos</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="unidad_med">Unidad de Medida:</label>
          <select name="unidad_med" id="unidad_med">
            <option value="1" selected="selected">Unidad</option>
            <option value="2">Litros</option>
            <option value="2">Metros</option>
        </select></td>
        <td><label for="unidadxbulto">Unidad x Bulto:</label>
        <input name="unidadxbulto" type="number" id="unidadxbulto" max="1000" min="1" value="1"></td>
      </tr>
      <tr>
        <td><label for="stok_min">Stock Minimo:</label>
        <input name="stok_min" type="number" id="stok_min" max="9999999999" min="1" value="1"></td>
        <td><label for="stok_max">Stock Maximo:</label>
        <input name="stok_max" type="number" id="stok_max" max="9999999999" min="1" value="1"></td>
      </tr>
      <tr>
        <td><label for="Proveedor">Proveedor:</label>
        <input type="text" name="Proveedor" id="Proveedor" size="20" maxlength="35"><strong>(*)</strong></td>
        <td><label for="id_prov">Datos Prov.:</label>
        <input name="id_prov" type="text" id="id_prov" size="10" maxlength="10" readonly="readonly">
        - <input name="det_prov" type="text" id="det_prov" size="30" maxlength="30" readonly="readonly"></td>
      </tr>
      <tr>
        <td><label for="cod_bar_prov">Cod. Bar. Prov.:</label>
        <input name="cod_bar_prov" type="text" id="cod_bar_prov" size="10" maxlength="10" readonly="readonly"></td>
        <td><label for="estado">Estado Articulo:</label>
          <select name="estado" id="estado">
            <option value="1" selected="selected">Activo</option>
            <option value="0">Inactivo</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><a href="abmArticulo.php" class="btn btn-outline-secondary">Cancela</a> - 
        <input type="submit" name="submit" id="submit" value="Agregar Articulo Nvo">
        </td>
      </tr>
    </tbody>
  </table>
    
</form>
<p>&nbsp;</p>
<?PHP
