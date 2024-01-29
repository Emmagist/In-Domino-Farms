<?php
    require_once "db.php";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require_once '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

class Mailer{
        public static function sendAdminSignupDetails($email, $password){
        global $mail;
        $body = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Account Verification Code</title>
        </head>
        <body>
            <div class="email_wrap">
                <h4>Hi '. $email .' </h4>
                <p>Kindly <a href="https://admin.indominofarms.com/admin/auth/login" style="text-decoration:none">login</a> to your dashboard with the below details.</p>
                <p>Email: '. $email .' <br/>
                Password: ' . $password . '
                </P>
                <p>Kindly change your password and username in settings.</p>
            </div> 
        </body>
        </html>';
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtpout.secureserver.net';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL;                     //SMTP username
            $mail->Password   = EMAIL_PASSWORD;                               //SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(EMAIL);
            $mail->addAddress($email); 
            // $mail->addAddress('ellen@example.com'); //Name is optional
            $mail->addReplyTo(EMAIL);
            $mail->addCC(EMAIL);
            $mail->addBCC(EMAIL);

            //Attachments
            // if(!empty($attach)){
            //     $mail->addAttachment($attach);         //Add attachments
            // }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Welcome To In Domino Farm - Login details';
            $mail->Body    = $body;
            $mail->AltBody = '';

            $mail->send();
            // if ($send) {
            //     return 'Message has been sent';
            // }
            return 'Message has been sent';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}

$mailer = new Mailer();