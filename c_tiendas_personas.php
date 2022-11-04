<?php
include 'enchufe.php';

$json=array();
    if(isset($_GET["p_idDocumentoPersona"])){
        $p_idDocumentoPersona=$_GET['p_idDocumentoPersona'];
        $consulta="CALL c_tiendas_personas('{$p_idDocumentoPersona}')";
        $resultado=mysqli_query($conexion,$consulta);
        while($request= mysqli_fetch_array($resultado)){
            $result["idTienda"]=$request['idTienda'];
            $result["tieNombre"]=$request['tieNombre'];
            $json['tiendas_personas'][]=$result;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }else{
        die("RIP");
    }
?>