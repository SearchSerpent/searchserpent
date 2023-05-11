<?php

@include 'dbconfig.php';

$conn = mysqli_connect('sql202.epizy.com', 'epiz_33766646', 'VdVPgo6knnpO', 'epiz_33766646_pdocrud');

session_start();

$_SESSION['myVariable'];

$sessionemail = $_SESSION['myVariable'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tblusers WHERE EmailId = '$sessionemail'"));

?>


<!DOCTYPE html>
<html>

<head>

    <title>Profile - SearchSerpent</title>

    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="css/profile_style.css">
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

        <style>
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


    </header>


    <div class="container">
        <ul class="breadcrumb">
            <li><a href="home.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Profile</li>
        </ul>
    </div>

    <center>
        <p style="font-size: 25px; font-family: montserrat;"><b>Profile Information</b></p>
    </center>
    <div style="border-style: solid; border-color: gray; width: 500px; margin:auto">

        <br>
        <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
            <div class="upload">
                <?php
                $id = $user["id"];
                $name = $user["name"];
                $image = $user["Photo"];
                ?>
                <img src="../searchserpent-admin/upload/<?php echo $image; ?>" width=125 height=125
                    title="<?php echo $image; ?>">
                <div class="round">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                    <i class="fa fa-camera" style="color: #fff; background-color: black;"></i>
                </div>
            </div>
        </form>



        <div style="font-family: montserrat; font-size: 16px; text-align: center;">
            <div style=" text-align: center;">
                <br>
                <b>
                    <p style="font-family: montserrat; font-size: 20px; text-transform:capitalize ">
                        <?php echo $_SESSION['myFirstname']; ?>
                        <?php echo $_SESSION['myLastname']; ?>
                    </p>
                </b>

                <p style="font-family: montserrat; font-size: 15px; text-transform:capitalize "><b>Username:</b>
                    <?php echo $_SESSION['myUsername']; ?>
                </p>

                <p style="font-family: montserrat; font-size: 15px;"><b>Email:</b>
                    <?php echo $_SESSION['myVariable']; ?>
                </p>



            </div>
        </div>

        <div style="text-align: center;"> <!-- sign-out button -->
            <br>

            <a href='sign_out.php'> <button style="  background-color:#000;
                    border: none;
                    border-radius: 5px;
                    color: #F5F5F5;
                    padding: 5px 10px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 6px 2px;
                    cursor: pointer;
                    font-family: Montserrat;"> Sign-out
                </button></a>
        </div>

        <br>
    </div>


    <br>
    <br>
    <br>
    <br>

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



    <script type="text/javascript">
        document.getElementById("image").onchange = function () {
            document.getElementById("form").submit();
        };
    </script>
    <?php
    if (isset($_FILES["image"]["name"])) {
        $id = $_POST["id"];
        $name = $_POST["name"];

        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        // Image validation
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo
                "
        <script>
          alert('Invalid image extension');
          document.location.href = 'profile.php';
        </script>
        ";
        } elseif ($imageSize > 1200000) {
            echo
                "
        <script>
          alert('Image size is too large');
          document.location.href = 'profile.php';
        </script>
        ";
        } else {
            $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;
            $query = "UPDATE tblusers SET Photo = '$newImageName' WHERE id = $id";
            mysqli_query($conn, $query);
            move_uploaded_file($tmpName, '../searchserpent-admin/upload/' . $newImageName);
            echo
                "
        <script>
        document.location.href = 'profile.php';
        </script>
        ";
        }
    }
    ?>


</body>

</html>