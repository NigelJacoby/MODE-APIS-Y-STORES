<?php
include 'conexion.php';

$json=array();
    if(isset($_GET["p_categoria"])&&isset($_GET["p_idTienda"])){
        $p_categoria=$_GET['p_categoria'];
        $p_idTienda=$_GET['p_idTienda'];
        $consulta="CALL sp_c_productos_por_tienda_mitienda('{$p_categoria}', '{$p_idTienda}')";
        $resultado=mysqli_query($conexion,$consulta);

        while($request= mysqli_fetch_array($resultado)){
            $result["idListadoProductoTienda"]=$request['idListadoProductoTienda'];
            $result["lptStock"]=$request['lptStock'];
            $result["lptStockMinimo"]=$request['lptStockMinimo'];
            $result["lptImagen1"]=$request['lptImagen1'];
            $result["lptImagen2"]=$request['lptImagen2'];
            $result["lptImagen3"]=$request['lptImagen3'];
            $result["lptPrecioCompra"]=$request['lptPrecioCompra'];
            $result["lptPrecioVenta"]=$request['lptPrecioVenta'];
            $result["idProducto"]=$request['idProducto'];
            $result["proDescripcion"]=$request['proDescripcion'];
            $result["idCategoriaProducto"]=$request['idCategoriaProducto'];
            $result["cpNombre"]=$request['cpNombre'];
            $json['productos_tienda'][]=$result;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }else{
        die("Error en la conexion");
    }
?>