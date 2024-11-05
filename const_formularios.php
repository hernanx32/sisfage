<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<form action="abmProveedores.php" method="post" name="form1" id="form1">
  <table width="825" border="1" align="center">
    <tbody>
      <tr>
        <th colspan="5" scope="col">Alta Proveedor</th>
      </tr>
      <tr>
        <td colspan="2" align="left"><label for="id_prov">ID:</label>
        <input name="id_prov" type="number" id="id_prov" max="5" min="5" value="-" readonly="readonly"></td>
        <td colspan="3" align="right">
          <label for="fec_prov">Ultima Act:</label>
        <input name="fec_prov" type="date" id="fec_prov" readonly="readonly"></td>
      </tr>
      <tr>
        <td colspan="2"><label for="nombre">Proveedor:</label>
        <input name="nombre" type="text" autofocus="autofocus" required="required" id="nombre" tabindex="1" size="30" maxlength="30"> 
        (*)</td>
        <td colspan="3"><label for="dir_prov">Dirección:</label>
        <input name="dir_prov" type="text" required="required" id="dir_prov" tabindex="2" size="30" maxlength="30">
        (*)</td>
      </tr>
      <tr>
        <td width="292"><label for="prov_prove">Provincia:</label>
        <input name="prov_prove" type="text" required="required" id="prov_prove" tabindex="3" size="15" maxlength="15">
        (*)</td>
        <td colspan="2"><label for="tel1_prov5">Tel 1:</label>
        <input name="tel1_prov" type="text" id="tel1_prov5" tabindex="6" size="20" maxlength="20"></td>
        <td width="281" colspan="2"><label for="transporte">Transporte:</label>
        <select name="transporte" id="transporte" tabindex="9">
          <option value="1">Varios</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="local_prov2">Localidad:</label>
          <input name="local_prov" type="text" required="required" id="local_prov2" tabindex="4" size="20" maxlength="20">
          (*)</td>
        <td colspan="2"><label for="tel2_prov">Tel 2:</label>
        <input name="tel2_prov" type="text" id="tel2_prov" tabindex="7" size="20" maxlength="20"></td>
        <td colspan="2"><label for="tipo_doc">Tipo de Doc.:</label>
        <select name="tipo_doc" id="tipo_doc" tabindex="10">
          <option value="1">CUIT</option>
          <option value="2">CUIL</option>
          <option value="3">DNI</option>
        </select>
(*)</td>
      </tr>
      <tr>
        <td><label for="cp_prov2">Cod. Postal:</label>
          <input name="cp_prov" type="text" id="cp_prov2" tabindex="5" size="5" maxlength="5"></td>
        <td colspan="2"><label for="tel3_prov">Tel 3:</label>
          <input name="tel3_prov" type="text" id="tel3_prov" tabindex="8" size="20" maxlength="20">
        <label for="Nro_doc"></label></td>
        <td colspan="2"><label for="Nro_doc">Nro. Doc:</label>
        
        <input name="Nro_doc" type="number" id="Nro_doc" max="99999999999" tabindex="11" onkeypress="if (event.key < '0' || event.key > '9') event.preventDefault();" inputmode="numeric" oninput="if (this.value.length > 11) this.value = this.value.slice(0, 11);" />
(*)</td>
      </tr>
      <tr>
        <td colspan="5" align="center" valign="middle"><label for="otros">Comentarios / Otros:</label>
        <textarea name="otros" cols="30" rows="2" maxlength="60" id="otros" tabindex="12"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><input type="button" name="button" id="button" value="Cancelar"></td>
        <td colspan="3"><input name="submit" type="submit" id="submit" formaction="abmProveedores.php" tabindex="13" value="Enviar"></td>
      </tr>
    </tbody>
  </table>
</form>
    
 <script>
  window.onload = function() {
    document.getElementById("nombre").focus();
  };
</script>   
    
    
    
    
</body>
</html>