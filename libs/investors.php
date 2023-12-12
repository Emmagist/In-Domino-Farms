<?php

require_once "../../config/db.php";
// require_once "emailVerification.php";
class Investor
{

     public static function getAdminByUsernameOrEmail($email)
     {
          global $db;
          return $db->selectData(TBL_ADMIN, "*", "email = '$email'");
     }

     public static function getInvestorByEmail($email)
     {
          global $db;
          return $db->selectData(TBL_SYSTEM_USER, "*", "email = '$email'");
     }

     public static function getInvestorByUsername($username)
     {
          global $db;
          return $db->selectData(TBL_SYSTEM_USER, "*", "username = '$username'");
     }

     public static function findUserByPassword($password)
     {
          global $db;
          return $db->selectData(TBL_SYSTEM_USER, "*", "password = '$password'");
     }

     public static function checkUserIfVerified($token)
     {
          global $db;
          $verify = $db->selectData(TBL_SYSTEM_USER, "*", "user_guid = '$token' AND email_verify = 'unverified'");

          if ($verify) {
               return true;
          } else {
               return false;
          }
     }

     // public function findUserByToken($token){
     //     global $db;
     //     return $db->selectData(TBL_SYSTEM_USER, "*", "user_guid = '$token'");
     // }

     public static function getReferrerCode($ref)
     {
          global $db;
          return $db->selectData(TBL_SYSTEM_USER, "*", "ref_code = '$ref'");
     }

     public static function getInvestorToken($token)
     {
          global $db;
          return $db->selectData(TBL_SYSTEM_USER, "*", "user_guid = '$token'");
     }

     public static function getReferralUserToken($token)
     {
          global $db;
          return $db->selectData(TBL_REF_BONUS, "*", "user_guid = '$token'");
     }

     public static function getInvestorByUsernameOrEmail($email)
     {
          global $db;
          return $db->selectData(TBL_SYSTEM_USER, "*", "email = '$email' OR username = '$email'");
     }

     public static function getInvestmentPlan()
     {
          global $db;

          return $db->selectData(TBL_PLAN, "*", "status = '0'");
     }

     public static function getInvestmentCategory()
     {
          global $db;
          return $db->selectData(TBL_PLAN, "*");
     }

     public static function getAllUsers()
     {
          global $db;
          return $db->selectData(TBL_SYSTEM_USER, "*");
     }

     public static function getNewUsers()
     {
          global $db;
          $date = date("Y-m-d");
          return $db->selectData(TBL_SYSTEM_USER, "*", "Date(created_at) = DATE(NOW())");
     }

     public static function getRemoteAddress()
     {
          global $db;
          $address = $db->redirectURI();
          if ($address == 'https://sanmtosapp.com/about' || $address == 'http://sanmtosapp.com/about') {
               return "About";
          } elseif ($address == 'https://sanmtosapp.com/mining' || $address == 'http://sanmtosapp.com/mining') {
               return "Mining";
          } elseif ($address == 'https://sanmtosapp.com/contact' || $address == 'https://sanmtosapp.com/contact') {
               return "Contact";
          }
     }

     public static function searchEngine($page)
     {
          global $db;

          return $db->selectData(TBL_OPTIMIZATION, "*", "page = '$page'");
     }

     public static function checkRole($role)
     {
          global $db;

          $result =  $db->selectData(TBL_SYSTEM_USER, "*", "role_id = '$role'");

          if ($result) {
               return true;
          } else {
               return false;
          }
     }

     public static function cardType()
     {
          global $db;

          return $db->selectData(TBL_CARD_TYPE, "*");
     }

     public static function getCurrencyType()
     {
          global $db;

          return $db->selectData(TBL_CURRENCY_CONVERTER, "*");
     }

     public static function getCrytoType()
     {
          global $db;

          return $db->selectData(TBL_CRYPTO_CURRENCY, "*");
     }

     public static function getTradingType()
     {
          global $db;

          return $db->selectData(TBL_TRADERS_TYPE, "*", "sub_category = '0'");
     }

     public static function getTradingTypeSubCategory($sub)
     {
          global $db;

          return $db->selectData(TBL_TRADERS_TYPE, "*", "sub_category = '$sub'");
     }

     public static function getAgricPlan()
     {
          global $db;

          return $db->selectData(TBL_PLAN, "*", "investment_category_id = '2'");
     }

     public static function getAllPlans()
     {
          global $db;

          return $db->selectData(TBL_PLAN, "*");
     }

     public static function getActiveAgricPlan()
     {
          global $db;

          $rows = [];
          $result = $db->query("SELECT * FROM " . TBL_PLAN_ACTIVATOR . "
               INNER JOIN " . TBL_PLAN . " 
               ON " . TBL_PLAN_ACTIVATOR . ".plan_id = " . TBL_PLAN . ".id 
               WHERE " . TBL_PLAN_ACTIVATOR . ".conditions = 'off' AND investment_category_id = '2'
          ");
          if (!empty($result)) {
               while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
               }
               return $rows;
          }
     }

     public static function getAllUserEmails()
     {
         global $db;
         return $db->selectData(TBL_SYSTEM_USER, "*");
     }
     
     public static function getAdminRoles()
     {
         global $db;
         return $db->selectData(TBL_ROLE, "*", "role != 3 AND role != 1");
     }
}

$investor = new Investor;
