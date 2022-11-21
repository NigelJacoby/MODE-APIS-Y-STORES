<?php
include '../conexion.php';

$json=array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $p_idTienda=$_POST['p_idTienda'];
        $p_tieNombre=$_POST['p_tieNombre'];
        $p_tieImagen=$_POST['p_tieImagen'];
        $p_tieURLWeb=$_POST['p_tieURLWeb'];
        $p_tieDescripcion=$_POST['p_tieDescripcion'];
        $p_tieCorreo=$_POST['p_tieCorreo'];
        $p_tieTelefono=$_POST['p_tieTelefono'];
        $p_tieDireccion=$_POST['p_tieDireccion'];
        $p_tieCiudad=$_POST['p_tieCiudad'];
        $p_tieEstado=$_POST['p_tieEstado'];
        $p_tieLatitud=$_POST['p_tieLatitud'];
        $p_tieLongitud=$_POST['p_tieLongitud'];
        $p_idRubroTienda=$_POST['p_idRubroTienda'];
        

        //Verificación de existencia de ruta imagen
        if(empty($p_tieImagen)){
            $imagePath = "";
        }else{
            //Generación de codigo único
            $filePath = uniqid($p_idTienda);
            //Construimos la ruta de la imagen
            $imagePath = "imgPerfilTienda/".$filePath.".jpeg";
            //Insertando imagen en el directorio del servidor
            file_put_contents($imagePath, base64_decode($p_tieImagen));
        }
        echo $imagePath;

        /*/Borar Antigua Imagen
        $consulta="CALL sp_c_traer_ruta_antigua_registrotienda('{$p_idTienda}')";
        $resultado=mysqli_query($conexion,$consulta);
        while($request=mysqli_fetch_array($resultado)){
            $rutaAntigua = $request["tieImagen"];
        }
        //echo $rutaAntigua;

        if(empty($rutaAntigua)){
            
        }else{
            if(unlink("./{$rutaAntigua}")){
                echo $rutaAntigua;
                echo '<br>';
                echo 'Borrado Exitoso';

            }else{
                echo 'No borro';
            }
        }*/

        //Actualizar Datos en la BD
        $update="CALL sp_m_datos_tienda_registrotienda('{$p_idTienda}','{$p_tieNombre}','{$imagePath}','{$p_tieURLWeb}','{$p_tieDescripcion}','{$p_tieCorreo}','{$p_tieTelefono}','{$p_tieDireccion}','{$p_tieCiudad}','{$p_tieEstado}','{$p_tieLatitud}','{$p_tieLongitud}','{$p_idRubroTienda}')";
        $resultado=mysqli_query($conexion,$update);
        if($resultado){
            echo 'Actualizacion Correcta';
        }
        else{
            echo 'Fallo en la Actualizacion';
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
?>