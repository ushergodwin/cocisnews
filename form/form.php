<?php
// disabling error report
error_reporting(0); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';
    if (isset($_POST['submit'])) {
        $name = strip_tags($_POST['name']); // name 
        $email = strip_tags($_POST['email']); // email
        $message = strip_tags($_POST['message']); // message
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = "smtp.gmail.com";                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = "eajide40@gmail.com";                     // SMTP username
            $mail->Password   = 'ajide212';                             // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($email,'Blog Visitor');
            $mail->addAddress('eajide40@gmail.com');     // Add a recipient
            // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');//

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'BLOG enquiry/contact';
            // setting the reset link through the website domain
            $mail->Body = $message;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            header('location:../index.php');
        }
        catch (Exception $e) {
            echo "Message could not be sent try later! <br>";
            echo 'Back to <a href="../index.php">Home</a>';
            #header("location:index.html");
            #$error = '<div class="alert alert-danger">Error sending link to the email !</div>';
        }
    }


                      

