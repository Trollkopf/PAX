<?php
     if($_SESSION['rol'] != 'ADMIN'){
         $select_user_appointment = "WHERE us.id ='".$CURUSER."'";  
     }else{
         $select_user_appointment = "";
     }
        
    $sql_cita =" SELECT ci.ID as 'ID', 
                us.nombre as 'nombre', 
                ci.cita as 'fecha', 
                us.apellido as 'apellido', 
                DATE_FORMAT(ci.cita, '%d') AS 'dia', 
                DATE_FORMAT(ci.cita, '%M') AS 'mes', 
                DATE_FORMAT(ci.cita, '%Y') AS 'año', 
                DATE_FORMAT(ci.cita, '%T') AS 'hora', 
                ci.observaciones AS observaciones 
                FROM citas ci 
                INNER JOIN usuarios us  ON ci.usuario = us.ID ".$select_user_appointment." 
                ORDER BY ci.cita ASC;";

    $appointment=$mysqli->query($sql_cita);
