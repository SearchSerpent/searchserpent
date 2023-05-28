<?php

include 'dbconfig.php';

session_start();

if (isset($_POST['send'])) {
    $conn = mysqli_connect('sql105.epizy.com', 'epiz_34189122', 'OGboYDIf9LXfL', 'epiz_34189122_pdocrud');


    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message`");

    mysqli_query($conn, "INSERT INTO `message`(name, EmailId,  message) VALUES('$name', '$email', '$msg')") or die('query failed');
    $message[] = 'Message sent successfully!';
}


?>

<!DOCTYPE html>

<head>

    <title>Contact - SearchSerpent</title>

    <meta charset="utf-8" />

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
    
<script src="/service-worker.js"></script>
<link rel="manifest" crossorigin="use-credentials" href="signed/manifest.json">



    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>



    <style>
        .green {
            color: green;
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
                      <li><a href="home.php"><span>Home</span></a></li>
                        <li><a href="learn.php">Learn</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="profile.php">Profile</a></li>
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
            <li class="active">Contact</li>
        </ul>
    </div>

    <div style="-webkit-filter: grayscale(100%); filter: grayscale(100%);">
        <iframe width="100%;" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="pointer-events: none;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.2630988452756!2d121.03118205564488!3d14.754201765747641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b1cc5ffb90cf%3A0xf1e37bb3f2086d!2sCongressional%20Rd%20Ext%2C%20Barangay%20171%2C%20Caloocan%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1679133870155!5m2!1sen!2sph"></iframe>

    </div>

    <div class="contact">
        <div class="container">
            <div class="col-md-8">
                <div class="contact-form">
                    <?php
                    if (isset($message)) {
                    ?>
                        <div style="width: 500px;" class="alert alert-success" role="alert">
                            <center>
                                <p> Message successfully sent.</p>
                            </center>
                        </div>
                    <?php
                        unset($message);
                    }

                    ?>

                    <h3><b>Contact Form</b></h3>
                    <hr>
                    <form action="#" method="post">
                        <input style="width: 500px; max-width: 100%; font-family:montserrat; margin-top: 5px;" type="text" name="name" required placeholder="Name" class="box" onkeydown="return /[a-z, ]/i.test(event.key)" id="firstname" name="firstname">

                        <input style="width: 500px; max-width: 100%; font-family:montserrat;" type="email" name="email" required placeholder="Email" class="box">

                        <textarea name="message" class="box" placeholder="Message here" id="" cols="20" rows="5" style="width: 500px; max-width: 100%; font-family: montserrat;" required></textarea>
                        <br>

                        <!-- Send button -->
                        <input style="color:#F5F5F5; background-color:#000; text-transform:none; font-size: 16px; width: 120px;height: 40px; margin-top: 15px; padding-top: 9px; font-family: Montserrat;" type="submit" name="send" value="Send" class="form-btn">

                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <h3><b>Contact Info</b></h3>
                    <hr>
                    <p> The purpose of this page is to provide users with a way to ask questions, report issues, or provide feedback to the website owners. It helps to establish trust and build relationships with users, as well as improve the overall user experience on the website.</p>
                    <p><strong>Address:</strong> Congressional Rd Ext, Barangay 171, Caloocan, Metro Manila
                    </p>
                    <p><strong>Mail:</strong> leitechcorp@gmail.com</p>
                    <p><strong>Phone:</strong> +63 920 303 3229</p>
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


</body>

</html>