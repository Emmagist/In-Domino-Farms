<?php

    require_once "investors.php";

    // $errors = [];
    // $success = [];
    // if (isset($_POST['signup_button'])) {
    //     $errors = [];
    //     $success = [];
    //     $full_name = $db->escape($_POST['full_name']);//;exit;
    //     $username = $db->escape($_POST['username']);//exit;
    //     // $ref = $db->escape($_POST['ref']);
    //     $email = $db->escape($_POST['email']);//exit;
    //     $phone_number = $db->escape($_POST['tel']);//exit;
    //     $password = $db->escape($_POST['password']);//exit;
 
    //     $hash_password = password_hash($password, PASSWORD_DEFAULT);//exit;
 
    //     if (empty($full_name)) {
    //         $errors['name'] = "Full Name is required!";
    //     }

    //     if (empty($username)) {
    //         $errors['username'] = "Username is required!";
    //     }

    //     if (empty($email)) {
    //         $errors['email'] = "Email is required!";
    //     }

    //     if (empty($phone_number)) {
    //         $errors['phone-number'] = "Phone Number is required!";
    //     }

    //     if (empty($password)) {
    //         $errors['password'] = "Password is required!";
    //     }

    //     if ($db->validateEmail($email) == false) {
    //         $errors['invalid-email'] = "Invalid email address";
    //     }

    //     if (Investor::getInvestorByEmail($email)) {
    //         $errors['email-exist'] = "Email already exist!";
    //     }

    //     if (Investor::getInvestorByUsername($username)) {
    //         $errors['username-exist'] = "Username already exist!";
    //     }

    //     if ($db->validatePhoneNumber($phone_number) == false) {
    //         $errors['invalid-number'] = "Invalid phone number format";
    //     }
 
    //     if (empty($errors)) {
    //         if (! empty($_POST['ref'])) {
    //             // echo "how " . $_POST['ref'];exit;
    //             foreach (Investor::getReferrerCode($_POST['ref']) as $getRef) { //echo $getRef['ref_code'];exit;
    //                 if ($_POST['ref'] === $getRef['ref_code']) {//echo $getRef['full_name'];exit;
    //                     // if ($uploadOk == 1) {
    //                         $refer = $db->referralCode();
    //                         $user_guid = $db->entityGuid();
    //                         $code = Database::registrationCode();
    //                         $referral_id = $getRef['user_guid'];
    //                         // $move_file = move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file);
    //                         $result = $db->saveData(TBL_SYSTEM_USER, "user_guid = '$user_guid', role_id = '3', full_name = '$full_name', username = '$username', email = '$email', ref_code = '$refer', refer = '0', referral_id = '$referral_id', phone_number = '$phone_number', password = '$hash_password', image = ''");

    //                         $code_result = $db->saveData(TBL_REGISTRATION_CODE, "user_guid = '$user_guid', code = '$code'");
                            
    //                         foreach (Investor::getInvestorToken($getRef['user_guid']) as $token) {
    //                             $bonus = $token['refer'] + 1;
    //                             $token = $token['user_guid'];
    //                             $bonus_results = $db->update(TBL_SYSTEM_USER, "refer = '$bonus'", "user_guid = '$token'");

    //                             if ($bonus_results) { 
    //                                 if (Investor::getReferralUserToken($token) > 0) {
    //                                     // foreach ($results as $result) {
    //                                         $new_bonus = $bonus * 300;
    //                                         $refer_result = $db->update(TBL_REF_BONUS, "total_amount = '$new_bonus'", "user_guid = '$user_guid'");

    //                                     // }
    //                                     if ($result && $code_result && $bonus_results && $refer_result) {
    //                                         $send = emailVerification::sendSignupCode($email, $username, $code);
                    
    //                                         // if ($send) {
    //                                             header("Location: message");
    //                                         // }
    //                                     }
    //                                 }else{
                                        
    //                                     // foreach ($results as $result) {
    //                                         $new_bonus = $bonus * 300;//echo $new_bonus;exit;
    //                                         $refer_result = $db->saveData(TBL_REF_BONUS, "user_guid = '$token', total_amount = '$new_bonus'");
    //                                         $refereer = $db->saveData(TBL_REF_BONUS, "user_guid = '$user_guid', total_amount = '200'");
    //                                     // }
    //                                     if ($result && $code_result && $refer_result) {
                    
    //                                         $send = emailVerification::sendSignupCode($email, $username, $code);
                    
    //                                         // if ($send) {
    //                                             header("Location: message");
    //                                         // }
    //                                     }
    //                                 }

                                    
    //                             }
    //                         }
    //                     // }
    //                 }else{
    //                     $errors['invalid-ref'] = "Invalid referrer code!";
    //                     // header("Location: ../invalid-page.php");
    //                 }
                    
    //             }
                
    //         }else{
    //             $refer = $db->referralCode(); 
    //             $user_guid = $db->entityGuid();
    //             $code = Database::registrationCode();
                
    //             $result = $db->saveData(TBL_SYSTEM_USER, "user_guid = '$user_guid', role_id = '3', full_name = '$full_name', username = '$username', email = '$email', ref_code = '$refer', refer = '0', phone_number = '$phone_number', password = '$hash_password', image = ''");  //var_dump($result);exit;

    //             $code_result = $db->saveData(TBL_REGISTRATION_CODE, "user_guid = '$user_guid', code = '$code'");
            
    //             if ($result && $code_result) {

    //                 $send = emailVerification::sendSignupCode($email, $username, $code);

    //                 // if ($send) {
    //                     header("Location: message");
    //                 // }
    //             }
                

    //             // $success['success-message'] = 'Registration Successful...';
    //         }
    //     }else{
    //         $errors['wrong'] = "Something went wrong!";
    //     }
         
    //     //  echo json_encode($errors);
    // }

    // if (isset($_POST['login_button'])) {
    //     $errors = [];
    //     $success = [];
    //     $email = $db->escape($_POST['username']);
    //     $password = $db->escape($_POST['password']);

    //     if (empty($email)) {
    //         $errors['email'] = "Email is required!";
    //     }

    //     if (empty($password)) {
    //         $errors['password'] = "Password is required!";
    //     }

    //     if (Investor::getAdminByUsernameOrEmail($email) > 0) {

    //         // Set cookie
    //         // echo $_POST['checkbox'];exit; 
    //         if (!empty($_POST['checkbox'])) {
    //             setcookie("email", $email, time() + 3600, '/');
    //             setcookie("password", $password, time() + 3600, '/');

    //         }else {
    //             // Expire cookie
    //             setcookie("email", "", time() - 3600);
    //             setcookie("password", "", time() - 3600);

    //         }

    //         if (empty($errors)) {
    //             if (Investor::getAdminByUsernameOrEmail($email)) {
    //                 if(Investor::checkUserIfVerified($email) === false){
    //                     foreach (Investor::getAdminByUsernameOrEmail($email) as $userInfo) {
    //                         if (password_verify($password, $userInfo['password'])) {
    //                             $_SESSION['token'] = $userInfo['user_guid'];
    //                             $_SESSION['email'] = $userInfo['email'];
    //                             $_SESSION['role'] = $userInfo['role_id'];
    //                             $_SESSION['username'] = $userInfo['username'];
    //                             $db->set('login', true);
    //                             $redirect = $_REQUEST['page_url'];
    //                             if ($redirect == '') {
    //                                 header('Location: admin/index');
    //                             }else {
    //                                 header("Location: $redirect");
    //                             }
    //                         }else {
    //                             $errors['wrong'] = "Email or password not correct!";
    //                         }
    //                     }
    //                 }else {
    //                     header('Location: check-email');
    //                 }
    //             }else {
    //                 $errors['wrong-credential'] = "Email or password not correct!";
    //             }
    //         }
    //     }
    // }

    // Admin Login
    if (isset($_POST['admin_login'])) {
        $errors = [];
        $success = [];
        $email = $db->escape($_POST['email']);
        $password = $db->escape($_POST['password']);

        if (empty($email)) {
            $errors['email'] = "Email is required!";
        }

        if (empty($password)) {
            $errors['password'] = "Password is required!";
        }

        if (Investor::getAdminByUsernameOrEmail($email) > 0) {

            // Set cookie
            // echo $_POST['checkbox'];exit; 
            if (!empty($_POST['checkbox'])) {
                setcookie("email", $email, time() + 3600, '/');
                setcookie("password", $password, time() + 3600, '/');

            }else {
                // Expire cookie
                setcookie("email", "", time() - 3600);
                setcookie("password", "", time() - 3600);

            }

            if (empty($errors)) {
                if (Investor::getAdminByUsernameOrEmail($email)) {
                    foreach (Investor::getAdminByUsernameOrEmail($email) as $userInfo) {
                        if (password_verify($password, $userInfo['password'])) {
                            $_SESSION['token'] = $userInfo['user_guid'];
                            $_SESSION['email'] = $userInfo['email'];
                            $_SESSION['role'] = $userInfo['role_id'];
                            $_SESSION['name'] = $userInfo['full_name'];
                            $db->set('login', true);
                            if ($_SESSION['role'] == 1) {
                                header('Location: ../../index');
                            }else {
                                $errors['role'] = "Sorry you do not have access to the page you're requesting for!";
                            }
                        }else {
                            $errors['wrong'] = "Email or password not correct!";
                        }
                    }
                    
                }else {
                    $errors['wrong-credential'] = "Email or password not correct!";
                }
            }
        }
        // else {
        //     $errors['wrong-credential'] = "Email or password not correct!";
        // }
    }

?>
