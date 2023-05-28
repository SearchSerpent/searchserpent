<!DOCTYPE html>
<html>

<head>

    <title>Learn - SearchSerpent</title>

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
                    <a class="navbar-brand" href="home.php"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <li><a href="home.php"><span>Home</span></a></li>
                        <li>
                            <a href="#">Learn ▽ </a>
                            <ul class="dropdown">

                                <style>
                                    ul li ul.dropdown li {
                                        display: block;
                                        margin: 10px;


                                    }

                                    ul li ul.dropdown {
                                        width: 300px;
                                        background: #fff;
                                        position: absolute;
                                        z-index: 999;
                                        display: none;
                                        outline: 1px solid #f5f5f5;

                                    }

                                    ul li a:hover {
                                        background: #f5f5f5;
                                    }

                                    ul li:hover ul.dropdown {
                                        display: block;
                                        background: #fff;
                                        border-color: #f5f5f5;
                                    }
                                </style>

                                <li><a href="learn1.php">Programming Languages</a></li>
                                <li><a href="learn2.php">History of Computer</a></li>
                                <li><a href="learn3.php">Data Science</a></li>
                            </ul>
                        </li>
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
            <li><a href="home.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Learn</li>
        </ul>
    </div>


    <div class="pricing-table">
        <div class="container">
            <div class="table">


                <div class="col-md-4 col-sm-4">
                    <div class="block">
                        <div class="cost">
                            <img src="images/learn/proglang.png" style="width: 300px; height: 200px;" alt="" />
                            <h3>Programming <br> Language</h3>
                            <p></p>
                        </div>

                        <div class="info">
                            <ul class="item-list">
                                <li>
                                    Discover the best coding language to learn for a variety of applications. Choose the right coding languages to launch your programming career.
                                    <br>
                                    <br>
                                </li>
                                <li><a style="color:darkgray; text-decoration: none;" href="learn1.php" target="_blank"><button type="button">View</button></a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-4">
                    <div class="block">
                        <div class="cost">
                            <img src="images/learn/history.jpg" style="width: 300px; height: 200px;" alt="" />
                            <h3>History of <br> Computer</h3>

                            <p></p>
                        </div>

                        <div class="info">
                            <ul class="item-list">
                                <li>Programming is the act of instructing computers to carry out tasks. It is the process of designing, writing, testing, and maintaining source code for computer software.
                                    <br>
                                </li>
                                <li><a style="color:darkgray; text-decoration: none;" href="learn2.php" target="_blank"><button type="button">View</button></a></li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-md-4 col-sm-4">
                    <div class="block">
                        <div class="cost">
                            <img src="images/learn/datascience.jpg" style="width: 300px; height: 200px;" alt="" />
                            <h3>Data <br> Science</h3>

                            <p></p>
                        </div>

                        <div class="info">
                            <ul class="item-list">
                                <li> The accelerating volume of data sources, and subsequently data, has made data science is one of the
                                    fastest growing field across every industry.

                                    <br>
                                    <br>
                                </li>
                                <li><a style="color:darkgray; text-decoration: none;" href="learn3.php" target="_blank"><button type="button">View</button></a></li>
                            </ul>
                        </div>
                    </div>
                </div>









            </div>
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