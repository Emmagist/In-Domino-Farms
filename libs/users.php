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

     public static function getUsernameOrEmail($email){
          global $db;

          return $db->selectData(TBL_USERS, "*", "email = '$email'");
     }

     public static function orderComplete($token, $ref){
          global $db;

          $get = $db->selectData(TBL_CART, "*", "user_id = '$token'");

          if ($get) {
               foreach ($get as $key) {
                    
                    $product = $key['product_id'];
                    $quantity = $key['quantity'];
                    $total_price = $key['total_price'];

                    $save = $db->saveData(TBL_ORDER, "user_id = '$token', order_number = '$ref', product_id = '$product', quantity = '$quantity', total_price = '$total_price'");

                    $del_cart = $db->erase(TBL_CART, "user_id = '$token'");

                    if ($save && $del_cart) {
                         return true;
                    }else {
                         return false;
                    }
               }
          }
     }
}

$users = new Users;
