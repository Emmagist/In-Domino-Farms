<?php

use Egulias\EmailValidator\EmailValidator;

require_once "ajaxRequest.php";

if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
}



//Category
if ($pg == 200) {
    $error = '';
    $success = '';
    $category = $db->escape($_POST['category']);
    $sub_category = $db->escape($_POST['sub_category']);
    $description = $db->escape($_POST['description']);

    if(empty($category)){
        $error = 'Category can not be empty!';
    }

    if (Ajax::getCategoryByName($category)) {
        $error = "Category already exist!";
    }

    if (empty($error)) {
        $db->saveData(TBL_CATEGORY, "category = '$category', category_id = '1', sub_category = '$sub_category', description = '$description'");
        $success = "Category created successfully...";
    }

    echo json_encode(['error' => $error, 'success' => $success]);
}

// Edit Category
if ($pg == 201) {
    $error = '';
    $success = '';
    $id = $db->escape($_POST['id']);
    $category = $db->escape($_POST['category']);
    $sub_category = $db->escape($_POST['sub_category']);
    $description = $db->escape($_POST['description']);

    if(empty($category)){
        $error = 'Category can not be empty!';
    }

    if (Ajax::getCategoryByName($category)) {
        $error = "Category already exist!";
    }

    if (empty($error)) {
        $db->update(TBL_CATEGORY, "category = '$category', category_id = '1', sub_category = '$sub_category', description = '$description'", "id = '$id'");
        $success = "Category updated successfully...";
    }

    echo json_encode(['error' => $error, 'success' => $success]);
}

//Add Product
if ($pg == 202) {
    $error = '';
    $success = '';
    $category = $db->escape($_POST['category']);
    $product = $db->escape($_POST['product']);
    $price = $db->escape($_POST['price']);
    $weight = $db->escape($_POST['weight']);
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];

    if(empty($category)){
        $error = 'Category is required!';
    }

    if(empty($product)){
        $error = 'Product is required!';
    }

    if(empty($price)){
        $error = 'Price is required!';
    }

    if(empty($weight)){
        $error = 'Weight is required!';
    }

    if(empty($description)){
        $error = 'Description is required!';
    }

    if (Ajax::getProductByName($product)) {
        $error = 'Product already exist!';
    }

    $target_dir = "../product_image/";
    $target_file  = $target_dir . basename($_FILES["fileUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
    if ($check == false) {
        $error =  "File is not an image";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $error = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["fileUpload"]["size"] > 500000) {
        $error = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $error = "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1 && empty($error)) {
        $move_file = move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
        if ($move_file) {
            $db->saveData(TBL_PRODUCT, "category_id = '$category', entity_guid = uuid(), product = '$product', price = '$price', weight = '$weight', short_description = '$short_description', product_image ='$target_file', description = '$description'");
        $success = "Product created successfully...";
        }
    }
    

    echo json_encode(['error' => $error, 'success' => $success]);
}

if ($pg == 203) {
    $error = "";
    $success = "";
    $full_name = $db->escape($_POST['full_name']);
    $email = $db->escape($_POST['email']);

    if (empty($full_name)) {
        $error = "Full Name is required!";
    }

    if (empty($email)) {
        $error = "Email is required!";
    }

    if ($db->validateEmail($email) == false) {
        $error = "Invalid email address";
    }

    if (Ajax::getAdminByUsernameOrEmail($email)) {
        $error = "Email already exist!";
    }

    if (empty($errors)) {

        $password = DataBase::autoGenPass();

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $user_guid = $db->entityGuid();

        $result = $db->saveData(TBL_ADMIN, "user_guid = '$user_guid', role_id = '1', full_name = '$full_name', email = '$email', password = '$hash_password'");

        if ($result) {
            $mailer = Mailer::sendAdminSignupDetails($email, $password);

            if ($mailer) {
                $success ="Registration Successful";
            }
            
        }
    }else{
        $error = "Something went wrong!";
    }
     
    echo json_encode([
        "error" => $error,
        "success" => $success
    ]);
}

if ($pg == 204) {
    $error = '';
    $success = '';
    $id = $db->escape($_POST['id']);
    $product = $db->escape($_POST['product']);
    // $category = $db->escape($_POST['category']);
    $price = $db->escape($_POST['price']);
    $weight = $db->escape($_POST['weight']);
    $short_description = $db->escape($_POST['short_description']);
    $description = $db->escape($_POST['description']);

    if(empty($product)){
        $error = 'Product name can not be empty!';
    }

    // if(empty($category)){
    //     $error = 'Category can not be empty!';
    // }

    if(empty($price)){
        $error = 'Price can not be empty!';
    }

    if(empty($weight)){
        $error = 'Weight can not be empty!';
    }

    if(empty($short_description)){
        $error = 'Short description can not be empty!';
    }

    if(empty($description)){
        $error = 'Description can not be empty!';
    }

    if (empty($error)) {
        $db->update(TBL_PRODUCT, "product = '$product', price = '$price', weight = '$weight', short_description = '$short_description', description = '$description'", "entity_guid = '$id'");
        $success = "Product updated successfully...";
    }

    echo json_encode(['error' => $error, 'success' => $success]);
}

// if ($pg == ) {
//     $error = "";
//     $success = "";
//     $full_name = $db->escape($_POST['full_name']);//;exit;
//     $username = $db->escape($_POST['username']);//exit;
//     // $ref = $db->escape($_POST['ref']);
//     $email = $db->escape($_POST['email']);//exit;
//     $phone_number = $db->escape($_POST['tel']);//exit;
//     $password = $db->escape($_POST['password']);//exit;

//     $hash_password = password_hash($password, PASSWORD_DEFAULT);//exit;

//     if (empty($full_name)) {
//         $error = "Full Name is required!";
//     }

//     if (empty($username)) {
//         $error = "Username is required!";
//     }

//     if (empty($email)) {
//         $error = "Email is required!";
//     }

//     if (empty($phone_number)) {
//         $error = "Phone Number is required!";
//     }

//     if (empty($gender)) {
//         $error = "Select a gender is required!";
//     }

//     if (empty($password)) {
//         $error = "Password is required!";
//     }

//     if (empty($address)) {
//         $error = "Address field is required!";
//     }

//     if ($db->validateEmail($email) == false) {
//         $error = "Invalid email address";
//     }

//     if (Investor::getAdminByUsernameOrEmail($email)) {
//         $error = "Email already exist!";
//     }

//     if ($db->validatePhoneNumber($phone_number) == false) {
//         $error = "Invalid phone number format";
//     }

//     if (empty($errors)) {
//         $user_guid = $db->entityGuid();
//         $result = $db->saveData(TBL_SYSTEM_USER, "user_guid = '$user_guid', role_id = '2', full_name = '$full_name', email = '$email', phone_number = '$phone_number', country = '$country', password = '$hash_password'");     
//     }else{
//         $error = "Something went wrong!";
//     }
     
//     echo json_encode([
//         "error" => $error,
//         "success" => $success
//     ]);
// }