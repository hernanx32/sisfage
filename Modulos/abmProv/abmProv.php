<?php
/* FUNCIONES DENTRO DEL FORM
-agregar($conn)
-agregado($conn, $consulta)
-form_modi_prov($conn, $id_prov)
-modificando($conn, $consulta)
-elimina_prov($conn, $id_elim_prov) 

*/



//AGREGAR PROVEEDOR
function agregar($conn)
{ ?>
<form action="abmProveedores.php?scr=agregarnuevo" method="post" name="form1" id="form1">
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
        <td colspan="2"><label for="telprov1">Tel 1:</label>
        <input name="telprov1" type="number" id="telprov1" tabindex="6" size="20" maxlength="20"></td>
        <td width="281" colspan="2"><label for="transporte">Transporte:</label>
        <select name="transporte" id="transporte" tabindex="9">
          <option value="1">Varios</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="local_prov2">Localidad:</label>
          <input name="local_prov" type="text" required="required" id="local_prov2" tabindex="4" size="20" maxlength="20">
          (*)</td>
        <td colspan="2"><label for="telprov2">Tel 2:</label>
        <input name="telprov2" type="number" id="telprov2" tabindex="7" size="20" maxlength="20"></td>
        <td colspan="2"><label for="tipo_doc">Tipo de Doc.:</label>
        <select name="tipo_doc" id="tipo_doc" tabindex="10">
          <option value="1">CUIT</option>
          <option value="2">CUIL</option>
          <option value="3">DNI</option>
        </select>
(*)</td>
      </tr>
      <tr>
        <td><label for="cp_prov">Cod. Postal:</label>
          <input name="cp_prov" type="number" required="required" id="cp_prov" tabindex="5" size="5" maxlength="5">
          (*)</td>
        <td colspan="2"><label for="telprov3">Tel 3:</label>
          <input name="telprov3" type="number" id="telprov3" tabindex="8" size="20" maxlength="20">
        </td>
        <td colspan="2"><label for="nro_doc">Nro. Doc:</label>
        <input name="nro_doc" type="number" id="nro_doc" max="99999999999" tabindex="11" onkeypress="if (event.key < '0' || event.key > '9') event.preventDefault();" inputmode="numeric" oninput="if (this.value.length > 11) this.value = this.value.slice(0, 11);" />
(*)</td>
      </tr>
      <tr>
        <td colspan="5" align="center" valign="middle"><label for="otros">Comentarios / Otros:</label>
        <textarea name="otros" cols="30" rows="2" maxlength="60" id="otros" tabindex="12"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><a href="abmProveedores.php" class="btn btn-outline-secondary">Cancela</a></td>
        <td colspan="3"><input class="btn btn-outline-success" type="submit" name="scr" id="scr" value="agregado" tabindex="13"></td>
      </tr>
    </tbody>
  </table>
</form>

 <script>
//COLOCA EL CURSOR EN EL CAMPO NOMBRE     
  window.onload = function() {
    document.getElementById("nombre").focus();
  };
//BAJAR CON ENTER     
	 document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Evita el comportamiento predeterminado

        // Obtén el elemento actual con el foco
        const currentElement = document.activeElement;
        if (!currentElement) return;

        // Encuentra el siguiente elemento según el tabindex
        const tabindex = parseInt(currentElement.getAttribute('tabindex'), 10);
        if (!isNaN(tabindex)) {
            const nextElement = document.querySelector(`[tabindex="${tabindex + 1}"]`);
            if (nextElement) {
                nextElement.focus();
                if (typeof nextElement.select === 'function') {
                    nextElement.select(); // Selecciona el contenido si es posible
                }
            }
        }
    }
});     
     
     
     
     
</script> <?PHP 
}

//AGREGAR DATOS DEL FORMULARIO ANTERIOR
function agregado($conn, $consulta){
   
    $sql = $consulta;
	//EJECUTANDO CODIGO  
	if ($conn->query($sql) === TRUE) {
		//MENSAJE GRABADO CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Proveedor Agregado correctamente </div>";
		echo "<td colspan='6' align='center'><a align='center' href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
        	   
	} else {
		//MENSAJE ERROR
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al agregar el Proveedor.</div>";
    echo "<td colspan='6' align='center'><a href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}


}
//MODIFICAR PROVEEDOR
function form_modi_prov($conn, $id_prov){
//EXTRAEMOS LOS DATOS A TRAVEZ DEL ID 
$id=$_GET['id'];
    
$sql = "SELECT * FROM proveedor WHERE id_proveedor = $id";
$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $VAL1=$fila['nombre'];
        $VAL2=$fila['direccion'];
        $VAL3=$fila['provincia'];
        $VAL4=$fila['localidad'];
        $VAL5=$fila['codPostal'];
        $VAL6=$fila['tel1'];
        $VAL7=$fila['tel2'];
        $VAL8=$fila['tel3'];
        $VAL9=$fila['id_transporte'];
        $VAL10=$fila['id_doc'];
        $VAL11=$fila['nro_doc'];
        $VAL12=$fila['otros'];
        $VAL13=$fila['estado'];
        $VAL14=$fila['fec_act'];
        }
    } else {
    echo "Error al obtener el ID del Proveedor";
    sleep(10);    
    header("location:abmProveedores.php");
    }
