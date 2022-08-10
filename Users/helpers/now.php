<?php
$sql_now = "SELECT NOW() AS NOW;";
		$now=$mysqli->query($sql_now);
		while($registro = mysqli_fetch_assoc($now)){
		$NOW = $registro['NOW'];}   
?>