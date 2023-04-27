<?php


$conn = mysqli_connect('sql202.epizy.com', 'epiz_33766646', 'VdVPgo6knnpO', 'epiz_33766646_pdocrud') or die('connection failed');


session_start();



if (isset($_POST['next'])) {

    foreach ($_POST as $key => $value) {
        $_SESSION['info'][$key] = $value;
    }

    $keys = array_keys($_SESSION['info']);

    if (in_array('next', $keys)) {
        unset($_SESSION['info']['next']);
    }


    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $_SESSION['prof_username'] = $username;
    $profile_username =  $_SESSION['prof_username'];

    $select_username = mysqli_query($conn, "SELECT * FROM `tblusers` WHERE username = '$username'");
    if (mysqli_num_rows($select_username) > 0) {
        $errorusername[] = 'Username already exists!';
    } else {
    }


    $_SESSION['myFirstname'] = $_POST['firstname'];
    $_SESSION['myLastname'] = $_POST['lastname'];
    $_SESSION['myUsername'] = $_POST['username'];
    $_SESSION['myVariable'] = $_POST['email'];


    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $select_email = mysqli_query($conn, "SELECT * FROM `tblusers` WHERE EmailId = '$email'");

    if (mysqli_num_rows($select_email) > 0) {
        $erroremail[] = 'Email already exists!';
    } else {
        header("Location: vercode_registration.php");
    }
}


?>



<!DOCTYPE html>
<html>

