<?php
    $sql_proyectos ="SELECT ID_proyecto AS ID, 
                     nombre_proyecto AS nombre, 
                     datos AS datos, 
                     tecnologia_empleada AS tecnologia, 
                     tiempo_consecucion AS tiempo, 
                     imagen AS imagen 
                     FROM proyectos ORDER BY ID_proyecto ASC;";
    $proyecto=$mysqli->query($sql_proyectos);
