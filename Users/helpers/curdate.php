<?php
//OBTENEMOS LA FECHA ACTUAL
    $sql_curdate = "SELECT CURDATE();";
    $curdate=$mysqli->query($sql_curdate);
    while($registro = mysqli_fetch_assoc($curdate)){
    $CURDATE = $registro['CURDATE()'];}
?>