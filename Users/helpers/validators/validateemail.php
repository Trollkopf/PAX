<?php 
	include_once('/../../db/db.php');

$email=$_POST["email"];

$sql="SELECT usuario FROM usuarios WHERE email ='".$email."'";

$result=$mysqli->query($sql);
	if($result->num_rows>0){
		echo "true";
	}else{
		echo "false";
	}

?>