<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
	include_once(DB_PATH.'db.php');

$user= $_POST['user'];

$sql="SELECT usuario FROM usuarios WHERE usuario ='".$user."';";

$result=$mysqli->query($sql);
	if($result->num_rows>0){
		echo "true";
	}else{
		echo "false";
	}

?>