<?php

@include 'dbconfig.php';

session_start();

if (isset($_SESSION['info'])) {

    extract($_SESSION['info']);

    $conn = mysqli_connect('localhost', 'root', '', 'ssdb');
    $name = $firstname . ' ' . $lastname;
    $user_type = "user";
    $img = "noprofil.jpg";


    $sql = mysqli_query($conn, "INSERT INTO users(name, email, confirmpassword, password, firstname, lastname, username, user_type, vercoderegistration, image) 
    VALUES('$name','$email','$confirmpassword', '$password', '$firstname', '$lastname', '$username','$user_type', '$vercoderegistration','$img')");


    if ($sql) {
        unset($_SESSION['info']);
    } else {
        echo mysqli_error($conn);
    }



    $select_users = mysqli_query($conn, "SELECT * FROM users 
    WHERE (email = '$email' or 
        username = '$email')") or
        die('query failed');


    if (mysqli_num_rows($select_users) > 0) {

        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            $message[] = 'Incorrect email or password!';
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
        }
    } else {
    }
}
?>




<!DOCTYPE html>
<html>

<head>

    <title>Search results - SearchSerpent</title>

    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="css/search_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jPushMenu.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>

    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        })
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                    <a class="navbar-brand" href="home.php"></a>
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


    <div class="banner">

        <div class="opacity_overlay">

            <div class="info">
                <div class="subscribe">
                    <div style="margin-top: -100px;" class="opacity_overlay">

                        <div class="container">

                            <form class="form-subscribe" method="get" action="search.php" id="search-bar">
                                <div class="input-group">
                                    <input style="color:white;" type="text" class="form-input" placeholder="Search here" name="query" required>
                                    <span class="btn-group">
                                        <a href='search_query.php'><button class="btn" type="submit">Search</button></a>
                                </div>



                                <?php
                                // Check if the search query is set
                                if (isset($_GET['query'])) {
                                    // Get the search query
                                    $query = $_GET['query'];
                                    // Define the database connection variables
                                    $host = 'localhost';
                                    $username = 'root';
                                    $password = '';
                                    $database = 'ssdb';
                                    // Create a PDO database connection
                                    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                                    // Set the number of results to display per page
                                    $results_per_page = 10;
                                    // Get the current page number
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }
                                    // Calculate the starting result for the current page
                                    $start_from = ($page - 1) * $results_per_page;
                                    // Prepare the SQL statement to search for the query in the database
                                    // Prepare the SQL statement to search for the query in the title and keywords columns and order the results by relevance
                                    $stmt = $pdo->prepare("SELECT * FROM `pages` 
WHERE MATCH (`title`, `keywords`) AGAINST (:query) 
ORDER BY MATCH (`title`, `keywords`) AGAINST (:query) DESC 
LIMIT $start_from, $results_per_page");
                                    $stmt->bindValue(':query', $query);


                                    // Execute the SQL statement
                                    $stmt->execute();
                                    // Fetch the results
                                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    // Get the total number of results for the query
                                    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `pages` 
    WHERE `title` LIKE :query OR 
    `description` LIKE :query OR 
    `url` LIKE :query");
                                    $stmt->bindValue(':query', '%' . $query . '%');
                                    $stmt->execute();
                                    $total_results = $stmt->fetchColumn();
                                    // Calculate the total number of pages
                                    $total_pages = ceil($total_results / $results_per_page);
                                    // Display the results

                                    foreach ($results as $result) {
                                ?>

                                        <div class="search_list">

                                            <?php

                                            echo '<h3 style="text-transform:none; "><a href="' . $result['url'] . '" target="_blank"> <b>' . $result['title'] . '</b></a></h3>';
                                            echo '<p style="color:green; font-size: 11px;">' . $result['url'] . '</p> <br>';
                                            echo $result['description'] . '<br><br>';

                                            ?>

                                        </div>

                                    <?php
                                    }

                                    ?>

                                    <div class="paging">
                                        <?php
                                        // Display the pagination links
                                        for ($i = 1; $i <= $total_pages; $i++) {

                                            echo '<a href="search.php?query=' . $query . '&page=' . $i . '">' . $i . '</a>';
                                        }


                                        ?>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <p>Sorry, we are unable to find what you're looking for. Try to search on something. </p>

                                <?php
                                }
                                ?>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="secondary_layer">

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
            var terms = ["responsive", "reliable", "relevant"];

            function rotateTerm() {
                var ct = $("#rotate").data("term") || 0;
                $("#rotate").data("term", ct == terms.length - 1 ? 0 : ct + 1).text(terms[ct]).fadeIn()
                    .delay(1000).fadeOut(200, rotateTerm);
            }
            $(rotateTerm);
        </script>


        <script type="text/javascript">
            jQuery('.counter-item').appear(function() {
                jQuery('.counter-number').countTo();
                jQuery(this).addClass('funcionando');
                console.log('funcionando');
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#clients-slider").carousel({
                    interval: 5000 //TIME IN MILLI SECONDS
                });
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