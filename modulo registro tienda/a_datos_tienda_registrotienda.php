<?php
include '../conexion.php';

$json=array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $p_tienombre=$_POST['p_tieNombre'];
        $p_tieImagen=$_POST['p_tieImagen'];
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

        $nombreimagen=rand();
        $nombreimagen.=$p_idDocumentoPersona;
        $nombreimagen.=rand();

        $PATH="imgPerfilTienda/{$nombreimagen}.png";

        $insert="CALL sp_a_datos_tienda_registrotienda('{$p_tienombre}','{$p_tieImagen},'{$p_tieURLWeb}','{$p_tieDescripcion}','{$p_tieCorreo}','{$p_tieTelefono}','{$p_tieDireccion}','{$p_tieCiudad}','{$p_tieEstado}','{$p_tieVentasMensuales}','{$p_tieInventarioEstimado}','{$p_idDocumentoPersona}','{$p_idRubroTienda}','{$p_tieLatitud}','{$p_tieLongitud}')";
        $resultado=mysqli_query($conexion,$insert);
        if($resultado){
            try{
                file_put_contents($PATH,base64_decode($p_tieImagen));
                echo 'Registro exitoso de datos tienda';
            }
            catch(Exception $error) {
                echo 'Bug Catched: ', $error->getMessage(), "\n";                
            }
        }
        else{
            echo 'Fallo en Registrar Datos tienda';
        }
    }
?>