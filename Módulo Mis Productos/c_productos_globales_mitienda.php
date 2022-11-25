<?php
include 'conexion.php';

$json=array();
    if(isset($_GET["p_proDescripcion"])){
        $p_proDescripcion=$_GET['p_proDescripcion'];

        $consulta="CALL sp_c_productos_globales_mitienda('{$p_proDescripcion}')";
        
        $resultado=mysqli_query($conexion,$consulta);
        while($request=mysqli_fetch_array($resultado)){
            $result["idProducto"]=$request['idProducto'];
            $result["proImagen"]=$request['proImagen'];
            $result["proDescripcion"]=$request['proDescripcion'];
            $result["proPrecioCostoPromedio"]=$request['proPrecioCostoPromedio'];
            $result["proPrecioVentaRecomendado"]=$request['proPrecioVentaRecomendado'];
            $result["cpNombre"]=$request['cpNombre'];
            $json['lista_productos'][]=$result;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }else{
        die("Fallo en consultar informacion de los productos");
    }
?>