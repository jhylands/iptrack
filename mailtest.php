<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
function sendUpdate($body){
    return easyMail("hylands.james@gmail.com","IP Management alert!",$body);
}


function easyMail($to,$subject,$body){


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.timep.co.uk';  // Specify main and backup SMTP servers
    //    $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'code@timep.co.uk';                 // SMTP username
        $mail->Password = 'space(176)';                           // SMTP password
    //    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('code@timep.co.uk', 'Timep');
        $mail->addAddress('jhh521@york.ac.uk', 'James');     // Add a recipient
        /*
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    */
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'hay';
        $mail->Body    = 'This will be in spam';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
