<?php

    require_once "admin.php";

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

        if (Admin::getAdminByUsernameOrEmail($email) > 0) {

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
                if (Admin::getAdminByUsernameOrEmail($email)) {
                    foreach (Admin::getAdminByUsernameOrEmail($email) as $userInfo) {
                        if (password_verify($password, $userInfo['password'])) {
                            $_SESSION['token'] = $userInfo['user_guid'];
                            $_SESSION['email'] = $userInfo['email'];
                            $_SESSION['role'] = $userInfo['role_id'];
                            $_SESSION['name'] = $userInfo['full_name'];
                            $db->set('login', true);
                            if ($_SESSION['role'] == 1) {
                                header('Location: ../dashboard');
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
