<?php
require('../model/database.php');
require('../model/seller.php');
require('../model/seller_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_sellers';
    }
}

if ($action == 'list_sellers') {
    $sellers = SellerDB::getSellers();
    include('../view/seller_list_view.php');
} else if ($action == 'show_add_form') {
    include('../view/add_seller_view.php');
} else if ($action == 'add_seller') {
    $name = filter_input(INPUT_POST, 'name');
    $contact_info = filter_input(INPUT_POST, 'contact_info');

    if ($name == NULL || $name == FALSE || $contact_info == NULL || $contact_info == FALSE) {
        $error = "Invalid seller data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $seller = new Seller($name, $contact_info);
        SellerDB::addSeller($seller);
        header("Location: .?action=list_sellers");
    }
} else if ($action == 'delete_seller') {
    $seller_id = filter_input(INPUT_POST, 'seller_id', FILTER_VALIDATE_INT);

    if ($seller_id == NULL || $seller_id == FALSE) {
        $error = "Invalid seller ID.";
        include('../errors/error.php');
    } else {
        SellerDB::deleteSeller($seller_id);
        header("Location: .?action=list_sellers");
    }
}
?>
