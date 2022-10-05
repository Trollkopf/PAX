<?php
	//FUNCION PARA REDIMENSIONAR LA IMAGEN
	function redimensionar($orig, $destino, $nuevo_ancho, $nuevo_alto, $mant_prop, $calidad){

		//OBTENEMOS LA EXTENSION PARA TRABAJAR LA IMAGEN
		$imgInfo = getimagesize($orig);
		switch($imgInfo['mime']){
			case 'i mage/jpeg': $image = imagecreatefromjpeg($orig); break;
			case 'image/png': $image = imagecreatefrompng($orig); break;
			case 'image/gif': $image = imagecreatefromgif($orig); break;
		}

		//MANTENEMOS LA PROPORCION
		if($mant_prop){
			$imageratio = $imgInfo[0]/$imgInfo[1];
			if($imageratio>1){
				$nuevo_alto = $nuevo_ancho/$imageratio;
			}else{
				$nuevo_ancho = $nuevo_ancho*$imageratio;
			}
		}

		//CREAMOS LA IMAGEN REDIMENSIONADA
		$img_new = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
		imagecopyresampled($img_new, $image, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $imgInfo[0], $imgInfo[1]);

		switch($imgInfo['mime']) {	
		case 'image/jpeg' : imagejpeg($img_new,$destino,$calidad); break;
		case 'image/gif' : imagegif($img_new,$destino); break;
		case 'image/png' : imagepng($img_new,$destino); break;							
        }

	}

	if(isset($_POST['send_image'])){

		$archivo = $_FILES['imagen']['name'];
		$nombre = $_POST['nombre_imagen'];

		//OBTENEMOS LA EXTENSION DEL ARCHIVO PARA GUARDAR LA IMAGEN REDIMENSIONADA EN EL SERVIDOR CON LA MISMA EXTENSION
		$fileinfo = new splFileInfo($archivo);
		$file = $fileinfo->getExtension();

		switch ($file) {
			case 'jpg' : 	$extension = ".jpg"; break;
			case 'jpeg' : 	$extension = ".jpeg"; break;
			case 'png' : 	$extension = ".png"; break;
			case 'gif' : 	$extension = ".gif"; break;
			case 'JPG' : 	$extension = ".jpg"; break;
			case 'JPEG' : 	$extension = ".jpeg"; break;
			case 'PNG' : 	$extension = ".png"; break;
			case 'GIF' : 	$extension = ".gif"; break;
		}
	
		if(isset($archivo) && $archivo !=""){

			$tipo = $_FILES['imagen']['type'];
			$temp = $_FILES['imagen']['tmp_name'];

			if(!(strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png"))){
				echo "ERROR";
			}

			redimensionar($temp, '../../images/projects/'.$nombre.$extension, 800, 800, true, 100);
			
			$ruta_imagen = 'images/projects/'.$nombre.$extension;
		}
	}
?>