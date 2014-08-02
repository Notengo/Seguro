<?php
/**
 * Description of CallesValueObject
 *
 * @author ssrolanr
 */
class CallesValueObject {
    private $idcalles, $nombre;
    public function getIdcalles() {
        return $this->idcalles;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setIdcalles($idcalles) {
        $this->idcalles = $idcalles;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}
