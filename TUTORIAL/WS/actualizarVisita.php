<?php
include 'conexion.php';
$c_idvisita=$_POST['idvisita'];
$c_fecha_up=$_POST['fecha_up'];
$c_hora_up=$_POST['hora_up'];
$c_comentario_up=$_POST['comentario_up'];

$consulta="CALL actualizar_visita(".$c_idvisita.",'".$c_fecha_up."','".$c_hora_up."','".$c_comentario_up."')";
mysqli_query($conexion,$consulta) or die (mysqli_error($conexion));
mysqli_close($conexion);

?>