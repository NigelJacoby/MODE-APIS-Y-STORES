<?php
include 'conexion.php';
$c_id_persona=$_GET['id_persona'];
$c_id_modo_pago=$_GET['id_modo_pago'];
$c_id_cant_pro=$_GET['cant_pro'];
$c_id_precio_total=$_GET['precio_total'];
$c_id_producto=$_GET['id_producto'];
$c_collares_restantes=$_GET['collares_restantes'];

$json = array();
        $consulta="CALL registrar_intercambio_producto(".$c_id_persona.",".$c_id_modo_pago.",".$c_id_cant_pro.",".$c_id_precio_total.",".$c_id_producto.",".$c_collares_restantes.")";
        $resultado = mysqli_query($conexion,$consulta);
        while($registro = mysqli_fetch_array($resultado)){
            $result["IdVenta"]=$registro['IdVenta'];
            $result["venFecha"]=$registro['venFecha'];
            $result["venEstado"]=$registro['venEstado'];
            $result["proNombre"]=$registro['proNombre'];
            $result["detCantidad"]=$registro['detCantidad'];
            $result["detPrecio"]=$registro['detPrecio'];
            $json['consulta'][]=$result;
        }
        mysqli_close($conexion);
        echo json_encode($json);
?>