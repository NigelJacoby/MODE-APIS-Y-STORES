<?php
include 'conexion.php';

$json=array();

    if(isset($_GET["nContenido"]) 
    && isset($_GET["nidUsuario"]) 
    && isset($_GET["nidConversacion"]) 
    && isset($_GET["nfecha"])){
        $nContenido=$_GET['nContenido'];
        $nidUsuario=$_GET['nidUsuario'];
        $nidConversacion=$_GET['nidConversacion'];
        $nfecha=$_GET['nfecha'];

        $insert="CALL REG_MENSAJE('{$nContenido}','{$nidUsuario}','{$nidConversacion}','{$nfecha}')";
        $resultado_insert=mysqli_query($conexion,$insert);

        if($resultado_insert){
            $json['Consulta']="Registrado";
            mysqli_close($conexion);
            echo json_encode($json);
        }
        else{
            $json['Consulta']="No Registrado";
            mysqli_close($conexion);
            echo json_encode($json);
        }
    }
    else{
        $json['Consulta']="Fallo";
        mysqli_close($conexion);
        echo json_encode($json);
    }


?>