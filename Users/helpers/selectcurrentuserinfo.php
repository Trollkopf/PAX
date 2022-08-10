<?php
    
    $sql_usuarios ="SELECT * FROM usuarios WHERE usuario ='".$_SESSION['user']."';";
    $result=$mysqli->query($sql_usuarios);
    
?>