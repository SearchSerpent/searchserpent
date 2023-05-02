<?php

@include 'dbconfig.php';

session_start();


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
                               
                            </form>

                        </div>
                    </div>
                </div>

                 <style><!-- For the search results -->
        #search_list h3 {
            margin: 0;
            color:blue;
            
        }
        
        a {
            text-decoration: none;
            color: #1a0dab;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        div {
            font-size: 14px;
            color: #006621;
        }


    </style>

                <?php


if(isset($_GET['query'])) {
    $search_query = $_GET['query'];
    $search_engine_id = "12df0fc9b39e74ab9"; 
    $api_key = "AIzaSyDT9ocVlzkbQx0l-mpMU-zQq3F0wyDvMzc"; 
    $start_index = isset($_GET['start_index']) ? $_GET['start_index'] : 1;

    $url = "https://www.googleapis.com/customsearch/v1?key=".$api_key."&cx=".$search_engine_id."&q=".urlencode($search_query)."&start=".$start_index;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    $results = json_decode($output, true);

    $html = "";
    if(isset($_GET['query'])) {
        $search_query = $_GET['query'];
        $search_engine_id = "12df0fc9b39e74ab9"; 
        $api_key = "AIzaSyDT9ocVlzkbQx0l-mpMU-zQq3F0wyDvMzc"; 
        $start_index = isset($_GET['start_index']) ? $_GET['start_index'] : 1;

        $url = "https://www.googleapis.com/customsearch/v1?key=".$api_key."&cx=".$search_engine_id."&q=".urlencode($search_query)."&start=".$start_index;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $results = json_decode($output, true);

        if(isset($results['items'])) {
            $html .= "<style>
                #search_list {
                    background-color: #f5f5f5;
                    text-align:left;
                }
        
                .search_item {
                    background-color: #fff;
                }
        
                .pagination {
                    display: flex;
                    justify-content: center;
                    margin-top: 20px;
                }
        
                .page-link {
                    display: block;
                    padding: 5px 10px;
                    margin: 0 5px;
                    background-color: #fff;
                    border: 1px solid #ccc;
                    text-align: center;
                    color: #333;
                    text-decoration: none;
                    cursor: pointer;
                }
        
                .page-link:hover,
                .page-link:focus {
                    background-color: #eee;
                }
        
                .page-link.active {
                    background-color: #333;
                    color: #fff;
                    border-color: #333;
                }
        
            </style>";
            
            $html .= "<div id='search_list'>";
            $html .= "<h2 style='color:black; text-transform:none;'>Search Results for ".$search_query."</h2>";
            
            $items_per_page = 10;
            $current_page = floor($start_index / $items_per_page) + 1;
            $total_pages = ceil($results['searchInformation']['totalResults'] / $items_per_page);
            $first_page = max(1, $current_page - 3);
            $last_page = min($total_pages, $current_page + 3);
            
            foreach($results['items'] as $item) {
                $html .= "<div class='search_item'>";
                $html .= "<h3 style='font-size:22px; text-transform:none;'>
                            <a href='".$item['link']."'>".$item['title']."</a>
                        </h3>";
                $html .= "<div>".$item['link']."</div>";
                $html .= "<p style='color:black;'>" .$item['snippet']. "</p><br><br>";
                $html .= "</div>";
            }
            
            if($total_pages > 1) {
                $html .= "<div class='pagination'>";
                
                if($current_page > 1) {
                    $prev_start_index = ($current_page - 2) * $items_per_page + 1;
                    $html .= "<a href='?query=".urlencode($search_query)."&start_index=".$prev_start_index."' class='page-link'>
                                Previous
                            </a>";
                }
                
                for($i = $first_page; $i <= $last_page; $i++) {
                    $start_index = ($i - 1) * $items_per_page + 1;
                    $active_class = ($i == $current_page) ? 'active' : '';
                    $html .= "<a href='?query=".urlencode($search_query)."&start_index=".$start_index."' class='page-link ".$active_class."'>
                                ".$i."
                            </a>";
                }
                
                if($current_page < $total_pages) {
                    $next_start_index = $current_page * $items_per_page + 1;
                    $html .= "<a href='?query=".urlencode($search_query)."&start_index=".$next_start_index."' class='page-link'>
                                Next
                            </a>";
                }
                
                $html .= "</div>";
            }
            
            $html .= "</div>";
        } else {
            $html = "<h2>No results found for '".$search_query."'</h2>";
        }
        
        echo $html;
        


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