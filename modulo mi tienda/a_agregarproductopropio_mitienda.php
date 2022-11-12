<?php
include '../conexion.php';

$json=array();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $p_proImagen=$_POST['p_proImagen'];
        $p_proDescripcion=$_POST['p_proDescripcion'];
        $p_proPrecioCostoPromedio=$_POST['p_proPrecioCostoPromedio'];
        $p_proPrecioVentaRecomendado=$_POST['p_proPrecioVentaRecomendado'];
        $p_proUnidadMedida=$_POST['p_proUnidadMedida'];
        $p_proOrigenProducto=$_POST['p_proOrigenProducto'];

        $insert="CALL a_agregarproductopropio_mitienda('{$p_proImagen}','{$p_proDescripcion}','{$p_proPrecioCostoPromedio}','{$p_proPrecioVentaRecomendado}','{$p_proUnidadMedida}','{$p_proOrigenProducto}')";
        $resultado=mysqli_query($conexion,$insert);
        if($resultado){
            echo 'Producto propio añadido con exito';
        }
        else{
            echo 'Falla en agregar producto propio';
        }
    }