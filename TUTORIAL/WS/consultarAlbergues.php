<?php
include 'conexion.php';

$json = array();
        $consulta="CALL consultar_albergues()";
        $resultado = mysqli_query($conexion,$consulta);
        while($registro = mysqli_fetch_array($resultado)){
        $result["idAlbergue"]=$registro['idAlbergue'];
        $result["albNombre"]=$registro['albNombre'];
        $result["albCantAnimales"]=$registro['albCantAnimales'];
        $result["albCell"]=$registro['albCell'];
        $result["albImgLogo"]=$registro['albImgLogo'];
        $result["ubicacionDesc"]=$registro['ubicacionDesc'];
        $json['albergues'][]=$result;
        }

        mysqli_close($conexion);
        echo json_encode($json);

?>