?>    
<form action="abmProveedores.php?scr=modificando" method="post" name="form1" id="form1">
  <table width="825" border="1" align="center">
    <tbody>
      <tr>
        <th colspan="5" scope="col">Alta Proveedor</th>
      </tr>
      <tr>
        <td colspan="2" align="left"><label for="id_prov">ID:</label>
        <input name="id_prov" type="text" id="id_prov" max="5" min="5" value="<?php echo $id;?>" size="5" maxlength="5" readonly="readonly"></td>
        <td colspan="3" align="right">
          <label for="fec_prov">Ultima Act:</label>
        <input id="fec_prov" type="date" value="<?php echo $VAL14;?>" readonly="readonly"></td>
      </tr>
      <tr>
        <td colspan="2"><label for="nombre">Proveedor:</label>
        <input name="nombre" type="text" autofocus="autofocus" required="required" id="nombre" tabindex="1" value="<?php echo $VAL1;?>" size="30" maxlength="30"> 
        (*)</td>
        <td colspan="3"><label for="dir_prov">Dirección:</label>
        <input name="dir_prov" type="text" required="required" id="dir_prov" tabindex="2" value="<?php echo $VAL2;?>" size="30" maxlength="30">
        (*)</td>
      </tr>
      <tr>
        <td width="292"><label for="prov_prove">Provincia:</label>
        <input name="prov_prove" type="text" required="required" id="prov_prove" tabindex="3" value="<?php echo $VAL3;?>" size="15" maxlength="15">
        (*)</td>
        <td colspan="2"><label for="telprov1">Tel 1:</label>
        <input name="telprov1" type="number" id="telprov1" tabindex="6" value="<?php echo $VAL6;?>" size="20" maxlength="20"></td>
        <td width="281" colspan="2"><label for="transporte">Transporte:</label>
        <select name="transporte" id="transporte" tabindex="9">
          <option value="1">Varios</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="local_prov2">Localidad:</label>
          <input name="local_prov" type="text" required="required" id="local_prov2" tabindex="4" value="<?php echo $VAL4;?>" size="20" maxlength="20">
          (*)</td>
        <td colspan="2"><label for="telprov2">Tel 2:</label>
        <input name="telprov2" type="number" id="telprov2" tabindex="7" value="<?php echo $VAL7;?>" size="20" maxlength="20"></td>
        <td colspan="2"><label for="tipo_doc">Tipo de Doc.:</label>
        <select name="tipo_doc" id="tipo_doc" tabindex="10">
          <option value="1" <?php echo ($VAL10 == 1) ? "selected='selected'" : ""; ?>>CUIT</option>
          <option value="2" <?php echo ($VAL10 == 2) ? "selected='selected'" : ""; ?>>>CUIL</option>
          <option value="3" <?php echo ($VAL10 == 3) ? "selected='selected'" : ""; ?>>DNI</option>
        </select>
(*)</td>
      </tr>
      <tr>
        <td><label for="cp_prov">Cod. Postal:</label>
          <input name="cp_prov" type="number" required="required" id="cp_prov" value="<?php echo $VAL5;?>" tabindex="5" size="5" maxlength="5">
          (*)</td>
        <td colspan="2"><label for="telprov3">Tel 3:</label>
          <input name="telprov3" type="number" id="telprov3" value="<?php echo $VAL8;?>" tabindex="8" size="20" maxlength="20">
        </td>
        <td colspan="2"><label for="nro_doc">Nro. Doc:</label>
        <input name="nro_doc" type="number" id="nro_doc" max="99999999999" tabindex="11" value="<?php echo $VAL11;?>" onkeypress="if (event.key < '0' || event.key > '9') event.preventDefault();" inputmode="numeric" oninput="if (this.value.length > 11) this.value = this.value.slice(0, 11);" />
(*)</td>
      </tr>
      <tr>
        <td colspan="5" align="center" valign="middle"><label for="otros">Comentarios / Otros:</label>
        <textarea name="otros" cols="30" rows="2" maxlength="60" id="otros" value="<?php echo $VAL12;?>" tabindex="12"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><a href="abmProveedores.php" class="btn btn-outline-secondary">Cancela</a></td>
        <td colspan="3"><input class="btn btn-outline-success" type="submit" name="scr" id="scr" value="Modificar" tabindex="13"></td>
      </tr>
    </tbody>
  </table>
</form>

 <script>
//COLOCA EL CURSOR EN EL CAMPO NOMBRE     
  window.onload = function() {
    document.getElementById("nombre").focus();
  };
//BAJAR CON ENTER     
	 document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Evita el comportamiento predeterminado

        // Obtén el elemento actual con el foco
        const currentElement = document.activeElement;
        if (!currentElement) return;

        // Encuentra el siguiente elemento según el tabindex
        const tabindex = parseInt(currentElement.getAttribute('tabindex'), 10);
        if (!isNaN(tabindex)) {
            const nextElement = document.querySelector(`[tabindex="${tabindex + 1}"]`);
            if (nextElement) {
                nextElement.focus();
                if (typeof nextElement.select === 'function') {
                    nextElement.select(); // Selecciona el contenido si es posible
                }
            }
        }
    }
});     
</script> <?PHP    
    
}
//EJECUTAR CONSULTA DEL FORM ANTERIOR
function modificando($conn, $consulta){
    
	//EJECUTANDO CODIGO DE MODIFICACION 
	if ($conn->query($consulta) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Proveedor se Modifico Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $consulta . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al Modificar el Proveedor.</div>";
    echo "<td colspan='6' align='center'><a href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}

}
//ELIMINA EL PROVEEDOR
function elimina_prov($conn, $id_elim_prov, $fecha){
     $sql = "UPDATE `proveedor` SET `estado` = '0', `fec_act` = '$fecha' WHERE `proveedor`.`id_proveedor` = '$id_elim_prov'";
    
	//EJECUTANDO CODIGO DE ELIMINACION 
	if ($conn->query($sql) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Proveedor ID: $id_elim_prov  deshabilitado Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al deshabilitar el Proveedor ID: $id_elim_prov.</div>";
    echo "<td colspan='6' align='center'><a href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}
}


?>