<?php
include '../conexion.php';

$json=array();
    if(isset($_GET["p_filtro"])&& isset($_GET["p_idTienda"])){
        $p_filtro=$_GET['p_filtro'];
        $p_idTienda=$_GET['p_idTienda'];
        $consulta="CALL sp_c_listafiltroproducto_mitienda('{$p_filtro}')";
        $resultado=mysqli_query($conexion,$consulta);
        while(($request=mysqli_fetch_array($resultado))){
            $result[""]=$request[''];
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
    else{
        die("FALLO EN FILTRAR PRODUCTOS");
    }
?>