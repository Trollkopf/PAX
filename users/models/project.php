<?php


class Proyecto{

    private $id;
    private $nombre_proyecto;
    private $datos;
    private $tecnologia;
    private $tiempo;
    private $imagen;
    
    public function __construct($id, $nombre_proyecto, $datos, $tecnologia, $tiempo, $imagen){
        
        $this->id = $id;
        $this->nombre_proyecto = $nombre_proyecto;       
        $this->datos = $datos;     
        $this->tecnologia = $tecnologia;    
        $this->tiempo = $tiempo;
        $this->imagen = $imagen;
    }

    // GETTERS
    public function getId(){
        return $this->id;
    }

    public function getNombre_proyecto(){
        return $this->nombre_proyecto;
    }

    public function getDatos(){
        return $this->datos;
    }

    public function getTecnologia(){
        return $this->tecnologia;
    }

    public function getTiempo(){
        return $this->tiempo;
    }

    public function getImagen(){
        return $this->imagen;
    }

    // SETTERS
    public function setId($id){
        $this->id = $id;
    }

    public function setNombre_proyecto($nombre_proyecto){
        $this->nombre_proyecto = $nombre_proyecto;
    }

    public function setDatos($datos){
        $this->datos = $datos;
    }

    public function setTecnologia($tecnologia){
        $this->tecnologia = $tecnologia;
    }

    public function setTiempo($tiempo){
        $this->tiempo = $tiempo;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }
}
