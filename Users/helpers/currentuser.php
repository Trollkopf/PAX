<?php
    $sesionuser = $_SESSION['user'];
    
    $sql_usuario ="SELECT * FROM usuarios WHERE usuario ='".$sesionuser."';";

    $usuario=$mysqli->query($sql_usuario);

    //OBTENEMOS LA ID DEL USUARIO
    while($registro = mysqli_fetch_assoc($usuario)){
        $CURUSER = $registro['ID'];}
