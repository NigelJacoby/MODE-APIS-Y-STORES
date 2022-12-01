<?php
include 'conexion.php';

$json=array();
    if(isset($_GET["p_idTienda"])){
        $p_idTienda=$_GET['p_idTienda'];
        $consulta="CALL sp_c_informacion_por_tienda_registrotienda('{$p_idTienda}')";
        $resultado=mysqli_query($conexion,$consulta);
        while($request=mysqli_fetch_array($resultado)){
            $result["tieNombre"]=$request['tieNombre'];
            $result["tieImagenurl"]= $request['tieImagen'];
            $result["tieURLWeb"]=$request['tieURLWeb'];
            $result["tieDescripcion"]=$request['tieDescripcion'];
            $result["tieCorreo"]=$request['tieCorreo'];
            $result["tieTelefono"]=$request['tieTelefono'];
            $result["tieDireccion"]=$request['tieDireccion'];
            $result["tieCiudad"]=$request['tieCiudad'];
            $result["tieEstado"]=$request['tieEstado'];
            $result["tieVentasMensuales"]=$request['tieVentasMensuales'];
            $result["tieInventarioEstimado"]=$request['tieInventarioEstimado'];
            $result["tieLatitud"]=$request['tieLatitud'];
            $result["tieLongitud"]=$request['tieLongitud'];
            $result["idRubroTienda"]=$request['idRubroTienda'];
            $json['tiendas_info'][]=$result;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }else{
        die("Fallo en consultar informacion de tienda");
    }
?>