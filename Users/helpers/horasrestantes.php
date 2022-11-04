<?php 

$sql_horastotales = "SELECT TIMESTAMPDIFF(HOUR, '".$NOW."', '".$FECHA."') AS horas;";

    $horas=$mysqli->query($sql_horastotales);
    while($rg = mysqli_fetch_assoc($horas)){
    $horasrestantes = $rg['horas'];}
