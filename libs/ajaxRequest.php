<?php

    require_once "../config/mailer.php";
    // require_once "../emailVerification.php";
    // require_once "../phpMailer.php";
    // require_once "../config/db.php";

    class Ajax
    {
        public static function getCategory()
        {
            global $db;

            return $db->selectData(TBL_CATEGORY, "*");
        }

        public static function getSingleCategory($id)
        {
            global $db;

            return $db->selectData(TBL_CATEGORY, "*", "id = '$id'");
        }

        public static function getCategoryByName($category)
        {
            global $db;

            return $db->selectData(TBL_CATEGORY, "*", "category = '$category'");
        }

        public static function getAllUsers()
        {
            global $db;

            return $db->selectData(TBL_USERS, "*");
        }

        public static function getSingleUser($token)
        {
            global $db;

            return $db->selectData(TBL_USERS, "*", "user_guid = '$token'");
        }

        public static function getAllOrders()
        {
            global $db;

            $rows = [];
            $result = $db->query("SELECT * FROM " . TBL_ORDER . "
                    INNER JOIN " . TBL_PRODUCT . " 
                    ON " . TBL_PRODUCT . ".entity_guid = " . TBL_ORDER . ".product_id
                    INNER JOIN " . TBL_USERS . "
                    ON " . TBL_USERS . ".user_guid = " . TBL_ORDER .".user_id ORDER BY ordered_date DESC
                ");
            if (!empty($result)) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            }
        }

        public static function getProductByName($product)
        {
            global $db;

            return $db->selectData(TBL_PRODUCT, "*", "product = '$product'");
        }

        public static function getAllProduc()
        {
            global $db;

            return $db->selectData(TBL_PRODUCT, "*");
        }

        public static function getSingleProduct($id)
        {
            global $db;

            return $db->selectData(TBL_PRODUCT, "*", "id = '$id'");
        }

        public static function getSingleProductByToken($id)
        {
            global $db;

            return $db->selectData(TBL_PRODUCT, "*", "entity_guid = '$id'");
        }

        public static function getAdminEmail($email)
        {
            global $db;
            return $db->selectData(TBL_ADMIN, "*", "email = '$email'");
        }

        public static function getUserEmail($email)
        {
            global $db;
            return $db->selectData(TBL_USERS, "*", "email = '$email'");
        }

        public static function getUserPhone($phone)
        {
            global $db;
            return $db->selectData(TBL_USERS, "*", "phone_number = '$phone'");
        }

        public static function getFrontProductRoundom(){
            global $db;
            return $db->selectRandLimit(TBL_PRODUCT, "*", "", "8");
        }

        public static function getAllProductLimit($start_from, $limit){
            global $db;

            return $db->selectLimit(TBL_PRODUCT, "*", "", "id", "$start_from, $limit");
        }

        public static function getRelatedProductRoundom($id){
            global $db;
            return $db->selectRandLimit(TBL_PRODUCT, "*", "category_id='$id'", "30");
        }

        public static function fetchCart($token){
            global $db;

            $rows = [];

            $result = $db->query("SELECT * FROM " . TBL_CART . "
                INNER JOIN " . TBL_USERS . " 
                ON " . TBL_USERS . ".user_guid = " . TBL_CART . ".user_id
                INNER JOIN " . TBL_PRODUCT . " 
                ON " . TBL_PRODUCT . ".entity_guid = " . TBL_CART . ".product_id  
                WHERE " . TBL_CART . ".user_id = '$token' ORDER BY product_id ASC
                
            "); var_dump(($result));exit;

            if (!empty($result)) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            }
            
        }

        public static function totalCartPrice($token){
            global $db;

            $total = 0;

            $result = $db->selectData(TBL_CART, "*", "user_id = '$token'");

            foreach ($result as $key) {
                $total += $key['total_price'];
            }

            return $total;
        }

        public static function getUserByEmail($email)
        {
            global $db;
            return $db->selectData(TBL_USERS, "*", "email = '$email'");
        }

        public static function findUserByToken($token)
        {
            global $db;
            return $db->selectData(TBL_USERS, "*", "user_guid = '$token'");
        }

    }

    $ajax = new Ajax;
