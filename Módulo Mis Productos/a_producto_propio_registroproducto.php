<?php
include 'conexion.php';

$json=array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $p_lptImagen1=$_POST['p_lptImagen1'];
        $p_lptImagen2=$_POST['p_lptImagen2'];
        $p_lptImagen3=$_POST['p_lptImagen3'];
        $p_lptPrecioCompra=$_POST['p_lptPrecioCompra'];
        $p_lptPrecioVenta=$_POST['p_lptPrecioVenta'];
        $p_idTienda=$_POST['p_idTienda'];
        $p_proDescripcion=$_POST['p_proDescripcion'];

        //Verificación de existencia de ruta imagen
        if(empty($p_lptImagen1)){
            $imagePath1 = "";
        }else{
            //Generación de codigo único
            $filePath1 = uniqid($p_idTienda);
            //Construimos la ruta de la imagen
            $imagePath1 = "imgProductosTienda/".$filePath1.".jpeg";
            //Insertando imagen en el directorio del servidor
            file_put_contents($imagePath1, base64_decode($p_lptImagen1));
        }

        //Verificación de existencia de ruta imagen
        if(empty($p_lptImagen2)){
            $imagePath2 = "";
        }else{
            //Generación de codigo único
            $filePath2 = uniqid($p_idTienda);
            //Construimos la ruta de la imagen
            $imagePath2 = "imgProductosTienda/".$filePath2.".jpeg";
            //Insertando imagen en el directorio del servidor
            file_put_contents($imagePath2, base64_decode($p_lptImagen2));
        }

        //Verificación de existencia de ruta imagen
        if(empty($p_lptImagen3)){
            $imagePath3 = "";
        }else{
            //Generación de codigo único
            $filePath3 = uniqid($p_idTienda);
            //Construimos la ruta de la imagen
            $imagePath3 = "imgProductosTienda/".$filePath3.".jpeg";
            //Insertando imagen en el directorio del servidor
            file_put_contents($imagePath3, base64_decode($p_lptImagen3));
        }


        $insert="CALL sp_a_producto_propio_registroproducto('{$imagePath1}','{$imagePath2}','{$imagePath3}','{$p_lptPrecioCompra}','{$p_lptPrecioVenta}','{$p_idTienda}','{$p_proDescripcion}')";
        $resultado=mysqli_query($conexion,$insert);
        if($resultado){
            echo 'Registro exitoso de Producto';
        }
        else{
            echo 'Fallo en Registrar Producto';
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
?>