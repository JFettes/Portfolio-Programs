<?php
require('../model/database.php');
require('../model/model.php');
require('../model/model_db.php');
require('../model/manufacturer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_models';
    }
}

if ($action == 'list_models') {
    $models = ModelDB::getModels();
    include('../view/model_list_view.php');
} else if ($action == 'show_add_form') {
    $manufacturers = ManufacturerDB::getManufacturers();
    include('../view/add_model_view.php');
} else if ($action == 'add_model') {
    $manufacturer_id = filter_input(INPUT_POST, 'manufacturer_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');

    if ($manufacturer_id == NULL || $manufacturer_id == FALSE || $name == NULL || $name == FALSE) {
        $error = "Invalid model data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $model = new Model($manufacturer_id, $name);
        ModelDB::addModel($model);
        header("Location: .?action=list_models");
    }
} else if ($action == 'delete_model') {
    $model_id = filter_input(INPUT_POST, 'model_id', FILTER_VALIDATE_INT);

    if ($model_id == NULL || $model_id == FALSE) {
        $error = "Invalid model ID.";
        include('../errors/error.php');
    } else {
        ModelDB::deleteModel($model_id);
        header("Location: .?action=list_models");
    }
}
?>

