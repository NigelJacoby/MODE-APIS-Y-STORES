<?php
include '../conexion.php';

$json=array();
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $p_idListadoProductoTienda=$_POST['p_idListadoProductoTienda'];
        $p_lptPrecioCompra=$_POST['p_lptPrecioCompra'];
        $p_lptPrecioVenta=$_POST['p_lptPrecioVenta'];

        $insert="CALL sp_m_detalleproducto_mitienda('{$p_idListadoProductoTienda}','{$p_lptPrecioCompra}','{$p_lptPrecioVenta}')";
        $resultado=mysqli_query($conexion,$insert);
        if($resultado){
            echo 'Detalles de producto modificado con exito';
        }
        else{
            echo 'ERROR: Detalle de producto no modificado';
        }
    }
?>