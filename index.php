<?php
session_start();
$titulo='Sistema - Inicio';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");

cabeza($titulo,$path);

if (isset($_GET['msj']))
{
    $mensaje="<strong><span style='color: red;'>¡El Usuario y Clave son Incorrectos!..</span></strong>";    
   
} else {
    $mensaje="<strong><span style='color: Green;'>Bienvenido..</span></strong>";  
}

if (!isset($_GET['scr'])){
    
    include("Modulos/Login/login.php");
    $focus='usuario';
}else{
    $scr=$_GET['scr'];

    if ($scr=="ingresar"){
        include("Modulos/Login/ingresar.php");
        $focus='usuario';   
    }
    if($scr=="olvidoclave"){
    include("Modulos/Login/olvidoclave.php");
    $focus='correo';
    }
}

echo "Estado de Conexión: ".$EstCon ;
pieindex($focus,$path);

?>