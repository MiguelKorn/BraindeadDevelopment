<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private $mail;

    private $mailFromAddress;
    private $mailFromName;
    private $mailFromPass;

    private $mailToAddress;
    private $mailToName;

    private $subject;
    private $body;

    function __construct($fromName, $fromAddress, $fromPass, $toAddress, $toName, $subject, $body)
    {
        $this->mail = new PHPMailer(true);// Passing `true` enables exceptions

        $this->mailFromName = $fromName;
        $this->mailFromAddress = $fromAddress;
        $this->mailFromPass = $fromPass;

        $this->mailToAddress = $toAddress;
        $this->mailToName = $toName;

        $this->subject = $subject;
        $this->body = $body;

        $this->setSettings();
    }

    function setSettings() {
        //Server settings
        $this->mail->SMTPDebug = 2;                                   // Enable verbose debug output (0 = production)
        $this->mail->isSMTP();                                        // Set mailer to use SMTP
        $this->mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $this->mail->Username = $this->mailFromAddress; // SMTP username
        $this->mail->Password = $this->mailFromPass;                             // SMTP password
        $this->mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 587;                                      // TCP port to connect to

        //Recipients
        $this->mail->setFrom($this->mailFromAddress, $this->mailFromName);
        $this->mail->addAddress($this->mailToAddress, $this->mailToName);     // Add a recipient
//            $this->mail->addReplyTo('info@example.com', 'Information');

        //Content
        $this->mail->isHTML(true);                                  // Set email format to HTML
        $this->mail->Subject = 'Here is the subject';
        $this->mail->Body = 'This is the HTML message body <b>in bold!</b>';
        $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
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