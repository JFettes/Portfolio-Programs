<?php
require('../model/database.php');
require('../model/manufacturer.php');
require('../model/manufacturer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_manufacturers';
    }
}

if ($action == 'list_manufacturers') {
    $manufacturers = ManufacturerDB::getManufacturers();
    include('../view/manufacturer_list_view.php');
} else if ($action == 'show_add_form') {
    include('../view/add_manufacturer_view.php');
} else if ($action == 'add_manufacturer') {
    $name = filter_input(INPUT_POST, 'name');

    if ($name == NULL || $name == FALSE) {
        $error = "Invalid manufacturer data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $manufacturer = new Manufacturer($name);
        ManufacturerDB::addManufacturer($manufacturer);
        header("Location: .?action=list_manufacturers");
    }
} else if ($action == 'delete_manufacturer') {
    $manufacturer_id = filter_input(INPUT_POST, 'manufacturer_id', FILTER_VALIDATE_INT);
    
    if ($manufacturer_id == NULL || $manufacturer_id == FALSE) {
        $error = "Invalid manufacturer ID.";
        include('../errors/error.php');
    } else {
        ManufacturerDB::deleteManufacturer($manufacturer_id);
        header("Location: .?action=list_manufacturers");
    }
}
?>
