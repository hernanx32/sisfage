<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Usuarios';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
include("Modulos/usuario/abmUsuario.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


//Validamos si existe la Var SCR
if (isset($_GET['scr'])){
/* Pantallas
	eliminar
	edita
	editado
	agregar
	agregado  */
	$scr=$_GET['scr'];
    
	if ($scr=="agregar"){
        agregar($conn);   
        }
    elseif($scr=="eliminar"){
		$id_el_us=$_GET['id'];
    	elimina_usu($conn, $id_el_us);
    }
    elseif($scr=="agregarnuevo"){
        //CARGAMOS LOS DATOS DEL POST
        $usuario=$_POST['usuario'];
        $clave=md5($_POST['clave']);
        $id_acces=$_POST['acceso'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $id_sucursal=$_POST['sucursal'];
      
        $consulta="INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `id_acceso`, `nombre`, `email`, `editable`, `id_sucursal`, `fec_act`) VALUES (NULL, '$usuario', '$clave', '$id_acces', '$nombre', '$email', '1', '$id_sucursal', '$fecha')";
        
        agregado($conn, $consulta);
        }
        
        elseif($scr=="modificar"){
            $id_usu=$_GET['id'];
            form_modi_usu($conn, $id_usu );
        }
    
    //MODIFICANDO DATOS 
        elseif($scr=="modificando"){
       
        $id_usu=$_GET['id_usu'];
        $n_usuario=$_POST['usuario'];
        $id_acces=$_POST['acceso'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $id_sucursal=$_POST['sucursal'];
            
        $clave=$_POST['clave'];
        echo $fecha; 
         echo "<br>"; 
    echo  $id_usu;
    echo "<br>";        
    echo  $n_usuario;
            echo "<br>";
    echo  $id_acces;
            echo "<br>";
    echo  $nombre;
            echo "<br>";
    echo  $email;
            echo "<br>";
    echo  $id_sucursal;
            echo "<br>";
    echo  $clave; 
           
            
            $query = "UPDATE `usuario` SET  `nombre` = '$nombre'  WHERE `id_usuario` = '$id_usu'";
                if ($conn->query($query) === TRUE) {
                echo "Registro actualizado exitosamente";
            } else {
                echo "Error al actualizar el registro: " . $conn->error;
            }
            
            
        /*if ($clave=='XXXXXXXXXXXXXXXX'){
                $consulta= "UPDATE `usuario` SET `usuario` = $n_usuario, `id_acceso` = $id_acces, `nombre` = $nombre, `id_sucursal` = $id_sucursal WHERE `usuario`.`id_usuario` = $id_usu";
            }else{
                $clave=md5($_POST['clave']);
                $consulta= "UPDATE `usuario` SET `usuario` = $n_usuario, `clave` = $clave, `id_acceso` = $id_acces, `nombre` = $nombre, `id_sucursal` = $id_sucursal WHERE `usuario`.`id_usuario` = $id_usu";
          }*/
                        
     //       $query = "UPDATE `usuario` SET  `nombre` = $nombre  WHERE `id_usuario` = $id_usu";
            
    //        if ($conn->query($query) === TRUE) {
    //            echo "Registro actualizado exitosamente";
    //        } else {
    //            echo "Error al actualizar el registro: " . $conn->error;
    //        }
            
            
            //modificando($conn, $consulta );
            
            /*$query = "UPDATE `usuario` SET `nombre` = '$nombre', `email` = '$email', `id_sucursal` = $id_sucursal  WHERE `id_usuario` = $id_usu";

            if ($conn->query($query) === TRUE) {
                echo "Registro actualizado exitosamente";
            } else {
                echo "Error al actualizar el registro: " . $conn->error;
            }*/
        }
    
    
        }else{
        //PANTALLA PRINCIPAL DE USUARIO
            abmUsuario($conn);
        }

$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>