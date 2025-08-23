<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CONEXION SQL SERVER</title>
</head>

<body>
	
	
	<?php
	

$serverName = "srv_bas_sql"; 
$database = "APA";
$username = "sa";
$password = "sa47296+";

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta con fetch
    $stmt = $conn->query("SELECT idUsuario,NumeroExterno FROM TRON_RecepcionesMercaderia");

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       echo $row['idUsuario'] . " - " . $row['NumeroExterno'] ."<br>";
		// echo $row['idUsuario'] . " - " . $row['idRecepcion'] . " - " . $row['NumeroExterno'] . "<br>";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
	
*/	
	
?>
	
	
	
</body>
</html>