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
include("Modulos/menu.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


?>      

<form>
<table width="650" border="1">
  <tbody>
    <tr>
      <th colspan="2" align="left" scope="col">Funciones JS de Formularios</th>
      </tr>
    <tr>
      <td width="176" align="left"><input type="text" id="nombre" onBlur="txtMayuscula('nombre')"></td>
      <td width="458" align="left">Poner en Mayuscula cuando se sale del campo de texto</td>
      </tr>
    <tr>
      <td align="left"><input type="text" id="nombre2" oninput="txtMayuscula('nombre2')"></td>
      <td align="left">Siempre coloca en Mayusculas</td>
    </tr>
  </tbody>
</table>



</form>

<?PHP
$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>