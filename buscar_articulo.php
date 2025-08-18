<?php
// buscar_articulo.php
$conexion = new mysqli("127.0.0.1", "root", "LauLukLulu477!", "bases");
$q = $conexion->real_escape_string($_POST['q']);

$sql = "SELECT id_articulo, cod_bar, desc_corta, precio1 
        FROM articulo 
        WHERE cod_bar = '$q' 
        OR desc_corta LIKE '%$q%' 
        OR desc_larga LIKE '%$q%' 
        LIMIT 10";

$res = $conexion->query($sql);
$datos = [];
while($row = $res->fetch_assoc()){
    $datos[] = $row;
}
echo json_encode($datos);
?>
