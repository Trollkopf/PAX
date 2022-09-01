<?php 
 include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
 include_once(DB_PATH.'db.php'); 

$ID = $_POST['id_usuario'];

$new_username = $_POST['nuevo_usuario'];
$newname = $_POST['nuevo_nombre'];
$newsurname= $_POST['nuevo_apellido'];
$newpass = $_POST['nuevo_password'];
$newemail = $_POST['nuevo_email'];
$newtelf = $_POST['nuevo_telf'];

$update = "UPDATE usuarios SET";

	if ($new_username != ""){
		$update = $update." usuario ='".$new_username."'";
	}
	
	if ($newname != ""){
		if ($new_username != ""){
		$update = $update.",";
		}
		$update = $update." nombre ='".$newname."'";
	}

	if ($newsurname != ""){
		if($newname != ""){
			$update = $update.",";
		}else if($new_username != ""){
			$update = $update.",";
		}
		$update = $update." apellido ='".$newsurname."'";
	}

	if ($newpass != ""){
		if($newsurname != ""){
			$update = $update.",";
		}else if($newname != ""){
			$update = $update.",";
		}else if($new_username != ""){
			$update = $update.",";
		}
		$update = $update." clave ='".password_hash($newpass, PASSWORD_BCRYPT)."'";
	}


	if ($newemail != ""){
		if($newpass != ""){
			$update = $update.",";
		}else if($newsurname != ""){
			$update = $update.",";
		}else if($newname != ""){
			$update = $update.",";
		}else if($new_username != ""){
			$update = $update.",";
		}

		$update = $update." email ='".$newemail."'";
	}

	if ($newtelf != ""){
		if($newemail != ""){
			$update = $update.",";
		}else if($newpass != ""){
			$update = $update.",";
		}else if($newsurname != ""){
			$update = $update.",";
		}else if($newname != ""){
			$update = $update.",";
		}else if($new_username != ""){
			$update = $update.",";
		}
		$update = $update." telefono ='".$newtelf."'";
	}

$update = $update." WHERE (ID = '".$ID."');";

$mysqli->query($update);

header('Location:../areausuarios.php');
?>