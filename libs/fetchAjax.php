<?php

// use Egulias\EmailValidator\EmailValidator;

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

// Admin register
if ($pg == 203) {
    $error = "";
    $success = "";
    $full_name = $db->escape($_POST['full_name']);
    $email = $db->escape($_POST['email']);
    $password = $db->escape($_POST['password']);

    if (empty($full_name)) {
        $error = "Full Name is required!";
    }

    if (empty($email)) {
        $error = "Email is required!";
    }

    if (empty($password)) {
        $error = "Password is required!";
    }

    if ($db->validateEmail($email) == false) {
        $error = "Invalid email address";
    }

    if (Ajax::getAdminEmail($email)) {
        $error = "Email already exist!";
    }

    if (empty($error)) {

        // $password = DataBase::autoGenPass();

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $user_guid = $db->entityGuid();

        $result = $db->saveData(TBL_ADMIN, "user_guid = '$user_guid', role_id = '1', full_name = '$full_name', email = '$email', password = '$hash_password'");

        if ($result) {
            // $mailer = Mailer::sendAdminSignupDetails($email, $password);

            // if ($mailer) {
                $success ="Registration Successful";
            // }
            
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
    $current_image = $db->escape($_POST['current_file']);

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

    // File upload
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
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if (empty($error) && $uploadOk == 1) {
        $move_file = move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
        if ($move_file) {
            $db->update(TBL_PRODUCT, "product = '$product', price = '$price', weight = '$weight', short_description = '$short_description', product_image = '$target_file', description = '$description'", "entity_guid = '$id'");
            unlink($current_image);
            $success = "Product updated successfully...";
        }
    }

    echo json_encode(['error' => $error, 'success' => $success]);
}

if ($pg == 205) {
    $error = "";
    $success = "";
    $name = $db->escape($_POST['name']);
    $email = $db->escape($_POST['email']);
    $phone = $db->escape($_POST['phone']);
    $message = $db->escape($_POST['comments']);

    if (empty($name)) {
        $error = "Name is required!";
    }

    if (empty($email)) {
        $error = "Email is required!";
    }

    if (empty($phone)) {
        $error = "Phone number is required!";
    }

    if (empty($message)) {
        $error = "Drop a message";
    }

    if (empty($error)) {

        $result = $db->saveData(TBL_CONTACT, "name = '$name', email = '$email', phone_number = '$phone',  messages = '$message'");

        if ($result) {
            $success ="Message Sent";
            
        }
    }else{
        $error = "Something went wrong!";
    }
     
    echo json_encode([
        "error" => $error,
        "success" => $success
    ]);
}

// Authorize user to add to cart
if ($pg == 206) {
    $error = "";
    $success = "";
    $name = $db->escape($_POST['full_name']);
    $email = $db->escape($_POST['email']);
    $phone = $db->escape($_POST['phone_number']);
    $address = $db->escape($_POST['address']);

    if (empty($name)) {
        $error = "Name is required!";
    }

    if (empty($email)) {
        $error = "Email is required!";
    }

    if (empty($phone)) {
        $error = "Phone number is required!";
    }

    if (empty($address)) {
        $error = "Address is required!";
    }

    if ($db->validateEmail($email) == false) {
        $error = "Invalid email address";
    }

    if (Ajax::getUserEmail($email) > 0 || Ajax::getUserPhone($phone) > 0) {
        $error = "Email or Phone number already exist";
    }

    if (empty($error)) {
        $user_guid = $db->entityGuid();
        $result = $db->saveData(TBL_USERS, "user_guid = '$user_guid', role_id = '2', full_name = '$name', email = '$email', phone_number = '$phone',  address = '$address'");

        if ($result) {
            
            // foreach (Ajax::getUserEmail($email) as $userInfo) {
            //     $_SESSION['token'] = $userInfo['user_guid'];
            //     $_SESSION['email'] = $userInfo['email'];
            //     $_SESSION['role'] = $userInfo['role_id'];
            //     $_SESSION['name'] = $userInfo['full_name'];
            //     $db->set('login', true);
            //     if ($_SESSION['role'] == 2) {
            //         header('Location: ../shop');
            //     }
            // }
            $success ="Record Saved, you will be redirected to login page";
        }
    }
    // else{
    //     $error = "Something went wrong!";
    // }
     
    echo json_encode([
        "error" => $error,
        "success" => $success
    ]);
}

//User Login
if ($pg == 207) {
    $errors = [];
    $success = [];
    echo $email = $db->escape($_POST['email']);exit;

    if (empty($email)) {
        echo json_encode([
            "error" => "Email is required!",
        ]);
    }

    if (Ajax::getUserEmail($email) > 0 && empty($errors)) {
        foreach (Ajax::getUserEmail($email) as $userInfo) {
            $_SESSION['token'] = $userInfo['user_guid'];
            $_SESSION['email'] = $userInfo['email'];
            $_SESSION['role'] = $userInfo['role_id'];
            $_SESSION['name'] = $userInfo['full_name'];
            $db->set('login', true);
            if ($_SESSION['role'] == 2) {
                // header('Location: ../shop');
                echo json_encode([
                    "success" => "Success",
                ]);
            }else {
                echo json_encode([
                    "error" => "Sorry you do not have access to the page you're requesting for!",
                ]);
            }
        }
        
    }else {
        echo json_encode([
            "error" => "Email not correct!",
        ]);
        }
    
}

// Add to cart
if ($pg == 208) {
    $id = $db->escape($_POST['product_id']);
    $quantity = $db->escape($_POST['quantity']);
    $user = $db->escape($_POST['user']);

    foreach (Ajax::getSingleProductByToken($id) as $key) {
        $total = $key['price'];
    }

    $result = $db->saveData(TBL_CART, "user_id = '$user', product_id = '$id', quantity = '$quantity', total_price = '$total'");

    if ($result) {
        echo json_encode('done');
    }
}