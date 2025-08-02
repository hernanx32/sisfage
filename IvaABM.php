<?php
include("Modulos/conex.php");

if ($_POST['accion'] == 'agregar') {
    $nombre = $_POST['nombre'];
    $porcentaje = $_POST['porcentaje'];
    $conn->query("INSERT INTO iva (nombre, porcentaje) VALUES ('$nombre', '$porcentaje')");
    exit;
}

if ($_POST['accion'] == 'editar') {
    $id = $_POST['id'];
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $conn->query("UPDATE iva SET $campo = '$valor' WHERE id_iva = $id");
    exit;
}

if ($_POST['accion'] == 'borrar') {
    $id = $_POST['id'];
    $conn->query("DELETE FROM iva WHERE id_iva = $id");
    exit;
}
?>