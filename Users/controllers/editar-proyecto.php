<?php 

include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once(DB_PATH.'db.php');

	$nombre = $_POST['nombre_proyecto'];
	$datos = $_POST['datos_proyecto'];
	$ID = $_POST['id_proyecto'];

	$html = $_POST['Html'];
	$css = $_POST['Css'];
	$js = $_POST['JavaScript'];
	$mysql = $_POST['MySQL'];
	$php = $_POST['PHP'];
	$csharp = $_POST['C#'];

	$consecucion = $_POST['tiempo_consecucion'];
	$rutaimagen = $_POST['ruta_imagen'];

	//SECUENCIA PARA AÑADIR LAS TECNOLOGÍAS
	//HTML
	if($html != ""){
		$tecnologia = $tecnologia.$html;
	}

	//CSS
	if($css != ""){
		if($html != ""){
		$tecnologia = $tecnologia.", ";
		}
	}$tecnologia = $tecnologia.$css;

	//JAVASCRIPT
	if($js != ""){
		if($css != ""){
			$tecnologia = $tecnologia.", ";
		}else if($html != ""){
			$tecnologia = $tecnologia.", ";
		}
	}$tecnologia = $tecnologia.$js;

	//MYSQL
	if($mysql != ""){
		if($js != ""){
			$tecnologia = $tecnologia.", ";
		}else if($css != ""){
			$tecnologia = $tecnologia.", ";
		}else if($html != ""){
			$tecnologia = $tecnologia.", ";
		}
	}$tecnologia = $tecnologia.$mysql;

	//PHP
	if($php != ""){
		if($mysql != ""){
			$tecnologia = $tecnologia.", ";
		}else if($js != ""){
			$tecnologia = $tecnologia.", ";
		}else if($css != ""){
			$tecnologia = $tecnologia.", ";
		}else if($html != ""){
			$tecnologia = $tecnologia.", ";
		}
	}$tecnologia = $tecnologia.$php;

	//C#
	if($csharp != ""){
		if($php != ""){
			$tecnologia = $tecnologia.", ";
		}else if($mysql != ""){
			$tecnologia = $tecnologia.", ";
		}else if($js != ""){
			$tecnologia = $tecnologia.", ";
		}else if($css != ""){
			$tecnologia = $tecnologia.", ";
		}else if($html != ""){
			$tecnologia = $tecnologia.", ";
		}
	}$tecnologia = $tecnologia.$csharp;

	$sql = "UPDATE proyectos SET nombre_proyecto = '".$nombre."', datos ='".$datos."', tecnologia_empleada = '".$tecnologia."', tiempo_consecucion= '".$consecucion."', imagen = '".$rutaimagen."' WHERE (ID_proyecto = '".$ID."')";

		$results = $mysqli->query($sql);

		if($results){

			header("Location: ../areausuarios.php");
		}else{

			echo "###ERROR###";
		}


 ?>