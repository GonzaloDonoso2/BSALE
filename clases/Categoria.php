<?php

class Categoria {
    
    /*Esta clase fue desarrollada para poder contener y definir un objeto
    de la clase categoria, para posteriormente poder ser mostrados por las
    distintas funciones de esta API*/

    private $identificador;
    private $nombre;

    public function __construct($identificador, $nombre) {
        $this->identificador = $identificador;
        $this->nombre = $nombre;
    }

    public function getIdentificador() {
        return $this->identificador;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setIdentificador($identificador): void {
        $this->identificador = $identificador;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }
}
