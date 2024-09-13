// JavaScript Document

    $(document).ready(function() {
      // Escuchar el evento 'input' en el campo de búsqueda
      $('#searchTerm').on('input', function() {
        var searchTerm = $(this).val(); // Obtener el término de búsqueda
        // Enviar la solicitud AJAX al servidor
        $.ajax({
          url: '../articulos/busqueda.php', // Ruta del archivo de backend que realizará la búsqueda
          method: 'POST',
          data: { searchTerm: searchTerm }, // Enviar el término de búsqueda como datos
          success: function(response) {
            // Actualizar el contenedor de resultados con los datos recibidos
            $('#searchResults').html(response);
          }
        });
      });
    });

    //   <input type="text" id="miInput" onkeyup="ConMayus()">
    function txtMayuscula(txtid) {
      var input = document.getElementById(txtid);
      input.value = input.value.toUpperCase();
    }

function ingCosto() {
	var TipoIva = parseFloat(document.getElementById('TipoIva').value); // Enviar el término de búsqueda como datos
	var Costo = parseFloat(document.getElementById('Costo').value);
			   	
	document.getElementById('LA1').value = '0';
	document.getElementById('LB1').value = '0';
	document.getElementById('LC1').value = '0';
	document.getElementById('LD1').value = '0';

	document.getElementById('LA2').value = '0';
	document.getElementById('LB2').value = '0';
	document.getElementById('LC2').value = '0';
	document.getElementById('LD2').value = '0';

	}
	  function calcularResultado() {
			var input1 = parseFloat(document.getElementById('TipoIva').value); // Enviar el término de búsqueda como datos
			var input2 = parseFloat(document.getElementById('Costo').value);
			
		   	
		  var input4 = parseFloat(document.getElementById('BonifImp').value);
		  var BonifPor = (100*input4)/input2;
		  document.getElementById('BonifPor').value = BonifPor;
		  
		
		  
		  var input7 = parseFloat(document.getElementById('FleteImp').value);
		  var FletePor = (100*input7)/input2;
		  document.getElementById('FletePor').value = FletePor;
		  	
		  var input8 = parseFloat(document.getElementById('cargosFImp').value);
		  var cargosFPor = (100*input8)/input2;
		  document.getElementById('cargosFPor').value = cargosFPor;
		   	
		  
			
          var resultado1 = input2 - input4 + input7 + input8;
          var resultado2 = (input2 * ((input1/100)+1))-input4 + input7 + input8;
			
          document.getElementById('Cost_siva').value = resultado1;
          document.getElementById('Cost_civa').value = resultado2;

          document.getElementById('LA1').value = '0';
          document.getElementById('LB1').value = '0';
          document.getElementById('LC1').value = '0';
          document.getElementById('LD1').value = '0';

          document.getElementById('LA2').value = '0';
          document.getElementById('LB2').value = '0';
          document.getElementById('LC2').value = '0';
          document.getElementById('LD2').value = '0';

			document.getElementById('LA3').value = resultado1;
			document.getElementById('LB3').value = resultado1;
			document.getElementById('LC3').value = resultado1;
      document.getElementById('LD3').value = resultado1;

			document.getElementById('LA4').value = resultado2;
			document.getElementById('LB4').value = resultado2;
			document.getElementById('LC4').value = resultado2;
      document.getElementById('LD4').value = resultado2;


		}  
	  	  
	  function calResPorBoni() {
		  
		   	var BonifPor = parseFloat(document.getElementById('BonifPor').value);
	  	   	var Costo = parseFloat(document.getElementById('Costo').value);
		  
		  var res1= (BonifPor/100)*Costo;
		   
		  document.getElementById('BonifImp').value = res1;
		  calcularResultado();
	   }
	  	  function calResPorFlete() {
	
			var FletePor = parseFloat(document.getElementById('FletePor').value);
	  	   	var Costo = parseFloat(document.getElementById('Costo').value);
		  
			  var res2= (FletePor/100)*Costo;
			   
	
		  document.getElementById('FleteImp').value = res2;
	
		  calcularResultado();
	   }
	  
	   function calResPorCarFin() {
	

	  	var cargosFPor = parseFloat(document.getElementById('cargosFPor').value);
	   	var Costo = parseFloat(document.getElementById('Costo').value);
		  
	  var res3= (cargosFPor/100)*Costo;
		   
	  document.getElementById('cargosFImp').value = res3;
		  calcularResultado();
	   }
	  
     function calcularPorc(valor) {
      var fila = 'L'+valor+'1';
      var Cost_siva = parseFloat(document.getElementById('Cost_siva').value);
      var Cost_civa = parseFloat(document.getElementById('Cost_civa').value);
      
      var porcAumen = parseFloat(document.getElementById(fila).value);
      

      document.getElementById('L'+valor+'2').value = (Cost_civa * porcAumen)/100;
      document.getElementById('L'+valor+'3').value = (Cost_siva * porcAumen)/100 + Cost_siva;
      document.getElementById('L'+valor+'4').value = (Cost_civa * porcAumen)/100 + Cost_civa;

	   }
     



