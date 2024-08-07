<?php
class Model {
    private $id, $manufacturer_id, $name;

    public function __construct($manufacturer_id, $name) {
        $this->manufacturer_id = $manufacturer_id;
        $this->name = $name;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getManufacturerID() {
        return $this->manufacturer_id;
    }

    public function setManufacturerID($value) {
        $this->manufacturer_id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
}
?>
