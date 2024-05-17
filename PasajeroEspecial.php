<?php
require_once("Pasajero.php");

class PasajeroConNecesidadesEspeciales extends Pasajero {
    private $sillaRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct($nombre, $numeroAsiento, $numeroTicket, $sillaRuedas, $asistencia, $comidaEspecial) {
        parent::__construct($nombre, $numeroAsiento, $numeroTicket);
        $this->sillaRuedas = $sillaRuedas;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;
    }

    public function getSillaRuedas(){
        return $this->sillaRuedas;
    }

    public function setSillaRuedas($sillaRuedas){
        $this->sillaRuedas = $sillaRuedas;
    }

    public function getAsistencia(){
        return $this->asistencia;
    }

    public function setAsistencia($asistencia){
        $this->asistencia = $asistencia;
    }

    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }

    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial = $comidaEspecial;
    }

    public function __toString(){
        $cadena =parent::__toString();

        $cadena .= "\n Silla de ruedas: ".$this->getSillaRuedas().
                    "\n Asistencia: ".$this->getAsistencia().
                    "\n Comida especial: ".$this->getComidaEspecial();
        return $cadena;
    }

    public function darPorcentajeIncremento() {
        $incremento = 0;

        if ($this->requiereSillaRuedas && $this->requiereAsistencia && $this->requiereComidaEspecial) {
            $incremento = 30; // Incremento si requiere los tres servicios especiales
        } elseif ($this->requiereSillaRuedas || $this->requiereAsistencia || $this->requiereComidaEspecial) {
            $incremento = 15; // Incremento si requiere uno de los servicios especiales
        }

        return $incremento;
    }
}
?>