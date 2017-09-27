<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'Exception.php';
require_once 'PHPMailer.php';
require_once 'SMTP.php';

class Mailer
{
    private $mail;

    function __construct($smtpUsername, $smtpPassword)
    {
        $this->mail = new PHPMailer();// Passing `true` enables exceptions

        //Server settings
        $this->mail->SMTPDebug = 2;                                   // Enable verbose debug output (0 = production)
        $this->mail->isSMTP();                                        // Set mailer to use SMTP
        $this->mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $this->mail->Username = $smtpUsername;                        // SMTP username
        $this->mail->Password = $smtpPassword;                        // SMTP password
        $this->mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 587;                                      // TCP port to connect to

        //Recipients
//            $this->mail->addReplyTo('info@example.com', 'Information');

        //Content
        $this->mail->isHTML(true);                                  // Set email format to HTML
    }

    public function setMailFrom($mailFromAddress, $mailFromName)
    {
        $this->mail->setFrom($mailFromAddress, $mailFromName);
    }

    public function setMailTo($mailToAddress, $mailToName)
    {
        $this->mail->addAddress($mailToAddress, $mailToName);
    }

    public function setSubject($subject)
    {
        $this->mail->Subject = $subject;
    }

    public function setBody($body)
    {
        $this->mail->Body = $body;
    }

    public function setAltBody($altBody)
    {
        $this->mail->AltBody = $altBody;
    }

    function sendMail()
    {
        try {
            $this->mail->send();
            return 'Message has been sent';
        } catch
        (Exception $e) {
            return 'Message could not be sent. Mailer Error: ' . $this->mail->ErrorInfo;
        }
    }
}