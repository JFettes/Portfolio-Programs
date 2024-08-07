<?php
class Car {
    private $id, $make_id, $model_id, $seller_id, $year, $price, $description;
    private $make_name, $model_name, $seller_name;

    public function __construct($make_id, $model_id, $seller_id, $year, $price, $description) {
        $this->make_id = $make_id;
        $this->model_id = $model_id;
        $this->seller_id = $seller_id;
        $this->year = $year;
        $this->price = $price;
        $this->description = $description;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getMakeID() {
        return $this->make_id;
    }

    public function setMakeID($value) {
        $this->make_id = $value;
    }

    public function getModelID() {
        return $this->model_id;
    }

    public function setModelID($value) {
        $this->model_id = $value;
    }

    public function getSellerID() {
        return $this->seller_id;
    }

    public function setSellerID($value) {
        $this->seller_id = $value;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($value) {
        $this->year = $value;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($value) {
        $this->price = $value;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($value) {
        $this->description = $value;
    }

    public function getMakeName() {
        return $this->make_name;
    }

    public function setMakeName($value) {
        $this->make_name = $value;
    }

    public function getModelName() {
        return $this->model_name;
    }

    public function setModelName($value) {
        $this->model_name = $value;
    }

    public function getSellerName() {
        return $this->seller_name;
    }

    public function setSellerName($value) {
        $this->seller_name = $value;
    }
}
?>
