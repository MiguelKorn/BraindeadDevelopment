<?php
require './utils/PHPMailer/Mailer.php';
require './utils/settings.php';
require './utils/Sanitize/sanitize.inc.php';

if (isset($_POST["submit"]) && $_POST["submit"] === "Send") {
    $name = sanitize($_POST["name"], HTML);
    $email = sanitize($_POST["email"], HTML);
    $subject = sanitize($_POST["subject"], HTML);
    $message = sanitize($_POST["message"], HTML);

    $mailer = new Mailer(FROM_MAIL, FROM_PASS);
    $mailer->setMailFrom(FROM_MAIL, FROM_NAME);
    $mailer->setMailTo($email, $name);
    $mailer->setSubject('subject');
    $mailer->setBody('body'); // can be html
    $mailSend = $mailer->sendMail();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Braindead Development | Portfolio</title>
</head>
<body>
<?php
if(isset($mailSend) && $mailSend){
    echo 'mailsend';
}
?>
<div id="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light fixed-top">
            <a class="navbar-brand" href="#">Braindead</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu"
                    aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#container1">Home <span
                                class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#about">About</a>
                    <a class="nav-item nav-link" href="#projects">Projects</a>
                    <a class="nav-item nav-link" href="#contact">Contact</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<div id="content">
    <div id="container1">
        <div class="triangle" id="triangle"></div>
        <div class="container-fluid">
            <div class="row">
                <h1>IT'S DEAD SIMPLE</h1>
                <iframe src="" frameborder="0">test</iframe>
            </div>
        </div>
    </div>
    <div id="about">
        <h3>About</h3>
    </div>
    <div id="projects">
        <h3>projects</h3>
    </div>
    <div id="contact">
        <h3>contact</h3>
        <form method="POST">
            <label>
                <input type="text" name="name" placeholder="Name" required>
            </label>
            <label>
                <input type="email" name="email" placeholder="Email" required>
            </label>
            <label>
                <input type="text" name="subject" placeholder="Subject" required>
            </label>
            <label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
            </label>
            <input type="submit" name="submit" value="Send">
        </form>
    </div>
</div>
<div id="footer">
    <h3>footer</h3>
</div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<!-- Custom JS-->
<script src="assets/js/scrollspy.js"></script>
<script src="assets/js/triangle.js"></script>
</body>
</html>