<?php
include 'enchufe.php';

$json=array();
    if(isset($_GET["p_prodDescripcion"])){
        $p_prodDescripcion=$_GET['p_prodDescripcion'];
        $consulta="CALL c_productos('{$p_prodDescripcion}')";
        $resultado=mysqli_query($conexion,$consulta);
        while($request=mysqli_fetch_array($resultado)){
            $result["idProducto"]=$request['idProducto'];
            $result["prodImagen"]=$request['prodImagen'];
            $result["prodDescripcion"]=$request['prodDescripcion'];
            $result["proPrecioCosto"]=$request['proPrecioCosto'];
            $result["proPrecioVenta"]=$request['proPrecioVenta'];
            $result["proUndidadMedida "]=$request['proUndidadMedida '];
            $json['producto'][]=$result;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
    else{
    die("RIP");
}