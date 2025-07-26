<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pestañas tipo navegador</title>
	
	
<style>
  input[type="number"] {
    width: 100px; /* Ajusta el ancho según tus necesidades */
    height: 30px;
    font-size: 16px;
    box-sizing: border-box; /* Evita cambios de tamaño inesperados */
  }

    body {
      font-family: Arial, sans-serif;
    }

    .tabs {
      display: flex;
      border-bottom: 2px solid #ccc;
      margin-bottom: 10px;
    }

    .tab-button {
      padding: 10px 20px;
      border: 1px solid #ccc;
      border-bottom: none;
      border-radius: 8px 8px 0 0;
      background-color: #eee;
      margin-right: 5px;
      cursor: pointer;
    }

    .tab-button.active {
      background-color: #fff;
      font-weight: bold;
      border-bottom: 2px solid white;
    }

    .tab-content {
      border: 1px solid #ccc;
      padding: 15px;
      border-radius: 0 8px 8px 8px;
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    input {
      padding: 8px;
      width: 100%;
      box-sizing: border-box;
    }
  </style>
</head>
<body>

<div class="tabs">
  <div class="tab-button active" onclick="showTab(1)">Pestaña 1</div>
  <div class="tab-button" onclick="(function(){ showTab(2); CALCULAR(); })">Pestaña 2</div>
  <div class="tab-button" onclick="showTab(3)">Pestaña 3</div>
</div>

<div id="tab1" class="tab-content active">
  <h3>Datos del Producto</h3>
  <table width="1015" border="0" align="center">
    <tbody>
      <tr>
        <th colspan="4">Datos del Articulo</th>
      </tr>
      <tr>
        <td width="113" align="left" bgcolor="#A1A1A1">Cod. Ref.:</td>
        <td width="310" align="left" bgcolor="#A1A1A1"><input type="text" name="cod_ref" id="cod_ref" value="A" readonly /></td>
        <td width="110" align="right" bgcolor="#A1A1A1">Ult. Mod.:</td>
        <td width="464" align="left" bgcolor="#A1A1A1"><input type="text" name="id_usuario" readonly id="id_usuario" value="$VAL5" size="10" maxlength="10">
          <input name="fec_mod" type="date" readonly id="fec_mod" value="$VAL4"></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#A1A1A1">Descripción:</td>
        <td align="left" bgcolor="#A1A1A1"><input name="desc_larga" type="text" readonly id="desc_larga" value="$VAL1" size="40" maxlength="40"></td>
        <td align="right" bgcolor="#A1A1A1">Proveedor</td>
        <td align="left" bgcolor="#A1A1A1"><input name="proveedor" type="text" readonly id="proveedor" value="$VAL6"></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#A1A1A1">Cod. Barra:</td>
        <td align="left" bgcolor="#A1A1A1"><input name="cod_bar" type="text" readonly id="cod_bar" value="$VAL2"></td>
        <td align="right" bgcolor="#A1A1A1">Cod.Bar.Prov.</td>
        <td align="left" bgcolor="#A1A1A1"><input name="cod_prov" type="text" readonly id="cod_prov" value="$VAL2"></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#A1A1A1">Tipo I.V.A.:</td>
        <td align="left" bgcolor="#A1A1A1"><input name="iva" type="text" id="iva" value="$VAL3" readonly></td>
        <td align="right" bgcolor="#A1A1A1">Imp. Interno:</td>
        <td align="left" bgcolor="#A1A1A1"><input name="imp_int" type="text" readonly id="imp_int" value="VAL7"></td>
      </tr>
    </tbody>
  </table>
</div>

<div id="tab2" class="tab-content">
  <h3>Pestaña 2</h3>
  <input type="text" id="PV1" class="PV1">
</div>

<div id="tab3" class="tab-content">
  <h3>Pestaña 3</h3>
  <input type="text" class="sincronizado" placeholder="Texto sincronizado">
</div>

<script>
//MUESTRAS LAS DIFERENTE PESTAÑASS	
function showTab(num) {
  // Mostrar contenido
  document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
  document.getElementById('tab' + num).classList.add('active');

  // Activar botón
  document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
  document.querySelectorAll('.tab-button')[num - 1].classList.add('active');
}

function CALCULAR{
var Valor1= '1';	
document.getElementById("PV1").value = Valor1;    
	
	
}
	
	</script>

</body>
</html>
