<?php
include 'conexion.php';

$json=array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $p_lptImagen1=$_POST['p_lptImagen1'];
        $p_lptImagen2=$_POST['p_lptImagen2'];
        $p_lptImagen3=$_POST['p_lptImagen3'];
        $p_lptPrecioCompra=$_POST['p_lptPrecioCompra'];
        $p_lptPrecioVenta=$_POST['p_lptPrecioVenta'];
        $p_idTienda=$_POST['p_idTienda'];
        $p_proDescripcion=$_POST['p_proDescripcion'];

        $insert="CALL sp_a_producto_propio_registroproducto('{$p_lptImagen1}','{$p_lptImagen2}','{$p_lptImagen3}','{$p_lptPrecioCompra}','{$p_lptPrecioVenta}','{$p_idTienda}','{$p_proDescripcion}')";
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