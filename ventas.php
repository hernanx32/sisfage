<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Ventas';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
//include("Modulos/Ventas/ventas.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);
?>
<input type="text" id="busqueda" placeholder="Código de barra o descripción">
<div id="resultados" style="display:none;"></div>

<table border="1" id="tablaVenta">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>


<script>
$(document).ready(function(){
    $("#busqueda").on("keyup", function(e){
        let query = $(this).val();
        if(query.length >= 3){
            $.post("buscar_articulo.php", {q: query}, function(data){
                let res = JSON.parse(data);
                if(res.length == 1){
                    agregarArticulo(res[0]);
                } else if(res.length > 1){
                    let html = "<ul>";
                    res.forEach(a => {
                        html += `<li onclick='agregarArticulo(${JSON.stringify(a)})'>
                                    ${a.cod_bar} - ${a.desc_corta} - $${a.precio1}
                                 </li>`;
                    });
                    html += "</ul>";
                    $("#resultados").html(html).show();
                }
            });
        }
    });
});

function agregarArticulo(art){
    $("#tablaVenta tbody").append(`
        <tr>
            <td>${art.id_articulo}</td>
            <td>${art.desc_corta}</td>
            <td>${art.precio1}</td>
        </tr>
    `);
    $("#resultados").hide();
    $("#busqueda").val("");
}
</script>
