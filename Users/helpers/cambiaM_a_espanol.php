<?php
//FUNCIÓN PARA PONER LOS MESES EN ESPAÑOL CUANDO VUELVEN DEL QUERY
    function cambiaM_a_espanol($mes){

        switch ($mes){
            case "January": return "Enero"; break;
            case "February": return "Febrero"; break;
            case "March": return "Marzo"; break;
            case "April": return "Abril"; break;
            case "May": return "Mayo"; break;
            case "June": return "Junio"; break;
            case "July": return "Julio"; break;
            case "August": return "Agosto"; break;
            case "September": return "Septiembre"; break;
            case "October": return "Octubre"; break;
            case "November": return "Noviembre"; break;
            case "December": return "Diciembre"; break;
            } 
        };
