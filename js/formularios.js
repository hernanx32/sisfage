// JavaScript Document
// FUNCION COLOCAR MAYUSCULAS   
//<input type="text" id="Nombre1" onkeyup="txtMayuscula('input')">   (CONVIERTE EN MAYUSCULA CUANDO SALE DEL INPUT)
//<input type="text" id="nombre2" oninput="txtMayuscula('input')">   (CONVIERTE EN MAYUSCULA MIENTRAS SE ESCRIBE)
function txtMayuscula(txtid) {
	var input = document.getElementById(txtid);
    input.value = input.value.toUpperCase();
}

//<input type="number" name="costo" id="costo" onblur="ponerCeroSiVacio(this)" step="0.01" min="0"></td>
function ponerCeroSiVacio(input, cantdesimal) {
    // Si el campo está vacío, poner 0
	console.log(cantdesimal);
    if (input.value.trim() === "") {
		input.value = 0;
	}else{
	    input.value = parseFloat(input.value);
		input.value = parseFloat(input.value).toFixed(cantdesimal);   //REDONDE EJ. toFixed(2) SI COLOCA 22.236 LO REDONDE A 22.24  
	}
}


//INCLUIR EN EL INPUT PARA QUE BAJE CON ENTER
//     onKeyPress="return bajarEnter(this, event)"
//ESTE CODIGO SE DEBE INCLUIR EN EL FORMULARIO 
function bajarEnter (field, event) {
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if (keyCode == 13) {
		var i;
		for (i = 0; i < field.form.elements.length; i++)
			if (field == field.form.elements[i])
				break;
		i = (i + 1) % field.form.elements.length;
		field.form.elements[i].value=''; 
		field.form.elements[i].focus();
		return false;
		} 
		else
	return true;
		
}



