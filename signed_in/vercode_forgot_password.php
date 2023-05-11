<?php

@include 'dbconfig.php';


session_start();


$_SESSION['myEmail'];
$veremail = $_SESSION['myEmail'];


if (!isset($_SESSION['vercodeforgotpassword']) || $_SESSION['verification_code_used']) {

    // Generate a new random verification code between 1000000 and 9999999 (inclusive)
    $_SESSION['myVercode'] = mt_rand(1000000, 9999999);
    $vercode = $_SESSION['myVercode'];

    // Store the new verification code in the session variable
    $_SESSION['vercodeforgotpassword'] = $vercode;

    // Reset the used flag variable to false
    $_SESSION['verification_code_used'] = false;
} else {

    // Retrieve the previously generated verification code from the session variable
    $vercode = $_SESSION['vercodeforgotpassword'];
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'leitechcorp@gmail.com'; //SMTP username
    $mail->Password = 'syahozrdvgsvsrgg'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('gadingan.joko.bscs2020@gmail.com', 'Search Serpent');
    $mail->addAddress($veremail); //Add a recipient

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Verification code to create a new password';
    $mail->Body = 'Your verification code is ' . "<b>$vercode</b>";

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

if (isset($_POST['submit'])) {

    foreach ($_POST as $key => $value) {
        $_SESSION['info'][$key] = $value;
    }
    $keys = array_keys($_SESSION['info']);

    if (in_array('next', $keys)) {
        unset($_SESSION['info']['submit']);
    }

    $vercoderegistration = $_POST['vercodeforgotpassword'];

    if ($vercoderegistration == $_SESSION['vercodeforgotpassword']) {

        $_SESSION['verification_code_used'] = true;
        $_SESSION['status'] = "Your account has been verified successfully!";
        header("Location: create_new_password.php");
    } else {
        $error[] = 'Incorrect verification code.';
    }
}


// echo $_SESSION['myVariable'];

?>

<!DOCTYPE html>
<html>

<head>

    <title>Sign-in - SearchSerpent</title>

    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jPushMenu.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>



    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>


    <header>

        <nav class="navbar-default navbar-static-top" id="navbar-default" style="border-radius:0;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle toggle-menu menu-left push-body" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left"
                    id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><span>Home</span></a></li>
                        <li><a href="learn.php">Learn</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="sign_in.php">Sign-in</a></li>
                        <li><a href="sign_up.php">Sign-up</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <style>
            .navbar-default {
                background: #F5F5F5;
            }

            .navbar-default .navbar-nav li a {
                color: #000;
            }

            .navbar-default .navbar-toggle .icon-bar {
                background: #000;
            }

            .navbar-nav {
                float: right;
            }

            @media screen and (max-width: 768px) {
                .navbar-nav {
                    float: left;
                }
            }
        </style>

        <style>
            .red {
                color: #EB455F;
                font-size: 14px;
                text-transform: none;
                border-radius: 3px;
                padding: 4px 4px;
                text-align: center;
                font-family: montserrat;
                font-weight: bold;
            }

            input.larger {
                width: 10px;
                height: 10px;
            }
        </style>


    </header>


    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Sign-in</li>
        </ul>
    </div>



    <div class="contact">
        <div class="container">
            <div class="col-md-8">
                <?php
                if (isset($error)) {
                    ?>
                    <div style="width: 500px;" class="alert alert-danger" role="alert">
                        <center>
                            <p> Incorrect verification code.</p>
                        </center>
                    </div>
                    <?php
                    unset($error);
                }

                ?>
                <div class="contact-form">
                    <h3><b>Enter the verification code you have received</b></h3>
                    <hr>
                    <form action="#" method="post">


                        <p style="font-size: 15px; font-family: montserrat;">The verification code has been sent to your
                            email address:
                        </p><b>
                            <p style="font-family: montserrat; font-size: 15px;">
                                <?php echo $_SESSION['myEmail']; ?>
                        </b></p>

                        <input
                            style="text-transform: none; font-family: montserrat; width: 500px; margin-bottom: 5px; margin-top: 5px;"
                            name="vercodeforgotpassword" required placeholder="Verification code" type="text"
                            maxlength="7"
                            onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                            value="<?= isset($_SESSION['info']['vercodeforgotpassword']) ? $_SESSION['info']['vercodeforgotpassword'] : '' ?>">
                        <div class="error1" id="vercodeforgotpasswordErr"></div>



                        <p style="font-size: 14px; font-family: Montserrat;">Didn't receive a verification code? <a
                                href=" vercode_forgot_password.php" style="color:#000;">Resend</a></p>

                        <input
                            style="color:#F5F5F5; background-color:#000; text-transform:none; font-size: 16px; width: 120px; height: 40px; padding-top: 9px; margin-top:5px;"
                            type="submit" name="submit" id="next" value="Verify" class="form-btn">

                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-info">

                    <h3><b>Our Mission</b></h3>
                    <hr>
                    <p style="font-size: 15px; font-family: Montserrat;">To develop an education web search engine
                        application that provides computer science students with accurate and relevant search results.
                    </p>

                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <h3><b>Our Vision</b></h3>
                    <hr>
                    <p style="font-size: 15px; font-family: Montserrat;">To create a user-friendly platform that
                        provides computer science students with easy access to high-quality educational resources.
                        Through advanced search filters, the application will help students find the resources they need
                        quickly and efficiently. Ultimately, we aim to support students in their learning journey and
                        help them achieve academic success.</p>

                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container">
            <div class="col-md-4 col-sm-6">
                <h3>SearchSerpent</h3>
                <hr>
                <p>A cloud-integrated educational web search engine that specifically searches computer
                    science-related resources and helps users navigate the educational information they are looking for.
                </p>
            </div>
            <div class="col-md-4 col-sm-6">
                <h3>About Us</h3>
                <hr>
                <p>At SearchSerpent, we understand the importance of having easy access to educational resources for
                    computer science students. Our web search engine is designed to provide quick and accurate results,
                    tailored specifically to the needs of computer science students. </p>
            </div>
            <div class="col-md-4 col-sm-6">
                <h3>Contact Info</h3>
                <hr>
                <ul class="contact-list">
                    <li>
                        <p>
                            <i class="fa fa-home"></i>
                            Congressional Rd Ext, Barangay 171, Caloocan, Metro Manila
                        </p>
                        <p>
                            <i class="fa fa-phone"></i>
                            +63 920 303 3229
                        </p>
                        <p>
                            <i class="fa fa-envelope-o"></i>
                            leitechcorp@gmail.com
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <div class="copyright-part">
        <p>&copy 2023 <span>SearchSerpent</span> All Rights Reserved</p>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {
            $('.toggle-menu').jPushMenu({
                closeOnClickLink: false
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>


    <script type="text/javascript">
        $(function () {
            $.scrollUp({
                scrollName: 'scrollUp', // Element ID
                topDistance: '300', // Distance from top before showing element (px)
                topSpeed: 600, // Speed back to top (ms)
                animation: 'fade', // Fade, slide, none
                animationInSpeed: 200, // Animation in speed (ms)
                animationOutSpeed: 200, // Animation out speed (ms)
                activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
                scrollImg: true,
            });
        });
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>


</body>

</html>