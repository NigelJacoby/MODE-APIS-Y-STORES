<?php
include 'conexion.php';

$json=array();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nCorreo=$_POST['nCorreo'];
        $nVariedad=$_POST['nVariedad'];
        $nCantidad=$_POST['nCantidad'];
        $nPrecio=$_POST['nPrecio'];
        $nDescripcion=$_POST['nDescripcion'];
        $nFoto=$_POST['nFoto'];
        $nfechacaducidad=$_POST['nfechacaducidad'];
        $nombre=rand();
        $nombre.=$nCorreo;
        $nombre.=rand();
        $PATH="micarpeta/{$nombre}.png";

        $insert="CALL REG_PUBLICACION('{$nCorreo}','{$nVariedad}','{$nCantidad}','{$nPrecio}','{$nDescripcion}','{$PATH}','{$nfechacaducidad}')";
        $resultado_insert=mysqli_query($conexion,$insert);
        if($resultado_insert){
            try{
                file_put_contents($PATH,base64_decode($nFoto));
                echo 'Registro realizado';
            }catch(Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
        }else{
            echo 'Registro no realizado';
        }
    }
?>