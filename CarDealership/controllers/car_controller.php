<?php
require_once('../model/database.php');
require_once('../model/car.php');
require_once('../model/car_db.php');
require_once('../model/manufacturer.php');  
require_once('../model/manufacturer_db.php');
require_once('../model/model.php');  
require_once('../model/model_db.php');
require_once('../model/seller.php');  
require_once('../model/seller_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_cars';
    }
}

if ($action == 'list_cars') {
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $model_id = filter_input(INPUT_GET, 'model_id', FILTER_VALIDATE_INT);
    $seller_id = filter_input(INPUT_GET, 'seller_id', FILTER_VALIDATE_INT);
    $cars = CarDB::getCars($make_id, $model_id, $seller_id);
    $makes = ManufacturerDB::getManufacturers();
    $models = ModelDB::getModels();
    $sellers = SellerDB::getSellers();
    include('../view/car_list_view.php');
} else if ($action == 'view_car') {
    $car_id = filter_input(INPUT_GET, 'car_id', FILTER_VALIDATE_INT);
    $car = CarDB::getCar($car_id);
    include('../view/car_view.php');
} else if ($action == 'sell_car') {
    $makes = ManufacturerDB::getManufacturers();
    $models = ModelDB::getModels();
    $sellers = SellerDB::getSellers();
    include('../view/sell_car_view.php');
} else if ($action == 'add_car') {
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $model_id = filter_input(INPUT_POST, 'model_id', FILTER_VALIDATE_INT);
    $seller_id = filter_input(INPUT_POST, 'seller_id', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $description = filter_input(INPUT_POST, 'description');
    
    if ($make_id === null || $model_id === null || $seller_id === null || $year === null || $price === null || $description === false) {
        $error = "Invalid car data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $car = new Car($make_id, $model_id, $seller_id, $year, $price, $description);
        CarDB::addCar($car);
        header("Location: ../index.php?action=list_cars");
        exit(); 
    }
} else if ($action == 'edit_car') {
    $car_id = filter_input(INPUT_POST, 'car_id', FILTER_VALIDATE_INT);
    $car = CarDB::getCar($car_id);
    $makes = ManufacturerDB::getManufacturers();
    $models = ModelDB::getModels();
    $sellers = SellerDB::getSellers();
    include('../view/edit_car_view.php');
} else if ($action == 'update_car') {
    $car_id = filter_input(INPUT_POST, 'car_id', FILTER_VALIDATE_INT);
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $model_id = filter_input(INPUT_POST, 'model_id', FILTER_VALIDATE_INT);
    $seller_id = filter_input(INPUT_POST, 'seller_id', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $description = filter_input(INPUT_POST, 'description');

    if ($make_id === null || $model_id === null || $seller_id === null || $year === null || $price === null || $description === false) {
        $error = "Invalid car data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $car = new Car($make_id, $model_id, $seller_id, $year, $price, $description);
        $car->setID($car_id);
        CarDB::updateCar($car);
        header("Location: ../index.php?action=list_cars");
        exit();
    }
} else if ($action == 'delete_car') {
    $car_id = filter_input(INPUT_POST, 'car_id', FILTER_VALIDATE_INT);
    CarDB::deleteCar($car_id);
    header("Location: ../index.php?action=list_cars");
    exit();
}
?>
