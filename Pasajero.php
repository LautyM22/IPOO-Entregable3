<?php

class Pasajero {
    private $nombre;
    private $numeroAsiento;
    private $numeroTicket;

    public function __construct($nombre, $numeroAsiento, $numeroTicket) {
        $this->nombre = $nombre;
        $this->numeroAsiento = $numeroAsiento;
        $this->numeroTicket = $numeroTicket;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNumeroAsiento() {
        return $this->numeroAsiento;
    }

    public function setNumeroAsiento($numeroAsiento){
        $this->numeroAsiento = $numeroAsiento;
    }

    public function getNumeroTicket() {
        return $this->numeroTicket;
    }

    public function setNumeroTicket($numeroTicket){
        $this->numeroTicket = $numeroTicket;
    }

    public function __toString(){
        return "Nombre: ".$this->getNombre().
                "Numero de asiento: ".$this->getNumeroAsiento().
                "Numero de ticket: ".$this->getNumeroTicket();
    }

    public function darPorcentajeIncremento() {
        return 10; // Porcentaje de incremento para pasajeros comunes
    }
}