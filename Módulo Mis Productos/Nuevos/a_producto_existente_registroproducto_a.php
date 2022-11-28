<?php
include 'conexion.php';

$json=array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $p_lptDescripcionProductoTienda=$_POST['p_lptDescripcionProductoTienda'];
        $p_lptStock=$_POST['p_lptStock'];
        $p_lptUnidadMedida=$_POST['p_lptUnidadMedida'];
        $p_lptStockMinimo=$_POST['p_lptStockMinimo'];
        $p_lptImagen1=$_POST['p_lptImagen1'];
        $p_lptPrecioCompra=$_POST['p_lptPrecioCompra'];
        $p_lptPrecioVenta=$_POST['p_lptPrecioVenta'];
        $p_idProducto=$_POST['p_idProducto'];
        $p_idTienda=$_POST['p_idTienda'];

        $insert="CALL sp_a_producto_existente_registroproducto('{$p_lptDescripcionProductoTienda}','{$p_lptStock}','{$p_lptUnidadMedida}','{$p_lptStockMinimo}','{$p_lptImagen1}','{$p_lptPrecioCompra}','{$p_lptPrecioVenta}','{$p_idProducto}','{$p_idTienda}')";
        $resultado=mysqli_query($conexion,$insert);
        if($resultado){
            echo 'Registro exitoso de Producto';
        }
        else{
            echo 'Fallo en Registrar Producto';
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
?>