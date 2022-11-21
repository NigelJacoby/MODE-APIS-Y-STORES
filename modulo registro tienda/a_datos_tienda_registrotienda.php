<?php
include '../conexion.php';

$json=array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $p_tienombre=$_POST['p_tieNombre'];
        $p_tieimagen=$_POST['p_tieImagen'];
        $p_tieURLWeb=$_POST['p_tieURLWeb'];
        $p_tieDescripcion=$_POST['p_tieDescripcion'];
        $p_tieCorreo=$_POST['p_tieCorreo'];
        $p_tieTelefono=$_POST['p_tieTelefono'];
        $p_tieDireccion=$_POST['p_tieDireccion'];
        $p_tieCiudad=$_POST['p_tieCiudad'];
        $p_tieEstado=$_POST['p_tieEstado'];
        $p_tieVentasMensuales=$_POST['p_tieVentasMensuales'];
        $p_tieInventarioEstimado=$_POST['p_tieInventarioEstimado'];
        $p_idDocumentoPersona=$_POST['p_idDocumentoPersona'];
        $p_idRubroTienda=$_POST['p_idRubroTienda'];
        $p_tieLatitud=$_POST['p_tieLatitud'];
        $p_tieLongitud=$_POST['p_tieLongitud'];


        //Verificación de existencia de ruta imagen
        if(empty($p_tieimagen)){
            $imagePath = "";
        }else{
            //Generación de codigo único
            $filePath = uniqid($p_idDocumentoPersona);
            //Construimos la ruta de la imagen
            $imagePath = "imgPerfilTienda/".$filePath.".jpeg";
            //Insertando imagen en el directorio del servidor
            file_put_contents($imagePath, base64_decode($p_tieimagen));
        }


        $insert="CALL sp_a_datos_tienda_registrotienda('{$p_tienombre}','{$imagePath}','{$p_tieURLWeb}','{$p_tieDescripcion}','{$p_tieCorreo}','{$p_tieTelefono}','{$p_tieDireccion}','{$p_tieCiudad}','{$p_tieEstado}','{$p_tieVentasMensuales}','{$p_tieInventarioEstimado}','{$p_idDocumentoPersona}','{$p_idRubroTienda}','{$p_tieLatitud}','{$p_tieLongitud}')";
        $resultado=mysqli_query($conexion,$insert);
        if($resultado){
            echo 'Registro exitoso de datos tienda';
        }
        else{
            echo 'Fallo en Registrar Datos tienda';
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
?>
