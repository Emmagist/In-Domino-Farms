<?php

// Local Database

use Google\Service\CloudAsset\Resource\V1;

// define("DB_HOST",             "localhost");
// define("DB_USER",             "root");
// define("DB_PASSWORD",         "");
// define("DB_NAME",             "in_domino_farm_1");

// Online Database
define("DB_HOST",             "localhost");
define("DB_USER",             "in_domino_farm");
define("DB_PASSWORD",         "in_domino_farm@200");
define("DB_NAME",             "in_domino_farm");

// Mailer
//SUPPORT
define("EMAIL",               "info@indominofarms.com");
define("EMAIL_PASSWORD",      "LKM]1U?.8Jyi");

// Gateway
// PayStack
define("PAY_KEY",   "pk_test_bb33cfc81b9733dbd604a677940d8cf608aaab27");

// Tables
define("TBL_ADMIN",                 "admins");
define("TBL_CATEGORY",              "category");
define("TBL_PRODUCT",               "products");
define("TBL_USERS",                 "users");
define("TBL_ORDER",                 "orders");
define("TBL_CONTACT",                 "contact");
define("TBL_CART",                 "carts");
define("TBL_PAYMENTS_LOG",          "payments_log");
define("TBL_TRANSACTION_LOG",       "transaction_logs");
define("TBL_REGISTRATION_CODE",     "registration_code");
