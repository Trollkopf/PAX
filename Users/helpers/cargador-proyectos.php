<?php
    include_once('../db/db.php');


    $sql ="SELECT ID_proyecto AS ID, 
                            nombre_proyecto AS nombre, 
                            datos AS datos, 
                            tecnologia_empleada AS tecnologia, 
                            tiempo_consecucion AS tiempo, 
                            imagen AS imagen 
                            FROM proyectos 
                            ORDER BY ID_proyecto ASC;";

    $result=$mysqli->query($sql);

    $rows['proyecto'] = array();

    while($registro = $result->fetch_object()){
        array_push($rows['proyecto'], $registro);
    }

    echo json_encode($rows);
?>