<?php
include 'conexion.php';

$json=array();
    if(isset($_GET["nCorreo"]) 
    && isset($_GET["nidPublicacionUsuario"])){
        $nCorreo=$_GET['nCorreo'];
        $nidPublicacionUsuario=$_GET['nidPublicacionUsuario'];
        $consulta="CALL CON_CONVERSACION('{$nCorreo}','{$nidPublicacionUsuario}')";
        $resultado=mysqli_query($conexion,$consulta);
        while($fila = mysqli_fetch_array($resultado)){
            $json['Consulta'][]= $fila;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }else{
        die("Fallo la conexion");
    }
?>