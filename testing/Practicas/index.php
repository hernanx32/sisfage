<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php
//Verificamos que exista el archivo en eldirectorio
	$dir_archivo = "config.inc";
	
	if (file_exists($dir_archivo)){
		echo "El Archivo Existe!!";	
		
		$esc_archivo=fopen($dir_archivo,"w") or die("Se Prod un error al crear el archivo");
		
		fwrite($esc_archivo, ".$SALUDO.='HOLA';");
		
		
	}else{
		echo "El Archivo no existe";
		
	}
	
	?>	
		
</body>
</html>