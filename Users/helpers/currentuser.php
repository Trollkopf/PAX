<?php
    $sesionuser = $_SESSION['user'];
    
    $sql_usuarios ="SELECT * FROM usuarios WHERE usuario ='".$sesionuser."';";

    $usuarios=$mysqli->query($sql_usuarios);

    //OBTENEMOS LA ID DEL USUARIO
    while($registro = mysqli_fetch_assoc($usuarios)){
        $CURUSER = $registro['ID'];}			
?>