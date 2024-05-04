<?php

    require_once "users.php";

    //User Login
    if (isset($_POST['userLogin'])) {
        $errors = [];
        $success = [];
        $email = $db->escape($_POST['email']);

        if (empty($email)) {
            $errors['email'] = "Email is required!";
        }

        if (Users::getUsernameOrEmail($email) > 0 && empty($errors)) {
            if (Admin::getAdminByUsernameOrEmail($email)) {
                foreach (Admin::getAdminByUsernameOrEmail($email) as $userInfo) {
                    $_SESSION['token'] = $userInfo['user_guid'];
                    $_SESSION['email'] = $userInfo['email'];
                    $_SESSION['role'] = $userInfo['role_id'];
                    $_SESSION['name'] = $userInfo['full_name'];
                    $db->set('login', true);
                    if ($_SESSION['role'] == 2) {
                        header('Location: ../shop');
                    }else {
                        $errors['role'] = "Sorry you do not have access to the page you're requesting for!";
                    }
                }
                
            }else {
                $errors['wrong-credential'] = "Email not correct!";
            }
        }
    }

?>
