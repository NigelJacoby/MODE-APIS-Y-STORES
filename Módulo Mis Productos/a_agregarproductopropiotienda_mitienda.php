<?php
include '../conexion.php';

$json=array();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $p_lptStock=$_POST['p_lptStock'];
        $p_lptStockMinimo=$_POST['p_lptStockMinimo'];
        $p_lptImagen1=$_POST['p_lptImagen1'];
        $p_lptPrecioCompra=$_POST['p_lptPrecioCompra'];
        $p_lptPrecioVenta=$_POST['p_lptPrecioVenta'];
        $p_lpEstado=$_POST['p_lptStock'];

        $insert="CALL sp_a_agregarproductopropiotienda_mitienda('{$p_lptStock}','{$p_lptStock}','{$p_lptStock}','{$p_lptStock}','{$p_lptStock}','{$p_lptStock}')";
        $resultado=mysqli_query($conexion,$insert);
        if($resultado){
            echo 'Producto propio agregado a la tienda';
        }
        else{
            echo 'Falla en agregar producto propio a la tienda';
        }
    }
?>