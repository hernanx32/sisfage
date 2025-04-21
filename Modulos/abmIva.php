<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<?php
function agregar(){
?>    <form action="iva.php">
<table width="323" border="1" align="center">
  <tbody>
    <tr>
      <th colspan="2" scope="col">
        <label for="buscar_us">ABM IVA</label>
      </th>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td width="98" bgcolor="#8E9EFD">NRO</td>
      <td width="209" align="left" bgcolor="#FFFFFF"><input name="id_iva" type="text" disabled="disabled" id="id_iva" size="5" maxlength="5" readonly="readonly"></td>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td bgcolor="#8E9EFD">DESC. IVA</td>
      <td align="left" bgcolor="#FFFFFF"><input name="desc_iva" type="text" required="required" id="desc_iva" size="30" maxlength="30"></td>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td bgcolor="#8E9EFD">PORCENTAJE</td>
      <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    </tbody>
    </table>
</form>

<?php    
}
    
function agregando($conn){
}
     
function modificar($conn){
}
    
function modificando($conn){
}
    
function eliminar($conn){
}    

function eliminando($conn){
}    

    
?>
<body>
</body>
</html>