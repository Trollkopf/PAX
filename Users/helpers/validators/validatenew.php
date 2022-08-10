<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
	include_once(DB_PATH.'/db.php');

$titular=$_POST["titular"];

$sql="SELECT titular FROM noticias WHERE titular ='".$titular."'";

$result=$mysqli->query($sql);
	if($result->num_rows>0){
		echo true;
	}else{
		echo false;
	}

?>