<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
	include_once(DB_PATH.'db.php');

$user=$_POST["user"];
$pass=$_POST["password"];

$sql="SELECT usuario, nombre, apellido, clave, rol FROM usuarios WHERE usuario ='".$user."'";

$rs=$mysqli->query($sql);

if($rs->num_rows>0){
	
	while($fila=$rs->fetch_assoc()){
		if(password_verify($pass, $fila["clave"])){
			session_start();
			$_SESSION['valido']="SI";
			$_SESSION['user']=$fila["usuario"];
			$_SESSION['nombre']=$fila["nombre"];
			$_SESSION['apellido']=$fila["apellido"];
			$_SESSION['password']=$fila["clave"];
			$_SESSION['rol']=$fila["rol"];

		header('Location: ../areausuarios.php');
			}
	}
}else{
	
	echo "<hr>USUARIO NO ENCONTRADO<br/>";
	echo "<a href=../areausuarios.php>VOLVER ATRÁS</a>";
}

?>