<head>

    <title>Sign-up - SearchSerpent</title>

    <meta charset="utf-8" />

    <!-- custom captcha  -->
    <link rel="stylesheet" href="style_captcha.css" />

    <!--eye icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jPushMenu.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>




    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        })
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--- style for error-->
    <style type="text/css">
        .error1 {
            color: #EB455F;
            font-size: 11px;
            text-transform: none;
            text-align: left;
        }

        .red {
            color: white;
            font-size: 12px;
            text-transform: none;
            background-color: #EB455F;
            padding: 2px 6px;
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


</head>

<body>

    <div class="loader"></div>

    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('images/page-loader.gif') 50% 50% no-repeat rgb(249, 249, 249);
        }
    </style>

    <header>
        <nav class="navbar-default navbar-static-top" id="navbar-default" style="border-radius:0;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle toggle-menu menu-left push-body" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="bs-example-navbar-collapse-1">

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


    </header>


    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Sign-up</li>
        </ul>
    </div>



    <div class="contact">
        <div class="container">
            <div class="col-md-8">
                <div class="contact-form">
                    <h3><b>Sign-up</b></h3>
                    <hr>
                    <form name="contactForm" onsubmit="return validateForm()" method="POST" action="">

                        <!-- First name -->
                        <input style="text-transform: capitalize; width:500px; font-family: Montserrat; margin-top: 5px;" type="text" name="firstname" onkeydown="return /[a-z, ]/i.test(event.key)" id="firstname" name="firstname" value="<?= isset($_SESSION['info']['firstname']) ? $_SESSION['info']['firstname'] : '' ?>" placeholder="First name" maxlength="40">
                        <div class="error1" id="firstnameErr"></div>

                        <!-- Last name -->
                        <input style="text-transform: capitalize; width:500px; font-family: Montserrat;" type="text" name="lastname" onkeydown="return /[a-z, ]/i.test(event.key)" id="lastname" name="lastname" value="<?= isset($_SESSION['info']['lastname']) ? $_SESSION['info']['lastname'] : '' ?>" placeholder="Last name" maxlength="40">
                        <div class="error1" id="lastnameErr"></div>

                        <!-- Username -->

                        <input style="text-transform: capitalize; width:500px; font-family: Montserrat;" type="text" maxlength="30" name="username" value="<?= isset($_SESSION['info']['username']) ? $_SESSION['info']['username'] : '' ?>" placeholder="Username">

                        <div class="popup" onclick="myFunction()"><i class="fa fa-info-circle" style="color: gray;" aria-hidden="true"></i>
                            <span class="popuptext" id="myPopup">Usernames must contain 8 or more characters and must begin with a letter, include a number, and contain no special characters.</span>
                        </div>
                        <?php
                        if (isset($errorusername)) {
                            foreach ($errorusername as $errorusername) {
                                echo '<div class="error1">' . $errorusername . '</div>';
                            };
                        };
                        ?>
                        <div class="error1" id="usernameErr"></div>

                        <!-- Email -->
                        <input style="text-transform: none; width:500px; font-family: Montserrat;" type="text" id="email" name="email" value="<?= isset($_SESSION['info']['email']) ? $_SESSION['info']['email'] : '' ?>" placeholder="Email">
                        <?php
                        if (isset($erroremail)) {
                            foreach ($erroremail as $erroremail) {
                                echo '<div class="error1">' . $erroremail . '</div>';
                            };
                        };
                        ?>
                        <div class="error1" id="emailErr"></div>


                        <!-- Password -->
                        <div>
                            <input style=" text-transform: none; width: 500px; font-family: Montserrat;" type="password" id="password1" name="password" maxlength="30" value="<?= isset($_SESSION['info']['password']) ? $_SESSION['info']['password'] : '' ?>" placeholder="Password">
                            <i class="far fa-eye" id="toggle-password1" style="margin-left: -35px; cursor: pointer;"></i>
                            <div class="popup" onclick="myFunctionPass()"><i class="fa fa-info-circle" style="color: gray; text-indent: 14px" aria-hidden="true"></i>

                                <span class="popuptext" id="myPopupPass">Passwords must contain 8 or more characters with at least one number, one uppercase letter, one lowercase letter, and one special character.</span>
                            </div>
                            <div class="error1" id="passwordErr"></div>
                        </div>


                        <!-- Confirm password -->
                        <div>
                            <input style="text-transform: none; width:500px; font-family: Montserrat;" onpaste="return false;" type="password" name="confirmpassword" id="password2" value="<?= isset($_SESSION['info']['confirmpassword']) ? $_SESSION['info']['confirmpassword'] : '' ?>" maxlength="30" placeholder="Confirm Password">
                            <i class="far fa-eye" id="toggle-password2" style="margin-left: -35px; cursor: pointer;"></i>
                            <div class="error1" id="confirmpasswordErr"></div>
                        </div>
                        <br>
                        <!-- Terms and conditions -->
                        <p style=" font-size:13px; font-family: montserrat;">Before clicking <b>Sign-up,</b> you must read and answer the captcha in the <b> <!-- Button trigger modal -->
                                <a style="cursor: pointer; color:#000" data-toggle="modal" data-target="#exampleModalLong">
                                    Terms and Conditions
                                </a></b></p>





                        <!-- Modal -->
                        <div style="font-family: montserrat;" class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">SearchSerpent | Terms and Conditions</h5>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        Welcome to the <b>SearchSerpent engine!</b> an educational web search engine application that can filter out irrelevant information which helps students to navigate information, particularly in computer science-related fields. These are our Terms & Conditions for the use of the network. You may access it in several ways but is intended for computer science-related courses only. Your changed or revised Agreement will constitute your acceptance of any such changes, or of a revised Agreement will constitute your acceptance of any such changes or revisions. If you continue to browse and use this website. In that case, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern our relationship with you in relation to this website.
                                        <br>
                                        <br>
                                        <b>What’s covered in these terms:</b>
                                        <br>
                                        1. The information on these pages is provided solely for your general information and use. It is subject to change at any time.
                                        <br>
                                        2. We and third parties provide no warranty or guarantee about the accuracy, timeliness, performance, completeness, or suitability of the information and contents found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or omissions, for which we expressly disclaim liability to the fullest extent permitted by law.
                                        <br>
                                        3. You use any information or content on this website totally at your own risk, for which we accept no responsibility. It is your duty to ensure that any products, services, or information obtained from this website satisfy your unique needs. This website contains material that is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, and graphics.
                                        <br>
                                        4. Other than in conformity with the copyright notice, which is part of these terms and conditions, reproduction is prohibited.
                                        <br>
                                        5. The operator acknowledges all trademarks reproduced on this website that is not owned by or licensed to him. Illegal use of this website may result in a civil claim and/or a criminal violation.
                                        <br>
                                        6. This website may contain connections to other websites from time to time. These links are offered for your convenience in order to provide additional information. These do not imply that we support the website (s). We accept no responsibility for the linked website's content (s).
                                        <br>
                                        7. Your use of this website, as well as any dispute resulting from such use, is governed by the laws of the Republic of the Philippines.
                                        <br>
                                        <br>
                                        <b>Disclaimer:</b>
                                        We know it’s tempting to skip these Terms & conditions, but it’s important to establish what you can expect from us as you use SearchSerpent, and what we expect from you. Please do use our website.

                                        <br>
                                        <br>

                                        <hr style="border: 1px solid black;">
                                        <br>
                                        <b>Privacy Policy</b>
                                        <br>
                                        <br>
                                        Good day searchers! This is SearchSerpent Engine’s Privacy Policy.
                                        <br>
                                        <br>
                                        This page is used to inform website visitors regarding our policies regarding the collection, use, and disclosure of Personal Information
                                        <br>
                                        <br>
                                        If you choose to use our Service, then you agree to the collection and use of information in relation to this policy.
                                        <br>
                                        <br>
                                        Personal Information is often, but not exclusively, provided to us when you sign up for and use the site based on RA 10173 ( Data Privacy Act of 2012) protects the privacy o
                                        f individuals while ensuring the free flow of information.
                                        <br>
                                        <br>
                                        1. Collection of Personal Information
                                        <br>
                                        We may collect the following information via submission on the contact page…
                                        <br>
                                        2. Name
                                        <br>
                                        3. Contact information including Email
                                        <br>
                                        4. Inquiry details.
                                        <br>
                                        <br>

                                        <b>Purpose of Data Collection and Processing</b>
                                        <br>
                                        The purpose of gathering the data is to provide content for data analysis, the information gathered must be of the highest quality for it to be of value.
                                        <br>
                                        <br>

                                        <b>Data Security</b>
                                        <br>
                                        Protecting your data information accounts for the sensitivity of various datasets and corresponding to regulatory compliance requirements
                                        <br>
                                        <br>

                                        <b> Data Retention</b>
                                        <br>
                                        Information should only be retained as long as necessary to fulfill the original purpose(s) for the data collected.
                                        <br>
                                        <br>

                                        <b> Disclosure of Personal Information</b>
                                        <br>
                                        Releasing or making the information available to another person or organization.
                                        <br>
                                        <br>

                                        <b> Your Rights</b>
                                        <br>
                                        Personal information controller, or the personal information processor, violated your rights as a data subject.
                                        <br>
                                        <br>

                                        <b> Our responsibilities:</b>
                                        <br>
                                        If you are a visitor to our website, we secured your personal data.
                                        We protect your rights in using our website.
                                        <br>
                                        <br>

                                        We will provide notice of the modification by email if having a technical problem.
                                        <br><br>


                                        Contact the SearchSerpent to Integrate the service with another website or services.
                                        <br>
                                        <br>

                                        Thank you!
                                        <br>
                                        <br>

                                        <hr style="border: 1px solid black;">
                                        <br>
                                        <!-- custom captcha -->
                                        <p style="font-size: 16px; text-align: left;color: #03001C; font-family: Montserrat;">
                                            <font color="red">*</font>Captcha
                                        </p>
                                        <div class="wrapper">
                                            <canvas style="border-style: outset;" id="canvas" width="200" height="70"></canvas>
                                            <br>
                                            <button style="  background-color:#000;
                    border: none;
                    color: #F5F5F5;
                    padding: 4px 7px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 9px;
                    margin: 6px 2px;
                    cursor: pointer;
                    font-family: Montserrat;" id="reload-button"> Try another
                                            </button>
                                        </div>
                                        <input style="width:500px; font-family: Montserrat; margin-top: 2px;" type="text" id="userInput" placeholder="Enter the text from the image above" />
                                        <div class="error1" id="userInputErr"></div>
                                        <br>
                                        <!-- Next button -->
                                        <input style="color:#F5F5F5; background-color:#000; text-transform:none; font-size: 16px; width: 120px; height: 40px; padding-top: 9px; margin-top: 4px; font-family: Montserrat;" type="submit" name="next" id="next" value="Agree" class="form-btn">

                                    </div>
                                    <div class="modal-footer">
                                        <button style="font-family: montserrat; color:#F5F5F5; background-color:#000;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Next button -->
                        <input style="color:#F5F5F5; background-color:#000; text-transform:none; font-size: 16px; width: 120px; height: 40px; padding-top: 9px; margin-top: 4px; font-family: Montserrat;" type="submit" name="next" id="next" value="Sign-up" class="form-btn">
                    </form>
                </div>
            </div>




            <div class="col-md-4">
                <div class="contact-info">

                    <h3><b>Our Mission</b></h3>
                    <hr>
                    <p style="font-size: 15px; font-family: Montserrat;">To develop an education web search engine application that provides computer science students with accurate and relevant search results.</p>

                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <h3><b>Our Vision</b></h3>
                    <hr>
                    <p style="font-size: 15px; font-family: Montserrat;">To create a user-friendly platform that provides computer science students with easy access to high-quality educational resources. Through advanced search filters, the application will help students find the resources they need quickly and efficiently. Ultimately, we aim to support students in their learning journey and help them achieve academic success.</p>

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
        $(document).ready(function() {
            $('.toggle-menu').jPushMenu({
                closeOnClickLink: false
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>


    <script type="text/javascript">
        $(function() {
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
        // When the user clicks on div (information icon), open the popup
        function myFunctionPass() {
            var popuppass = document.getElementById("myPopupPass");
            popuppass.classList.toggle("show");
        }
    </script>


    <script>
        // Get the eye icons and password fields
        const togglePassword1 = document.querySelector('#toggle-password1');
        const togglePassword2 = document.querySelector('#toggle-password2');
        const password1 = document.querySelector('#password1');
        const password2 = document.querySelector('#password2');

        // Toggle the visibility of password 1
        togglePassword1.addEventListener('click', function() {
            const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type);
            togglePassword1.classList.toggle('fa-eye-slash');
        });

        // Toggle the visibility of password 2
        togglePassword2.addEventListener('click', function() {
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            togglePassword2.classList.toggle('fa-eye-slash');
        });
    </script>



    <script src="script_captcha.js"></script>

    <script type="text/javascript">
        function restrictAlphabets(e) {
            var x = e.which || e.keycode;
            if ((x >= 48 && x <= 57))
                return true;
            else
                return false;
        }

        // Defining a function to display error message
        function printError(elemId, hintMsg) {
            document.getElementById(elemId).innerHTML = hintMsg;
        }

        // Defining a function to validate form 
        function validateForm() {
            // Retrieving the values of form elements 
            var firstname = document.contactForm.firstname.value;
            var lastname = document.contactForm.lastname.value;
            var username = document.contactForm.username.value;
            var email = document.contactForm.email.value;
            var password = document.contactForm.password.value;
            var confirmpassword = document.contactForm.confirmpassword.value;
            var userInput = document.contactForm.userInput.value;



            // Defining error variables with a default value
            var firstnameErr = lastnameErr = usernameErr = emailErr = passwordErr = confirmpasswordErr = userInputErr = true;


            // Validate first name
            if (firstname == "") {
                printError("firstnameErr", "First name must contain two or more characters.");
            } else {
                var regex = /^[a-zA-Z\s].{1,}$/;
                if (regex.test(firstname) === false) {
                    printError("firstnameErr", "First name must contain two or more characters.");
                } else {
                    printError("firstnameErr", "");
                    firstnameErr = false;
                }
            }

            // Validate last name
            if (lastname == "") {
                printError("lastnameErr", "Last name must contain two or more characters.");
            } else {
                var regex = /^[a-zA-Z\s].{1,}$/;
                if (regex.test(lastname) === false) {
                    printError("lastnameErr", "Last name must contain two or more characters.");
                } else {
                    printError("lastnameErr", "");
                    lastnameErr = false;
                }
            }

            // Validate username
            if (username == "") {
                printError("usernameErr", "Usernames must contain 8 or more characters.");
            } else {
                var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                if (regex.test(username) === false) {
                    printError("usernameErr", "Usernames must contain 8 or more characters and must begin with a letter, include a number, and contain no special characters.");
                } else {
                    printError("usernameErr", "");
                    usernameErr = false;
                }
            }

            // Validate email address
            if (email == "") {
                printError("emailErr", "Please enter your email address.");
            } else {
                // Regular expression for basic email validation
                var regex = /^\S+@\S+\.\S+$/;
                if (regex.test(email) === false) {
                    printError("emailErr", "Please enter a valid email address.");
                } else {
                    printError("emailErr", "");
                    emailErr = false;
                }
            }

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

            // Validate captcha
            if (userInput == "") {
                printError("userInputErr", "You must enter the text above.");
                triggerFunction();
            } else {
                if (userInput != text) {
                    printError("userInputErr", "Text did not match.");
                } else {
                    printError("userInputErr", "");
                    userInputErr = false;
                }
            }


            // Prevent the form from being submitted if there are any errors
            if ((firstnameErr || lastnameErr || usernameErr || emailErr || passwordErr || confirmpasswordErr || userInputErr) == true) {
                return false;
            } else {

            }
        };
    </script>


</body>

</html>