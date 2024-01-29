<?php 

    require_once "../../config/db.php";
    $db->getAdminSession();
    
    if (isset($_SESSION['token']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
        $token = $_SESSION['token'];
        $role = $_SESSION['role'];
    }else{
        header("Location: ../auth/login");
    }

?>