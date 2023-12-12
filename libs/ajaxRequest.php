<?php

    require_once "../config/mailer.php";
    // require_once "../emailVerification.php";
    // require_once "../phpMailer.php";

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

            return $db->selectData(TBL_USERS, "*", "entity_guid = '$token'");
        }

        public static function getAllOrders()
        {
            global $db;

            $rows = [];
            $result = $db->query("SELECT * FROM " . TBL_ORDER . "
                    INNER JOIN " . TBL_PRODUCT . " 
                    ON " . TBL_PRODUCT . ".entity_guid = " . TBL_ORDER . ".product_id ORDER BY ordered_date DESC
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

        public static function getAdminByUsernameOrEmail($email)
        {
            global $db;
            return $db->selectData(TBL_USERS, "*", "email = '$email'");
        }

        public static function getInvestorByUsernameOrEmail($email)
        {
            global $db;
            return $db->selectData(TBL_SYSTEM_USER, "*", "email = '$email' OR username = '$email'");
        }

        public static function getUserByEmail($email)
        {
            global $db;
            return $db->selectData(TBL_SYSTEM_USER, "*", "email = '$email'");
        }

        public static function checkUserIfVerified($email)
        {
            global $db;
            $verify = $db->selectData(TBL_SYSTEM_USER, "*", "email = '$email' AND email_verify = 'unverified'");

            if ($verify) {
                return true;
            } else {
                return false;
            }
        }

        public static function findUserByToken($token)
        {
            global $db;
            return $db->selectData(TBL_SYSTEM_USER, "*", "user_guid = '$token'");
        }

        public static function getUsername($username)
        {
            global $db;
            return $db->selectData(TBL_SYSTEM_USER, "*", "username = '$username'");
        }

        public static function getAdminUsername($username)
        {
            global $db;
            return $db->selectData(TBL_ADMIN, "*", "username = '$username'");
        }

        public static function getPassword($password)
        {
            global $db;
            return $db->selectData(TBL_SYSTEM_USER, "*", "password = '$password'");
        }

        public static function verifySignupCode($verify)
        {
            global $db;
            $codes = $db->selectData(TBL_REGISTRATION_CODE, "*", "code = '$verify'");

            if (isset($codes)) {
                foreach ($codes as $code) {
                    $user = $code['user_guid'];
                    $result = $db->update(TBL_SYSTEM_USER, "email_verify = 'verified'", "user_guid = '$user'");
                    if ($result) {
                        return true;
                    }
                }
            } else {
                return false;
            }
        }

        public static function getSingleChat($ticket)
        {
            global $db;

            $rows = [];
            $result = $db->query("SELECT * FROM " . TBL_TRADERS_CHAT . "
                    INNER JOIN " . TICKET . " 
                    ON " . TICKET . ".token_guid = " . TBL_TRADERS_CHAT . ".ticket_id 
                    WHERE " . TBL_TRADERS_CHAT . ".ticket_id = '$ticket' ORDER BY maker DESC
                ");
            if (!empty($result)) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            }
        }

        public static function getMessageList($token)
        {
            global $db;

            $rows = [];
            $result = $db->query("SELECT * FROM " . TICKET . "
                    INNER JOIN " . TBL_SYSTEM_USER . " 
                    ON " . TICKET . ".maker = " . TBL_SYSTEM_USER . ".user_guid 
                    WHERE " . TICKET . ".receiver = '$token' OR maker = '$token' ORDER BY updated_at DESC
                ");

            if (!empty($result)) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            }
        }

        public static function getSenderMessageList($token)
        {
            global $db;

            $results = $db->query("SELECT * FROM " . TICKET . "
                INNER JOIN " . TBL_SYSTEM_USER . " 
                ON " . TICKET . ".receiver = " . TBL_SYSTEM_USER . ".user_guid 
                WHERE " . TICKET . ".receiver = '$token' OR maker = '$token' ORDER BY updated_at DESC
                
            ");

            if (!empty($results)) {
                foreach ($results as $result) {
                    $img = $result['image'];
                    $username = $result['username'];
                }

                $rows = [
                    'image' => $img,
                    'username' => $username
                ];

                return $rows;
            }
        }

        public static function getLastMessageList($ticket_id)
        {
            global $db;

            return $db->selectData(TBL_TRADERS_CHAT, "*", "ticket_id = '$ticket_id' ORDER BY sender_time OR receiver_time ASC");
        }

        public static function getLastMessage($ticket)
        {

            global $db;

            // $rows = [];

            $result = $db->selectLimit(TBL_TRADERS_CHAT, "*", "ticket_id = '$ticket'", "sender_time", 1);
            foreach ($result as $key) {
                $message = $key['sender_comment'];
                $sender_time = $key['sender_time'];
                $receiver_comment = $key['receiver_comment'];
                $receiver_time = $key['receiver_time'];
            }

            $rows = [
                'sender_comment' => $message,
                'sender_time' => $sender_time,
                'receiver_comment' => $receiver_comment,
                'receiver_time' => $receiver_time,
            ];

            return $rows;
        }

        // public static function getSingleClientMessages($ticket){
        //     global $db;

        //     $rows = [];
        //     $result = $db->query("SELECT * FROM ". TICKET . "
        //         INNER JOIN " . TBL_TRADERS_CHAT . " 
        //         ON " . TICKET . ".token_guid = ". TBL_TRADERS_CHAT . ".ticket_id
        //         INNER JOIN " . TBL_SYSTEM_USER . " 
        //         ON " . TICKET . ".maker = ". TBL_SYSTEM_USER . ".user_guid 
        //         WHERE ". TICKET . ".ticket = '$ticket' ORDER BY maker DESC
        //     ");

        //     if (!empty($result)) {
        //         while ($row = $result->fetch_assoc()) {
        //             $rows[] = $row;
        //         }
        //         return $rows;
        //     }
        // }

        public static function getSingleClientDetails($ticket)
        {
            global $db;

            $rows = [];
            $result = $db->query("SELECT * FROM " . TICKET . "
                    INNER JOIN " . TBL_SYSTEM_USER . " 
                    ON " . TICKET . ".maker = " . TBL_SYSTEM_USER . ".user_guid 
                    WHERE " . TICKET . ".ticket = '$ticket' ORDER BY maker DESC
                ");

            if (!empty($result)) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            }
        }

        public static function getSingleMessageHeaderDetails($ticket)
        {
            global $db;

            $rows = [];
            $result = $db->query("SELECT * FROM " . TICKET . "
                    INNER JOIN " . TBL_SYSTEM_USER . " 
                    ON " . TICKET . ".receiver = " . TBL_SYSTEM_USER . ".user_guid 
                    WHERE " . TICKET . ".ticket = '$ticket' ORDER BY maker DESC
                ");

            if (!empty($result)) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            }
        }

        public static function getSingleCryptoVendorRate($id)
        {
            global $db;

            $rows = [];
            $result = $db->query("SELECT * FROM " . TBL_VENDOR_RATE . "
                    INNER JOIN " . TBL_TRADERS_TYPE . " 
                    ON " . TBL_VENDOR_RATE . ".traders_type_sub_category_id = " . TBL_TRADERS_TYPE . ".entity_guid 
                    WHERE " . TBL_VENDOR_RATE . ".token_guid = '$id'");

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

        public static function getSingleUserAccountsBalance($account,$token)
        {
            global $db;

            if ($account == 'ngn') {
                $result = $db->selectData(TBL_WALLET, "*", "user_guid = '$token'");

                if ($result) {

                    foreach($result as $key){

                        $balance = $key['amount'];
                    }

                    return $balance;

                }else{

                    return false;
                }
                
            }elseif ($account == 'usd') {
                $result = $db->selectData(TBL_US_WALLET, "*", "user_guid = '$token'");

                if ($result) {

                    foreach($result as $key){
                        $balance = $key['ballance'];
                    }
        
                    return $balance;

                }else{

                    return false;
                }
                
            }elseif ($account == 'gbp') {
                $result = $db->selectData(TBL_POUNDS_WALLET, "*", "user_guid = '$token'");

                if ($result) {

                    foreach($result as $key){
                        $balance = $key['ballance'];
                    }
        
                    return $balance;

                }else{

                    return false;
                }

            }elseif ($account == 'eur') {
                $result = $db->selectData(TBL_EURO_WALLET, "*", "user_guid = '$token'");

                if ($result) {

                    foreach($result as $key){
                        $balance = $key['ballance'];
                    }
        
                    return $balance;

                }else{

                    return false;
                }
            }
            

        }

        public static function getReceiverAccountsDetails($receiver)
        {
            global $db;

            $ngn = $db->selectData(TBL_WALLET, "*", "account_number = '$receiver'");
            $usd = $db->selectData(TBL_US_WALLET, "*", "account_number = '$receiver'");
            $pounds = $db->selectData(TBL_POUNDS_WALLET, "*", "account_number = '$receiver'");
            $eur = $db->selectData(TBL_EURO_WALLET, "*", "account_number = '$receiver'");

            if ($ngn) {


                foreach($ngn as $key){

                    $token = $key['user_guid'];
                    $result = $db->selectData(TBL_SYSTEM_USER, "*", "user_guid = '$token'");

                    foreach($result as $user){
                        $user = $user['full_name'];
                    }
                }

                return $user;
                
            }elseif ($usd) {
                foreach($usd as $key){

                    $token = $key['user_guid'];
                    $result = $db->selectData(TBL_SYSTEM_USER, "*", "user_guid = '$token'");

                    foreach($result as $user){
                        $user = $user['full_name'];
                    }
                }
                
            }elseif ($pounds) {

                foreach($pounds as $key){

                    $token = $key['user_guid'];
                    $result = $db->selectData(TBL_SYSTEM_USER, "*", "user_guid = '$token'");

                    foreach($result as $user){
                        $user = $user['full_name'];
                    }
                }

            }elseif ($eur) {

                foreach($pounds as $key){

                    $token = $key['user_guid'];
                    $result = $db->selectData(TBL_SYSTEM_USER, "*", "user_guid = '$token'");

                    foreach($result as $user){
                        $user = $user['full_name'];
                    }
                }
            }
            

        }

        public static function transferFunds($token,$amount, $virtual_account, $receiver){
            global $db;
            

            if ($virtual_account == 'ngn') {
                $ngn = $db->selectData(TBL_WALLET, "*", "user_guid = '$token'");
                if ($ngn) {
                    foreach ($ngn as $key) {
                        $balance = $key['amount'] - $amount;
                        $vat = (0.8 / 100) * $amount;
                        $total = $balance - $vat;
                        $save = $db->update(TBL_WALLET, "amount = '$total'", "user_guid = '$token'");
                        $save_vat = $db->SaveData(TBL_INVENTORY, "entity_guid = uuid(), transaction_name = 'transfer', amount = '$vat'");

                        if ($save && $save_vat) {

                            $results = $db->selectData(TBL_WALLET, "*", "account_number = '$receiver'");

                            foreach ($results as $result) {
                                $rec_balance = $result['amount'] + $amount;
                                $update = $db->update(TBL_WALLET, "amount = '$rec_balance'", "account_number = '$receiver'");
                                if ($update) {
                                    return true;
                                }else{
                                    return false;
                                }
                            }
                        }
                    }
                }else {
                    return false;
                }
                
            }elseif ($virtual_account == 'usd') {

                $usd = $db->selectData(TBL_US_WALLET, "*", "user_guid = '$token'");

                if ($usd) {
                    foreach ($usd as $key) {

                        $balance = $key['ballance'] - $amount;
                        $vat = (0.8 / 100) * $amount;
                        $total = $balance - $vat;

                        $save = $db->update(TBL_US_WALLET, "ballance = '$total'", "user_guid = '$token'");
                        $save_vat = $db->SaveData(TBL_INVENTORY, "token_guid = uuid(), transaction_name = 'transfer', amount = '$vat'");

                        if ($save && $save_vat) {
                            $results = $db->selectData(TBL_US_WALLET, "*", "account_number = '$receiver'");

                            foreach ($results as $result) {
                                $rec_balance = $result['ballance'] + $amount;
                                $update = $db->update(TBL_US_WALLET, "ballance = '$rec_balance'", "account_number = '$receiver'");
                                if ($update) {
                                    return true;
                                }else{
                                    return false;
                                }
                            }
                        }
                    }
                }else {
                    return false;
                }
            
            }elseif ($virtual_account == 'gbp') {

                $pounds = $db->selectData(TBL_POUNDS_WALLET, "*", "user_guid = '$token'");

                if ($pounds) {
                    foreach ($pounds as $key) {
                        $balance = $key['ballance'] - $amount;
                        $vat = (0.8 / 100) * $amount;
                        $total = $balance - $vat;

                        $save = $db->update(TBL_POUNDS_WALLET, "ballance = '$total'", "user_guid = '$token'");
                        $save_vat = $db->SaveData(TBL_INVENTORY, "token_guid = uuid(), transaction_name = 'transfer', amount = '$vat'");

                        if ($save && $save_vat) {
                            $results = $db->selectData(TBL_POUNDS_WALLET, "*", "account_number = '$receiver'");

                            foreach ($results as $result) {
                                $rec_balance = $result['ballance'] + $amount;
                                $update = $db->update(TBL_POUNDS_WALLET, "ballance = '$rec_balance'", "account_number = '$receiver'");
                                if ($update) {
                                    return true;
                                }else{
                                    return false;
                                }
                            }
                        }
                    }
                }else{
                    return false;
                }
                
            }elseif ($virtual_account == 'eur') {

                $eur = $db->selectData(TBL_EURO_WALLET, "*", "user_guid = '$token'");

                if ($eur) {

                    foreach ($eur as $key) {
                        $balance = $key['ballance'] - $amount;
                        $vat = (0.8 / 100) * $amount;
                        $total = $balance - $vat;

                        $save = $db->update(TBL_EURO_WALLET, "ballance = '$total'", "user_guid = '$token'");
                        $save_vat = $db->SaveData(TBL_INVENTORY, "token_guid = uuid(), transaction_name = 'transfer', amount = '$vat'");

                        if ($save && $save_vat) {
                            $results = $db->selectData(TBL_EURO_WALLET, "*", "account_number = '$receiver'");

                            foreach ($results as $result) {
                                $rec_balance = $result['ballance'] + $amount;
                                $update = $db->update(TBL_EURO_WALLET, "ballance = '$rec_balance'", "account_number = '$receiver'");
                                if ($update) {
                                    return true;
                                }else{
                                    return false;
                                }
                            }
                        }
                    }
                }else {
                    false;
                }
                
            }else {
                false;
            }
        }

        public static function checkAccountBalance($token, $virtual_account, $amount){
            global $db;

            if ($virtual_account == 'ngn') {
                $ngn = $db->selectData(TBL_WALLET, "*", "user_guid = '$token'");
                if ($ngn) {
                    foreach ($ngn as $key) {
                        if ($amount >= $key['amount']) {
                            return false;
                        }else {
                            return true;
                        }
                        
                    }
                }else {
                    return false;
                }
                
            }elseif ($virtual_account == 'usd') {

                $usd = $db->selectData(TBL_US_WALLET, "*", "user_guid = '$token'");

                if ($usd) {

                    foreach ($usd as $key) {

                        if ($amount >= $key['ballance']) {
                            return false;
                        }else {
                            return true;
                        }
                            
                    }
                }else {
                    return false;
                }
            
            }elseif ($virtual_account == 'gbp') {

                $pounds = $db->selectData(TBL_POUNDS_WALLET, "*", "user_guid = '$token'");

                if ($pounds) {
                    foreach ($pounds as $key) {
                        if ($amount >= $key['ballance']) {
                            return false;
                        }else {
                            return true;
                        }
                    }
                }else{
                    return false;
                }
                
            }elseif ($virtual_account == 'eur') {

                $eur = $db->selectData(TBL_EURO_WALLET, "*", "user_guid = '$token'");

                if ($eur) {

                    foreach ($eur as $key) {
                        if ($amount >= $key['ballance']) {
                            return false;
                        }else {
                            return true;
                        }
                    }
                }else {
                    false;
                }
                
            }else {
                false;
            }
        }

    }

    $ajax = new Ajax;

?>
