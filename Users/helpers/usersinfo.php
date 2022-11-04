<?php

$sql_userinfo ="SELECT * FROM usuarios WHERE usuario !='".$_SESSION['user']."' ORDER BY ID ASC;";
$userinfo=$mysqli->query($sql_userinfo);
