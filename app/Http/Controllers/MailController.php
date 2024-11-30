<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;


// require 'vendor/autoload.php';
echo "<pre>";
class MailController extends Controller
{
    public $message="";
    public function sendMail(Request $request)
    {
        // print_r($request['REQUEST_HEADER']);
        $data = $request->all();
        $email = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'Anantapoudyal24@gmail.com';                     //SMTP username
            $mail->Password   = 'yiozydfxnmfsqkqf';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption ENCRYPTION_SMTPS
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('Anantapoudyal24@gmail.com', 'Ananta');
            $mail->addAddress( $email , 'Ananta123');     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject =  $subject;
            $mail->Body    = $message ;

            $mail->send();
            $this->message= 'Message has been sent'."<br/>";
        } catch (Exception $e) {
            $this->message= "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return redirect()->route('ContactUs',["message"=>$this->message]);

        // print_r($data);
    }
}
