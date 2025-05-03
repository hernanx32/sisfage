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
           



//actualizado
$focus='Buscar';
$conn->close();
pieprincipal($focus,$path);
?>
 <script>
  window.onload = function() {
    document.getElementById("Buscar").focus();
  };
</script> 