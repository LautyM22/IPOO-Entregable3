<?php

require_once 'Pasajero.php';
require_once 'PasajeroEspecial.php';
require_once 'PasajeroVip.php';

class Viaje {
    public $codigo;
    public $destino;
    public $cantidadMaximaPasajeros;
    public $pasajeros = array();
    public $responsable;
    public $costoViaje;
    public $costoTotalAbonado = 0;

    function __construct($codigo, $destino, $cantidadMaximaPasajeros, $responsable, $costoViaje) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
        $this->responsable = $responsable;
        $this->costoViaje = $costoViaje;
    }

    function modificarDestino($destino) {
        $this->destino = $destino;
    }

    function modificarCantidadMaximaPasajeros($cantidadMaximaPasajeros) {
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
    }

    function agregarPasajero($objPasajero) {
        // Verificar si el pasajero ya está cargado en el viaje
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getNumeroDocumento() == $objPasajero->getNumeroDocumento()) {
                echo "El pasajero ya está cargado en el viaje.\n";
                return;
            }
        }

        // Verificar si la cantidad máxima de pasajeros se ha alcanzado
        if (!$this->hayPasajesDisponible()) {
            echo "No se puede agregar más pasajeros, la cantidad máxima ha sido alcanzada.\n";
            return;
        }

        // Agregar el pasajero al viaje
        $this->pasajeros[] = $objPasajero;
        $this->costoTotalAbonado += $this->calcularCostoPasaje($objPasajero);
        echo "Pasajero agregado al viaje.\n";
    }

    function calcularCostoPasaje($objPasajero) {
        return $this->costoViaje + ($this->costoViaje * ($objPasajero->darPorcentajeIncremento() / 100));
    }

    function modificarPasajero($numeroDocumento, $nombre, $apellido, $telefono) {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getNumeroDocumento() == $numeroDocumento) {
                $pasajero->setNombre($nombre);
                $pasajero->setApellido($apellido);
                $pasajero->setTelefono($telefono);
                echo "Datos del pasajero actualizados.\n";
                return;
            }
        }
        echo "No se encontró ningún pasajero con ese número de documento.\n";
    }

    function mostrarDatos() {
        echo "Código del viaje: " . $this->codigo . "\n";
        echo "Destino: " . $this->destino . "\n";
        echo "Cantidad máxima de pasajeros: " . $this->cantidadMaximaPasajeros . "\n";
        echo "Responsable del viaje: " . $this->responsable->getNombre() . " " . $this->responsable->getApellido() . "\n";
        echo "Costo del viaje: " . $this->costoViaje . "\n";
        echo "Pasajeros del viaje:\n";
        foreach ($this->pasajeros as $pasajero) {
            echo "- Nombre: " . $pasajero->getNombre() . ", Apellido: " . $pasajero->getApellido() . ", Documento: " . $pasajero->getNumeroDocumento() . ", Teléfono: " . $pasajero->getTelefono() . "\n";
        }
        echo "Costo total abonado: " . $this->costoTotalAbonado . "\n";
    }

    function hayPasajesDisponible() {
        return count($this->pasajeros) < $this->cantidadMaximaPasajeros;
    }
}

?>
