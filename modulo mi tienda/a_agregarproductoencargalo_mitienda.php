<?php
include '../conexion.php';

$json=array();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $p_lptStock=$_POST['p_lptStock'];
        $p_lptStockMinimo=$_POST['p_lptStockMinimo'];
        $p_lptImagen1=$_POST['p_lptImagen1'];
        $p_lptImagen2=$_POST['p_lptImagen2'];
        $p_lptImagen3=$_POST['p_lptImagen3'];
        $p_lptPrecioCompra=$_POST['p_lptPrecioCompra'];
        $p_lptPrecioVenta=$_POST['p_lptPrecioVenta'];
        $p_lpEstado=$_POST['p_lptStock'];
        
        $insert="CALL a_agregarproductoencargalo_mitienda('{$p_lptStock}','{$p_lptStockMinimo}','{$p_lptImagen1}','{$p_lptImagen2}','{$p_lptImagen3}','{$p_lptPrecioCompra}','{$p_lptPrecioVenta}','{$p_lpEstado}')";
        $resultado=mysqli_query($conexion,$insert);
        if($resultado){
            echo 'Producto encargalo añadido con exito';
        }
        else{
            echo 'Falla en agregar producto encargalo';
        }
    }