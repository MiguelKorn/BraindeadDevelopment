<?php
   // var_dump($_POST);
    //var_dump($_REQUEST);
    //echo $_SERVER["REQUEST_METHOD"];
require './utils/PHPMailer/Mailer.php';
require './utils/settings.php';
require './utils/Sanitize/sanitize.inc.php';

    if (isset($_POST["submit"])) {
    echo $_POST["firstName"];
    }



if (isset($_POST["submit"]) && $_POST["submit"] === "Send") {
    $firstName = sanitize($_POST["firstName"], HTML);
    $lastName = sanitize($_POST["lastName"], HTML);
    $email = sanitize($_POST["email"], HTML);
    $date = sanitize($_POST["date"], HTML);
    $class = sanitize($_POST["class"], HTML);
    $type = sanitize($_POST["type"], HTML);
    $motivation = sanitize($_POST["motivation"], HTML);

    $mailer = new Mailer(FROM_MAIL, FROM_PASS);
    $mailer->setMailFrom(FROM_MAIL, FROM_NAME);
    $mailer->setMailTo(FROM_MAIL, FROM_NAME);
    $mailer->setSubject('subject');
    $mailer->setBody('body'); // can be html
//$mailSend = $mailer->sendMail();
    echo $mailer->sendMail();
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

<div id="formContainer" class="mx-auto" style="width: 200px; height: 30px;">
    <form  action="" method="post">
    <div class="card-body">
        
            <div class="form-group">
                <label for="firstName">First Name </label>
                    <input type="text" class="form-control" name="firstName" placeholder="First Name">
            </div>
        
    </div>

    <div class="card-body">
        
            <div class="form-group">
                <label for="lastName">Last Name </label>
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
            </div>
        
    </div>

    <div class="card-body">
        
            <div class="form-group">
                <label for="email">Email </label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your school email">
            </div>
        
    </div>

    <div class="card-body">
        
            <div class="form-group">
                <label for="date">Date of Birth </label>
                    <input type="text" class="form-control" name="date" placeholder="Date of Birth">
            </div>
        
    </div>

    <div class="card-body">
        
            <div class="form-group">
                <label for="class">Class</label>
                    <select class="form-control" name="class">
                        <option>MD2A</option>
                        <option>MD2B</option>
                    </select>
            </div>
        
    </div>

    <div class="card-body">
        
            <div class="form-group">
                <label for="type">Type Developer</label>
                <select class="form-control" name="type">
                    <option>Front-End</option>
                    <option>Back-End</option>
                    <option>Full Stack</option>
                </select>
            </div>
        
    </div>

    <div class="card-body">
        
            <div class="form-group">
                <label for="motivation">Motivation</label>
                    <textarea class="form-control" name="motivation" cols="6" rows="12">
                    </textarea>
            </div>
        
    </div>


        <input type="submit" name="submit" value="Send">
    </form>
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

</body>
</html>