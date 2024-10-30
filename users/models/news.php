<?php

class Noticia{

    private $id;
    private $usuario;
    private $fecha;
    private $categoria;
    private $titular;
    private $subtitulo;
    
    public function __construct($id, $usuario, $fecha, $categoria, $titular, $subtitulo, $noticia){
        
        $this->id = $id;
        $this->usuario = $usuario;       
        $this->fecha = $fecha;     
        $this->categoria = $categoria;    
        $this->titular = $titular;
        $this->subtitulo = $subtitulo;
        $this->noticia = $noticia;

    }

    // GETTERS
    public function getId(){
        return $this->id;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function getTitular(){
        return $this->titular;
    }

    public function getSubtitulo(){
        return $this->subtitulo;
    }

    public function getNoticia(){
        return $this->noticia;
    }

    // SETTERS
    public function setId($id){
        $this->id = $id;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function setTitular($titular){
        $this->titular = $titular;
    }

    public function setSubtitulo($subtitulo){
        $this->subtitulo = $subtitulo;
    }

    public function setNoticia($noticia){
        $this->noticia = $noticia;
    }
}
