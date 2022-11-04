<?php
include 'conexion.php';

$json=array();
    if(isset($_GET["ncorreovendedor"]) 
    && isset($_GET["ncorreocomprador"]) 
    && isset($_GET["nidPublicacionUsuario"]) 
    && isset($_GET["ncantidad"])
    && isset($_GET["nprecioAcordado"])
    && isset($_GET["ndescripcion"])
    && isset($_GET["nfecha"])){
        $ncorreovendedor=$_GET['ncorreovendedor'];
        $ncorreocomprador=$_GET['ncorreocomprador'];
        $nidPublicacionUsuario=$_GET['nidPublicacionUsuario'];
        $ncantidad=$_GET['ncantidad'];
        $nprecioAcordado=$_GET['nprecioAcordado'];
        $ndescripcion=$_GET['ndescripcion'];
        $nfecha=$_GET['nfecha'];

        $insert="CALL REG_VENTA('{$ncorreovendedor}','{$ncorreocomprador}','{$nidPublicacionUsuario}','{$ncantidad}','{$nprecioAcordado}','{$ndescripcion}','{$nfecha}')";
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