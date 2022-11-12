<?php
include '../conexion.php';

$json=array();
    if(isset($_GET["p_prodDescripcion"])){
        $p_prodDescripcion=$_GET['p_prodDescripcion'];
        $consulta="CALL c_llamarproductos_mitienda('{$p_prodDescripcion}')";
        $resultado=mysqli_query($conexion,$consulta);
        while($request=mysqli_fetch_array($resultado)){
            $result["idProducto"]=$request['idProducto'];
            $result["proImagen"]=$request['proImagen'];
            $result["proDescripcion"]=$request['proDescripcion'];
            $result["proPrecioCostoPromedio"]=$request['proPrecioCostoPromedio'];
            $result["proPrecioVentaRecomendado"]=$request['proPrecioVentaRecomendado'];
            $result["proUnidadMedida "]=$request['proUnidadMedida '];
            $json['producto_llamado'][]=$result;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
    else{
    die("FALLO LLAMADA DE PRODUCTOS");
}