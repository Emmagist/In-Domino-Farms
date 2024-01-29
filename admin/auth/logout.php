<?php
include  "../../libs/investors.php";

    unset($_SESSION["user_guid"], $_SESSION["email"],$_SESSION["full_name"],$_SESSION["role"]);
    // $db->set('login',false);
    session_destroy();
    header("Location: login");

?>