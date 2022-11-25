<?php
include 'conexion.php';

$json=array();
    if(isset($_GET["p_idListadoProductoTienda"])){
        $p_idListadoProductoTienda=$_GET['p_idListadoProductoTienda'];
        $update="CALL sp_m_producto_inactivo_registroproducto('{$p_idListadoProductoTienda}')";
        $resultado=mysqli_query($conexion,$update);
        if($resultado){
            echo 'Producto INACTIVO';
        }
        else{
            echo 'Fallo en el cambio';
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }else{
        die("Error en la conexion");
    }
?>