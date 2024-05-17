<?php 
require_once("Pasajero.php");

class PasajeroVIP extends Pasajero {
    private $numeroViajeroFrecuente;
    private $cantidadMillas;

    public function __construct($nombre, $numeroAsiento, $numeroTicket, $numeroViajeroFrecuente, $cantidadMillas) {
        parent::__construct($nombre, $numeroAsiento, $numeroTicket);
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
        $this->cantidadMillas = $cantidadMillas;
    }
    
    public function getNumeroViajeroFrecuente(){
        return $this->numeroViajeroFrecuente;
    }

    public function setNumeroViajero($numeroViajeroFrecuente){
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
    }

    public function getCantidadMillas(){
        return $this->cantidadMillas;
    }

    public function setCantidadMillas($cantidadMillas){
        $this->cantidadMillas = $cantidadMillas;
    }

    public function __toString(){
        $cadena =parent::__toString();

        $cadena .= "\n Numero viajero frecuente: ".$this->getNumeroViajeroFrecuente().
                    "\n Cantidad de millas: ".$this->getCantidadMillas();
        return $cadena;
    }

    public function darPorcentajeIncremento() {
        $incremento = 35; // Porcentaje base de incremento para pasajeros VIP
        if ($this->cantidadMillas > 300) {
            $incremento += 30; // Incremento adicional si las millas superan las 300
        }

        return $incremento;
    }
}
?>