<?php

require_once "config/db.php";
// require_once "emailVerification.php";
class Users
{
     public static function getSingleProduct($id)
     {
          global $db;

          return $db->selectData(TBL_PRODUCT, "*", "entity_guid = '$id'");
     }

     public static function getAdminByUsernameOrEmail($email){
          global $db;

          return $db->selectData(TBL_ADMIN, "*", "email = '$email'");
     }
}

$users = new Users;
