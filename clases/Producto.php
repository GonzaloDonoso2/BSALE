<?php

class Producto {
    
    /*Esta clase fue desarrollada para poder contener y definir un objeto
    de la clase producto, para posteriormente poder ser mostrados por las
    distintas funciones de esta API*/

    private $identificador;
    private $nombre;
    private $imagen;
    private $precio;
    private $descuento;
    private $indentificadorcategoria;

    public function __construct($identificador, $nombre, $imagen, $precio, $descuento, $indentificadorcategoria) {
        $this->identificador = $identificador;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->precio = $precio;
        $this->descuento = $descuento;
        $this->indentificadorcategoria = $indentificadorcategoria;
    }

    public function getIdentificador() {
        return $this->identificador;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function getIndentificadorcategoria() {
        return $this->indentificadorcategoria;
    }

    public function setIdentificador($identificador): void {
        $this->identificador = $identificador;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    public function setDescuento($descuento): void {
        $this->descuento = $descuento;
    }

    public function setIndentificadorcategoria($indentificadorcategoria): void {
        $this->indentificadorcategoria = $indentificadorcategoria;
    }
}
