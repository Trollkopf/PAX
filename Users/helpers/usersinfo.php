<?php

$sql ="SELECT * FROM usuarios WHERE usuario !='".$_SESSION['user']."' ORDER BY ID ASC;";
$result=$mysqli->query($sql);

?>
