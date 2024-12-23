<?php

class User{

    private $id;
    private $usuario;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $rol;
    
    public function __construct($id, $usuario, $nombre, $apellido, $email, $telefono, $rol){
        
        $this->id = $id;
        $this->usuario = $usuario;
        $this->nombre = $nombre;       
        $this->apellido = $apellido;     
        $this->email = $email;    
        $this->telefono = $telefono;
        $this->rol = $rol;
    }

    // GETTERS
    public function getId(){
        return $this->id;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getRol(){
        return $this->rol;
    }

    // SETTERS
    public function setID($id){
        $this->id = $id;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function setRol($rol){
        $this->rol = $rol;
    }
}
