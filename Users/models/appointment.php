<?php

class Appointment{

    private $id;
    private $nombre;
    private $apellido;
    private $dia;
    private $mes;
    private $año;
    private $hora;
    private $observaciones;
    
    public function __construct($id, $nombre, $apellido, $dia, $mes, $año, $hora, $observaciones){
        
        $this->id = $id;
        $this->nombre = $nombre;       
        $this->apellido = $apellido;     
        $this->dia = $dia;    
        $this->mes = $mes;
        $this->año = $año;
        $this->hora = $hora;
        $this->observaciones = $observaciones;

    }

    // GETTERS
    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDia(){
        return $this->dia;
    }

    public function getMes(){
        return $this->mes;
    }

    public function getAño(){
        return $this->año;
    }

    public function getHora(){
        return $this->hora;
    }

    public function getObs(){
        return $this->observaciones;
    }

    // SETTERS
    public function setID(){
        $this->id = $id;
    }

    public function setNombre(){
        $this->nombre = $nombre;
    }

    public function setApellido(){
        $this->apellido = $apellido;
    }

    public function setDia(){
        $this->dia = $dia;
    }

    public function setMes(){
        $this->mes = $mes;
    }

    public function setAño(){
        $this->año = $año;
    }

    public function setHora(){
        $this->hora = $hora;
    }

    public function setObs(){
        $this->observaciones = $observaciones;
    }
}
?>
