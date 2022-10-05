<?php 
	include_once('/../../db/db.php');

$telf=$_POST["telf"];

$sql="SELECT usuario FROM usuarios WHERE telefono ='".$telf."'";

$result=$mysqli->query($sql);
	if($result->num_rows>0){
		echo "true";
	}else{
		echo "false";
	}

?>