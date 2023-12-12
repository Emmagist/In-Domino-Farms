<?php

    require_once "ajaxRequest.php";

    if (isset($_GET['delete'])) {
        $delete = $_GET['delete'];
    }
    
    // Category
    if ($delete == 200) {
        $id = $_GET['cat'];

        $db->erase(TBL_CATEGORY, "id = '$id'");
        echo json_encode("Category Deleted Successfully...");
    }

    // Product
    if ($delete == 201) {
        $id = $_GET['prod'];

        $db->erase(TBL_PRODUCT, "id = '$id'");
        echo json_encode("Product Deleted Successfully...");
    }

    // History
    // if (isset($_GET['dt'])) {
    //     $id = $_GET['dt'];

    //     $db->erase(TBL_VENDOR_RATE, "token_guid = '$id'");
    //     echo json_encode("Rate Deleted Successfully...");
    // }

    // if (isset($_GET['deleteSub'])) {
    //     $id = $_GET['deleteSub'];

    //     $db->update(, "status = '1'", "entity_guid = '$id'");
    //     echo json_encode("Category Deleted Successfully...");
    // }

    // if (isset($_GET['deleteEnt'])) {
    //     $id = $_GET['deleteEnt'];

    //     $db->update(, "status = '1'", "entity_guid = '$id'");
    //     echo json_encode("Category Deleted Successfully...");
    // }

    // if (isset($_GET['deleteTopic'])) {
    //     $id = $_GET['deleteTopic'];

    //     $db->update(, "status = '1'", "entity_guid = '$id'");
    //     echo json_encode("Blog Deleted Successfully...");
    // }
