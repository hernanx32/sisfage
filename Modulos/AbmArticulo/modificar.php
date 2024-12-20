<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
    
    
        
<?php
function modificar($conn, $id){
$sql = "SELECT 
`articulo`.`id_articulo`,
`articulo`.`cod_bar`,
`articulo`.`desc_corta`,
`articulo`.`desc_larga`,
`articulo`.`id_rubro`,
`articulo`.`id_rubro_sub`,
`articulo`.`uni_med`,
`articulo`.`uni_bulto`,
`articulo`.`stockmin`,
`articulo`.`stockmax`,
`articulo`.`id_iva`,
`articulo`.`id_imp_int`,
`articulo`.`id_proveedor`,
`articulo`.`cod_bar_prov`,
`articulo`.`estado`,
`articulo`.`fec_act`,
`usuario`.`nombre` 
FROM `articulo` INNER JOIN `usuario` 
ON articulo.id_usuario = usuario.id_usuario 
WHERE `articulo`.`id_articulo` = $id";
$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $VAL1=$fila['id_articulo'];
        $VAL2=$fila['nombre'];
        $VAL3=$fila['fec_act'];
        $VAL4=$fila['cod_bar'];
        $VAL5=$fila['desc_corta'];
        $VAL6=$fila['desc_larga'];
        $VAL7=$fila['id_rubro'];
        $VAL8=$fila['id_rubro_sub'];
        $VAL9=$fila['uni_med'];
        $VAL10=$fila['uni_bulto'];
        $VAL11=$fila['stockmin'];
        $VAL12=$fila['stockmax'];
        $VAL13=$fila['id_iva'];
        $VAL14=$fila['id_imp_int'];
        $VAL15=$fila['id_proveedor'];
        $VAL16=$fila['cod_bar_prov'];
        $VAL17=$fila['estado'];
        }
    } else {
    echo "Error al obtener el ID del Articulo";
    sleep(10);    
    header("location:abmArticulo.php");
    }
	?>
    
    
    
<div class="card-header">
    <h3 class="card-title">ABM Articulos - Modificar Articulos</h3>
