<?php
require 'config.php';

if (isset($_SESSION['login_id'])) {
    header('Location: signed_in/signed_in_home.php');
    exit;
}

require 'google-api-php-client-2.4.0/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('692907008570-pf8btieioflisqpocse63jq8dlfu1kdm.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/searchserpent-new/login.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if (isset($_GET['code'])) :

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token["error"])) {

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);
        list($username, $domain) = explode('@', $email);
        $username = $username . mt_rand(1, 1111);
        $usertype = "user";

        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `tblusers` WHERE `google_id`='$id'");
        if (mysqli_num_rows($get_user) > 0) {

            $_SESSION['login_id'] = $id;
            header('Location: signed_in/signed_in_home.php');
            exit;
        } else {

            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `tblusers`(`google_id`,`name`,`EmailId`,`Photo`,`username`,`user_type`) VALUES('$id','$full_name','$email','$profile_pic','$username','$usertype')");

            if ($insert) {
                $_SESSION['login_id'] = $id;
                header('Location: signed_in/signed_in_home.php');
                exit;
            } else {
                echo "Sign up failed!(Something went wrong).";
            }
        }
    } else {
        header('Location: login.php');
        exit;
    }

else :
    // Google Login Url = $client->createAuthUrl(); 
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

            <style>
                .login-with-google-btn {
                    transition: background-color 0.3s, box-shadow 0.3s;
                    padding: 12px 16px 12px 42px;
                    border: none;
                    border-radius: 3px;
                    box-shadow: 0 -1px 0 rgb(0 0 0 / 4%), 0 1px 1px rgb(0 0 0 / 25%);
                    color: white;
                    font-size: 14px;
                    font-weight: 500;
                    font-family: Montserrat;
                    background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
                    background-color: black;
                    background-repeat: no-repeat;
                    background-position: 12px 11px;
                    text-decoration: none;
                }

                .login-with-google-btn:hover {
                    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25);
                    text-decoration: none;
                }

                .login-with-google-btn:active {
                    background-color: #000000;
                }

                .login-with-google-btn:focus {
                    outline: none;
                    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25), 0 0 0 3px #c8dafc;
                }

                .login-with-google-btn:disabled {
                    filter: grayscale(100%);
                    background-color: #ebebeb;
                    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 1px 1px rgba(0, 0, 0, 0.25);
                    cursor: not-allowed;
                }
            </style>
            </style>


        </header>




        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                <li class="active">Sign-in</li>
                <li class="active">Choose a Google Account</li>
            </ul>
        </div>



        <div class="contact" style="text-align: center;">
            <div class="container">



                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <a type="button" class="login-with-google-btn" href="<?php echo $client->createAuthUrl(); ?>">
                    Choose a Google Account to Sign-in
                </a>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>






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


    </body>

<?php endif; ?>