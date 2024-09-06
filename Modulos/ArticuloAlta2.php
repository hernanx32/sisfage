<!DOCTYPE html>
<html>
<head>
  <script>
    function calcularResultado() {
	 
      
      var input10 = parseFloat(document.getElementById('iva').value);
    
		
	  
      var input1 = parseFloat(document.getElementById('input1').value); 
      var input2 = parseFloat(document.getElementById('input2').value); 
	  var input3 = parseFloat(document.getElementById('input3').value); 
      
		
		// Realizar los cálculos deseados
      var resultado = input1 * ((input10/100)+1);
		
		
      // Mostrar el resultado en el campo de entrada
      document.getElementById('resultado').value = resultado;
    }
  </script>
</head>
<body>
  <p>
    <label for="select">Select:</label>
    <select id="iva" name="select" id="select">
      <option value="21">21 %</option>
      <option value="10.5">10.5 %</option>
      <option value="0">0 %</option>
      <option value="27">27 %</option>
    </select>
  </p>
  <p>Costo:
  <input type="number" id="input1" oninput="calcularResultado()">
  </p>
  <p>Bonif:
    <input type="number" id="input2" value="0" oninput="calcularResultado()">
  </p>
  <p>Fletes
    <input type="number" id="input3" value="0" oninput="calcularResultado()">
  </p>
  <p>Total
    <input type="number" disabled="disabled" id="resultado" readonly>
  </p>
</body>
</html>