</div>
<form action="abmArticulo.php?scr=modificando" method="post" name="form1" id="form1">
  <table width="800" border="0" align="center">
    <tbody>
      <tr>
        <th colspan="2" scope="col">
        </th>
      </tr>
      <tr>
        <td bgcolor="#E4E4E4"><label for="cod_ref">Cod. Ref:</label>
        <input name="cod_ref" type="text" id="cod_ref" value="<?PHP echo $VAL1; ?>" readonly></td>
        <td bgcolor="#E4E4E4"><label for="fecha_act">Fecha Actualización</label>
	    <input name="id_usuario" type="text" id="id_usuario" value="<?PHP echo $VAL2; ?>" readonly><input name="fecha_act" type="date" id="fecha_act" value="<?PHP echo $VAL3; ?>" readonly></td>
      </tr>
      <tr>
        <td><label for="cod_bar">Cod. Barra:</label>
          <input name="cod_bar" type="text" required="required" id="cod_bar" value="<?PHP echo $VAL4; ?>" size="20" maxlength="20">
        <strong>(*)</strong></td>
        <td>Validar:
            
        <span id="error-cod_bar" class="alert-danger"></span>


            <script>
        // Función para hacer la validación AJAX
        document.getElementById("cod_bar").addEventListener("blur", function() {
            let codigo = this.value;
            
            if (codigo.trim() === "") {
                document.getElementById("error-cod_bar").textContent = "";
                return;
            }

            // Realizamos una solicitud AJAX a un script PHP para comprobar si el código existe
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "validar_codigo.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    let respuesta = xhr.responseText;
                    document.getElementById("error-cod_bar").textContent = respuesta;
                } else {
                    document.getElementById("error-cod_bar").textContent = "Error al validar el código.";
                }
            };
            xhr.send("cod_bar=" + encodeURIComponent(codigo));
        });
    </script>

        </td>
      </tr>
      <tr>
        <td><label for="desc_corta">Desc. Corta:</label>
        <input name="desc_corta" type="text" required="required" id="desc_corta" tabindex="1" value="<?PHP echo $VAL5?>" size="20" maxlength="20"><strong>(*)</strong></td>
        <td><label for="desc_larga">Desc. Larga:</label>
        <input name="desc_larga" type="text"  required="required" id="desc_larga" tabindex="2" value="<?PHP echo $VAL6?>" size="40" maxlength="40"><strong>(*)</strong></td>
      </tr>
      <tr>
        <td><label for="id_rubro">Rubro:</label>
          <select name="rubro" id="rubro" tabindex="3">
            <?PHP  
            $sql = "SELECT * FROM rubro";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    if($fila['id_rubro']==$VAL7){
                    echo '<option value="' . $fila['id_rubro'] . '" selected="selected">' . $fila['desc_rubro'] . '</option>';    
                    }else{
                    echo '<option value="' . $fila['id_rubro'] . '">' . $fila['desc_rubro'] . '</option>'; }
                }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?>
        </select></td>
        <td><label for="id_rubro_sub">Sub Rubro:</label>
            <select name="rubro_sub" id="rubro_sub" tabindex="4">
            <?PHP  
            $sql = "SELECT * FROM rubro_sub";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    if($fila['id_rubro_sub']==$VAL8){
                    echo '<option value="' . $fila['id_rubro_sub'] . '" selected="selected">' . $fila['desc_rubro_sub'] . '</option>';
                    }else{    
                    echo '<option value="' . $fila['id_rubro_sub'] . '">' . $fila['desc_rubro_sub'] . '</option>';}
                
                    }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?>
            </select>
        </td>
      </tr>
      <tr>
        <td><label for="unidad_med">Unidad de Medida:</label>
          <select name="unidad_med" id="unidad_med" tabindex="5">
            <option value="Unidad" selected="selected">Unidad</option>
            <option value="Litros">Litros</option>
            <option value="Metros">Metros</option>
        </select></td>
        <td><label for="uni_bulto">Unidad x Bulto:</label>
        <input name="uni_bulto" type="number" id="uni_bulto" max="1000" min="1" tabindex="6" value="<?PHP echo $VAL10?>" ></td>
      </tr>
      <tr>
        <td><label for="stok_min">Stock Minimo:</label>
        <input name="stok_min" type="number" id="stok_min" max="9999999999" min="0" tabindex="7" value="<?PHP echo $VAL11?>"></td>
        <td><label for="stok_max">Stock Maximo:</label>
        <input name="stok_max" type="number" id="stok_max" max="9999999999" min="0" tabindex="8" value="<?PHP echo $VAL12?>"></td>
      </tr>
       <tr>
        <td><label for="iva">I.V.A.:</label>
          <select name="iva" class="select2" id="iva" tabindex="9">
            <?PHP  
            $sql = "SELECT * FROM iva";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {

                    if($fila['id_iva']==$VAL13){
                    echo '<option value="' . $fila['id_iva'] . '" selected="selected">' . $fila['nombre'] . '</option>';
                    }else{    
                    echo '<option value="' . $fila['id_iva'] . '">' . $fila['nombre'] . '</option>';}
                            
                }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?> 
        </select></td>
        <td><label for="imp_int">Imp. Interno:</label>
          <select name="imp_int" id="imp_int" tabindex="10">
            <?PHP  
            $sql = "SELECT * FROM imp_interno";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    
                    
                    if($fila['id_imp_interno']==$VAL14){
                    echo '<option value="' . $fila['id_imp_interno'] . '" selected="selected">' . $fila['desc_imp_int'] . '</option>';
                    }else{    
                    echo '<option value="' . $fila['id_imp_interno'] . '">' . $fila['desc_imp_int'] . '</option>';}
                   
                }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?> 
        </select></td>
      </tr>  
      <tr>
        <td colspan="2"><label for="BuscaProveedor">Proveedor:</label>
          <select name="BuscaProveedor" class="Select2" id="BuscaProveedor" tabindex="11">
            <?PHP  
            $sql = "SELECT * FROM proveedor";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    
                    if($fila['id_proveedor']==$VAL15){
                    echo '<option value="' . $fila['id_proveedor'] . '" selected="selected">' . $fila['nombre'] . '</option>';
                    }else{    
                    echo '<option value="' . $fila['id_proveedor'] . '">' . $fila['nombre'] . '</option>';}
                    
                     }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?>			 
          </select>
          <label for="id_prov">ID.:</label>
          <input type="text" disabled="disabled" id="id_proveedor" placeholder="ID" size="5" maxlength="30">
          - <input type="text" disabled="disabled" id="nombre_proveedor" size="30" maxlength="30"><strong>(*)</strong>
        </td>
      </tr>
      <tr>
        <td><label for="cod_bar_prov">Cod. Bar. Prov.:</label>
        <input name="cod_bar_prov" type="text" id="cod_bar_prov" tabindex="12" value="<?PHP echo $VAL14?>" size="10" maxlength="10"></td>
        <td><label for="estado">Estado Articulo:</label>
          <select name="estado" id="estado" tabindex="13">
              
            <option value="1" <?PHP if($VAL17=='1'){ echo "selected='selected'"; } ?>>Activo</option>
            <option value="0" <?PHP if($VAL17=='0'){ echo "selected='selected'"; } ?>>Inactivo</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#F5FC00"><strong>¡¡RECUERDE EL I.V.A. E IMP.INTERNO DEBE MODIFICAR EL COSTO!!</strong></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><a href="abmArticulo.php" class="btn btn-outline-secondary">Cancela</a> - 
        <input name="submit" type="submit" class="btn btn-outline-success" id="submit" tabindex="14" value="Modificar Articulo">
        </td>
      </tr>
    </tbody>
  </table>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax']) && $_POST['ajax'] === '1') {
    $codigo = $_POST['cod_bar'];

    // Consulta en la base de datos
    $sql = "SELECT * FROM articulo WHERE cod_bar = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $codigo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Responder a la solicitud AJAX
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        echo json_encode(['existe' => true, 'detalle' => $fila['desc_corta']]); // Ajusta la columna 'nombre'
    } else {
        echo json_encode(['existe' => false]);
    }
    $stmt->close();
    $conn->close();
    exit;
}
    ?>
 <script>
 // Referencia al elemento select y campos de texto
        const selectElement = document.getElementById('BuscaProveedor');
        const idField = document.getElementById('id_proveedor');
        const nameField = document.getElementById('nombre_proveedor');

        // Actualizar los campos de texto cuando cambia la selección
        selectElement.addEventListener('change', () => {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            idField.value = selectedOption.value; // Establecer el valor del ID
            nameField.value = selectedOption.text; // Establecer el texto del nombre
        });

        // Inicialización: Mostrar los valores iniciales
        window.onload = () => {
            const initialOption = selectElement.options[selectElement.selectedIndex];
            idField.value = initialOption.value;
            nameField.value = initialOption.text;
        };
     
    
     
     // Evento para el botón de envío
        const form = document.getElementById('form1');
        const input = document.getElementById('id_proveedor');
        const submitBtn = document.getElementById('submit');

        // Evento al hacer clic en el botón de envío
        submitBtn.addEventListener('click', function(event) {

                        
            // Enviar el formulario manualmente
            form.submit();
            
            // Deshabilitar el botón de envío
            submitBtn.disabled = true;

        });
     

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

</script>     
    
    
    
    
    
<?PHP
}