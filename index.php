<?php

@include 'dbconfig.php';

session_start();

session_unset();
unset($_SESSION['message']);
?>


<!DOCTYPE html>
<html>

<head>

    <title>Home - SearchSerpent</title>

    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="manifest" href="manifest.webmanifest">

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jPushMenu.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>

    <script>
        window.addEventListener('load', () => {
            registerSW();
        });

        async function registerSW() {
            if ('serviceWorker' in navigator) {
                try {
                    await navigator.serviceWorker.register('./service-worker.js');
                } catch (e) {
                    console.log(`SW registration failed`);
                }
            }
        }

    </script>



    <script>
        if ("serviceWorker" in navigator) {
            window.addEventListener("load", () => {
                navigator.serviceWorker.register("/service-worker.js")
                    .then(registration => console.log("Service worker registered"))
                    .catch(error => console.error("Service worker registration failed", error));
            });
        }
    </script>





    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>



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


    </header>


    <div class="banner">
        <div class="opacity_overlay">
            <div class="info">
                <div class="subscribe">
                    <div class="opacity_overlay">
                        <div class="container">

                            <img src="images/white-logo.png" height="40px" width="150px">
                            <p style="font-size: 35px;">Explore the world of computer science with ease</p>
                            <p>Unlock your coding potential with us</p>

                            <form class="form-subscribe" action="search.php">
                                <div class="input-group">
                                    <input style="color:white;" type="text" class="form-input" name="query"
                                        placeholder="Search here">
                                    <span class="btn-group">
                                        <button class="btn" type="submit">Search</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="secondary_layer">

            </div>

        </div>
    </div>


    <div class="services">
        <div class="container">
            <h2>SearchSerpent is a <span id="rotate"></span> educational web search engine</h2>
            <h3>It is designed to help students find reliable and relevant information on a
                wide range of computer science topics.</h3>

            <div class="overview">

                <div class="col-md-4 col-sm-4">
                    <div class="feature-box">
                        <img src="images/image1.png" class="img-responsive">
                    </div>

                    <div class="feature-body">
                        <h4>Responsive</h4>
                        <p>It is designed to be accessible and easy to use on desktop, tablet, and mobile devices by
                            being optimized for various devices and screen sizes.</p>
                    </div>

                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="feature-box">
                        <img src="images/image2.png" class="img-responsive">
                    </div>

                    <div class="feature-body">
                        <h4>Reliable</h4>
                        <p>We use algorithms and filters to ensure that the most relevant and trustworthy information is
                            presented to the user.</p>
                    </div>

                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="feature-box">
                        <img src="images/image3.png" class="img-responsive">
                    </div>

                    <div class="feature-body">
                        <h4>Relevant</h4>
                        <p> We provide quick and easy access to vast amounts of information on computer science topics.
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="more-information">
        <div class="container">
            <div class="col-md-6">
                <div class="sides">
                    <h4>Why Choose Us</h4>
                    <hr>
                    <p>SearchSerpent is a search engine designed specifically for computer science students. We
                        understand that the field of computer science can be vast and complex, and finding reliable and
                        relevant information can be a daunting task. Our search engine is built to help you navigate
                        this complexity and find the information you need quickly and efficiently. </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="sides">
                    <h4>What We Will Do</h4>
                    <hr>
                    <p>Our team has worked tirelessly to build a database of high-quality resources that are
                        specifically tailored to computer science students' needs. We believe that every student should
                        have access to the best resources available to help them succeed academically, which is why we
                        are dedicated to providing a search engine that is dependable, relevant, and responsive.</p>
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
        var terms = ["responsive", "reliable", "relevant"];

        function rotateTerm() {
            var ct = $("#rotate").data("term") || 0;
            $("#rotate").data("term", ct == terms.length - 1 ? 0 : ct + 1).text(terms[ct]).fadeIn()
                .delay(1000).fadeOut(200, rotateTerm);
        }
        $(rotateTerm);
    </script>


    <script type="text/javascript">
        jQuery('.counter-item').appear(function () {
            jQuery('.counter-number').countTo();
            jQuery(this).addClass('funcionando');
            console.log('funcionando');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#clients-slider").carousel({
                interval: 5000 //TIME IN MILLI SECONDS
            });
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


</body>

</html>