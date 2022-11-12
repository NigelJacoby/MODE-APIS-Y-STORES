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
        
        $nombreimagen=rand();
        $nombreimagen.=$p_idTienda;
        $nombreimagen.=rand();

        $PATH="imgPerfilTienda/{$nombreimagen}.png";

        $insert="CALL sp_m_Datos_Tienda_registrotienda('{$p_idTienda}','{$p_tieNombre}','{$p_tieImagen}','{$p_tieURLWeb}','{$p_tieDescripcion}','{$p_tieCorreo}','{$p_tieTelefono}','{$p_tieDireccion}','{$p_tieCiudad}','{$p_tieEstado}','{$p_tieLatitud}','{$p_tieLongitud}','{$p_idRubroTienda}')";
        $resultado=mysqli_query($conexion,$insert);
        if($resultado){
            try{
                file_put_contents($PATH,base64_decode($p_tieImagen));
                echo 'Buen Registrex';
            }catch(Exception $error) {
                echo 'Examinar bicho: ',  $error->getMessage(), "\n";
            }
        }
        else{
            echo 'Fail updating store, Waiting for hot fix';
        }

    }
?>