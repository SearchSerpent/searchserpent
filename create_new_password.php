<?php

@include 'dbconfig.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('connection failed');

session_start();




if (isset($_POST['next'])) {

    foreach ($_POST as $key => $value) {
        $_SESSION['info'][$key] = $value;
    }

    $keys = array_keys($_SESSION['info']);

    if (in_array('next', $keys)) {
        unset($_SESSION['info']['next']);
    }

    $myemail = $_SESSION['myEmail'];

    $newpass = mysqli_real_escape_string($conn, ($_POST['password']));
    $newcpass = mysqli_real_escape_string($conn, ($_POST['confirmpassword']));

    $select_users1 = mysqli_query($conn, "UPDATE `tblusers` SET password ='$newpass' WHERE EmailId = '$myemail'");

    $select_users2 = mysqli_query($conn, "UPDATE `tblusers` SET confirmpassword ='$newcpass' WHERE EmailId = '$myemail'");

    if ($newpass == $newcpass) {

        $msg1 = 'Your password has been changed successfully! You can now sign-in.';
        header('Location: sign_in.php?msg1=' . urlencode($msg1));
    } else {
        $error[] = 'Password did not match!';
    }
}
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

    <script type="text/javascript">
        function preback() {
            window.history.forward();
        }
        setTimeout("preback()", 0);
        window.onunload = function () {
            null
        };
    </script>

    <script type="text/javascript">
        $(window).load(function () {
            $(".loader").fadeOut("slow");
        })
    </script>

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
                    <a class="navbar-brand" href="index.php"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left"
                    id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><span>Home</span></a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="sign_in.php">Sign-in</a></li>

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
            .error1 {
                color: #EB455F;
                font-size: 11px;
                text-transform: none;
                text-align: left;
            }

            .red {
                color: #EB455F;
                font-size: 14px;
                text-transform: none;
                border-radius: 3px;
                padding: 4px 4px;
                text-align: center;
            }

            input.larger {
                width: 10px;
                height: 10px;
            }
        </style>

        <!--- style for icon information (password)-->
        <style>
            /* Popup container - can be anything you want */
            .popup {
                position: relative;
                display: inline-block;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            /* The actual popup */
            .popup .popuptext {
                visibility: hidden;
                width: 160px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 8px 0;
                position: absolute;
                z-index: 1;
                bottom: 125%;
                left: 50%;
                margin-left: -80px;
            }

            /* Popup arrow */
            .popup .popuptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            /* Toggle this class - hide and show the popup */
            .popup .show {
                visibility: visible;
                -webkit-animation: fadeIn 1s;
                animation: fadeIn 1s;
            }

            /* Add animation (fade in the popup) */
            @-webkit-keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }
        </style>


    </header>


    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li><a href="sign_in.php">Sign-in</a> <span class="divider">/</span></li>
            <li><a href="forgot_password.php">Forgot password</a> <span class="divider">/</span></li>
            <li><a href="vercode_forgot_password.php">Verification code</a> <span class="divider">/</span></li>
            <li class="active">Create a new password</li>
        </ul>
    </div>



    <div class="contact">
        <div class="container">
            <div class="col-md-8">
                <div class="contact-form">

                    <?php
                    if (isset($_SESSION['status'])) {
                        ?>
                        <div style="width: 500px;" class="alert alert-success" role="alert">
                            <center>
                                <p> Your email address has been verified successfully.</p>
                            </center>
                        </div>

                        <?php

                        unset($_SESSION['status']);
                    }

                    ?>
                    <h3><b>Create a new password</b></h3>
                    <hr>
                    <form name="contactForm" onsubmit="return validateForm()" method="POST" action="">

                        <input style="text-transform: none; width: 500px; font-family: montserrat;margin-top: 5px;"
                            required type="password" id="password1" name="password" maxlength="30"
                            value="<?= isset($_SESSION['info']['password']) ? $_SESSION['info']['password'] : '' ?>"
                            placeholder="Enter your password">
                        <i class="far fa-eye" id="toggle-password1" style="margin-left: -35px; cursor: pointer;"></i>

                        <div class="popup" onclick="myFunction()"><i class="fa fa-info-circle"
                                style="color: gray; text-indent: 14px" aria-hidden="true"></i>
                            <span class="popuptext" id="myPopup">Passwords must contain 8 or more characters with at
                                least one number, one uppercase letter, one lowercase letter, and one special
                                character.</span>
                        </div>
                        <div class="error1" id="passwordErr"></div>


                        <!-- Confirm password -->
                        <input style="text-transform: none; width: 500px; font-family: montserrat"
                            onpaste="return false;" type="password" required name="confirmpassword" id="password2"
                            value="<?= isset($_SESSION['info']['confirmpassword']) ? $_SESSION['info']['confirmpassword'] : '' ?>"
                            maxlength="30" placeholder="Confirm your password">
                        <i class="far fa-eye" id="toggle-password2" style="margin-left: -35px; cursor: pointer;"></i>
                        <div class="error1" id="confirmpasswordErr"></div>

                        <br>
                        <!-- Next button -->
                        <input
                            style="color:#F5F5F5; background-color:#000; text-transform:none; font-size: 16px; width: 120px; height: 40px; margin-top: -2px ;padding-top: 9px; font-family: Montserrat;"
                            type="submit" name="next" value="Submit" class="form-btn">

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
        // When the user clicks on div (information icon), open the popup
        function myFunction() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
    </script>

    <script>
        // Get the eye icons and password fields
        const togglePassword1 = document.querySelector('#toggle-password1');
        const togglePassword2 = document.querySelector('#toggle-password2');
        const password1 = document.querySelector('#password1');
        const password2 = document.querySelector('#password2');

        // Toggle the visibility of password 1
        togglePassword1.addEventListener('click', function () {
            const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type);
            togglePassword1.classList.toggle('fa-eye-slash');
        });

        // Toggle the visibility of password 2
        togglePassword2.addEventListener('click', function () {
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            togglePassword2.classList.toggle('fa-eye-slash');
        });
    </script>


    <script type="text/javascript">
        // Defining a function to display error message
        function printError(elemId, hintMsg) {
            document.getElementById(elemId).innerHTML = hintMsg;
        }

        // Defining a function to validate form 
        function validateForm() {
            // Retrieving the values of form elements 
            var password = document.contactForm.password.value;
            var confirmpassword = document.contactForm.confirmpassword.value;


            // Defining error variables with a default value
            var passwordErr = confirmpasswordErr = true;



            // Validate password
            if (password == "") {
                printError("passwordErr", "Passwords must contain 8 or more characters with at least one number, one uppercase letter, one lowercase letter, and one special character.");
            } else {
                var regex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&;:*-]).{8,}$/;
                if (regex.test(password) === false) {
                    printError("passwordErr", "Passwords must contain 8 or more characters with at least one number, one uppercase letter, one lowercase letter, and one special character.");
                } else {
                    printError("passwordErr", "");
                    passwordErr = false;
                }
            }

            // Validate confirm password
            if (confirmpassword == "") {
                printError("confirmpasswordErr", "You must repeat your password.");
            } else {

                if (confirmpassword != password) {
                    printError("confirmpasswordErr", "Password did not match.");
                } else {
                    printError("confirmpasswordErr", "");
                    confirmpasswordErr = false;
                }
            }


            // Prevent the form from being submitted if there are any errors
            if ((passwordErr || confirmpasswordErr) == true) {
                return false;
            } else {

            }
        };
    </script>


</body>

</html>