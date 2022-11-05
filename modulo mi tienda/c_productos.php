<?php
include 'enchufe.php';

$json=array();
    if(isset($_GET["p_prodDescripcion"])){
        $p_prodDescripcion=$_GET['p_prodDescripcion'];
        $consulta="CALL c_productos('{$p_prodDescripcion}')";
        $resultado=mysqli_query($conexion,$consulta);
        while($request=mysqli_fetch_array($resultado)){
            $result["idProducto"]=$request['idProducto'];
            
        }
    }