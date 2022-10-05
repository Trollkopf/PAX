<?php 
include_once('../db/db.php');

	$nombre = $_POST['nombre_proyecto'];
	$datos = $_POST['datos_proyecto'];

	$html = $_POST['Html'];
	$css = $_POST['Css'];
	$js = $_POST['JavaScript'];
	$mysql = $_POST['MySQL'];
	$php = $_POST['PHP'];
	$csharp = $_POST['C#'];

	$consecucion = $_POST['tiempo_consecucion'];
	$rutaimagen = $_POST['rutaimagen'];

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

	$sql = "INSERT INTO proyectos (nombre_proyecto, datos, tecnologia_empleada, tiempo_consecucion, imagen) VALUES ('".$nombre."', '".$datos."', '".$tecnologia."', '".$consecucion."', '".$rutaimagen."' );";

		$results = $mysqli->query($sql);

		if($results){

			header("Location: ../areausuarios.php");
		}else{

			echo "###ERROR###";
		}


 ?>