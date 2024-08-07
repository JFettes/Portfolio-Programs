<?php
class Seller {
    private $id, $name, $contact_info;

    public function __construct($name, $contact_info) {
        $this->name = $name;
        $this->contact_info = $contact_info;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }

    public function getContactInfo() {
        return $this->contact_info;
    }

    public function setContactInfo($value) {
        $this->contact_info = $value;
    }
}
?>
