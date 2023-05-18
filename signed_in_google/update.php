<?php
require_once 'session.php';
require_once 'dbconfig.php';
if (isset($_POST['update'])) {

    $userid = intval($_GET['id']);
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $emailid = $_POST['emailid'];
    $username = $_POST['username'];

    $sql = "UPDATE tblusers SET FirstName=:fn,LastName=:ln,EmailId=:eml,username=:usr WHERE id=:uid";

    $query = $dbh->prepare($sql);

    $query->bindParam('fn', $fname, PDO::PARAM_STR);
    $query->bindParam('ln', $lname, PDO::PARAM_STR);
    $query->bindParam('eml', $emailid, PDO::PARAM_STR);
    $query->bindParam('usr', $username, PDO::PARAM_STR);
    $query->bindParam('uid', $userid, PDO::PARAM_STR);

    $query->execute();
    $_SESSION['status'] = "";
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home - SearchSerpent</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/style.css">




    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
</head>

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">


        <header>



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

        <nav class="navbar-default navbar-static-top" id="navbar-default" style="border-radius:0;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle toggle-menu menu-left push-body" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="admin_panel.php"></a>
                    <?php
                    require_once('session.php');
                    ?>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">


                    </ul>
                </div>
            </div>
        </nav>
        <br>

        <!-- Main content -->
        <section style="text-align: center;" class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">

                    <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                        <div style="width: 500px; margin: auto;" class="alert alert-success" role="alert">
                            <center>
                                <p> Data has been updated successfully.</p>
                            </center>
                        </div>

                    <?php

                        unset($_SESSION['status']);
                    }

                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="font-family: montserrat;"><b>Update Information</b></h3>
                            <hr>
                        </div>
                    </div>
                    <?php
                    $userid = intval($_GET['id']);
                    $sql = "SELECT * FROM tblusers WHERE id=:uid";
                    $query = $dbh->prepare($sql);

                    $query->bindParam('uid', $userid, PDO::PARAM_STR);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_OBJ);

                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($result as $results); {
                    ?>
                            <form name="contactForm" onsubmit="return validateForm()" method="POST">

                                <b style="font-family: montserrat; text-transform:capitalize;margin-left: -310px; ">First Name</b>
                                <input style="font-family: montserrat; width: 400px;  text-transform:capitalize; margin: auto; margin-top:5px;" type="text" onkeydown="return /[a-z, ]/i.test(event.key)" name="firstname" maxlength="40" value="<?php echo htmlentities($results->FirstName); ?>" class="form-control" required>
                                <div class="error1" id="firstnameErr"></div>

                                <b style="font-family: montserrat;margin-left: -310px; ">Last Name</b>
                                <input style="font-family: montserrat; margin: auto; width: 400px;  text-transform:capitalize; margin-top:5px;" maxlength="40" type="text" onkeydown="return /[a-z, ]/i.test(event.key)" name="lastname" value="<?php echo htmlentities($results->LastName); ?>" class="form-control" required>
                                <div class="error1" id="lastnameErr"></div>

                                <b style="font-family: montserrat; margin-left: -280px;">Email Address</b>
                                <input style="font-family: montserrat; margin: auto; margin-top:5px; width: 400px;" type="email" name="emailid" value="<?php echo htmlentities($results->EmailId); ?>" class="form-control" required>
                                <div class="error1" id="emailErr"></div>

                                <b style="font-family: montserrat;margin-left: -310px;">Username</b>
                                <input style="font-family: montserrat;  margin: auto; width: 400px; margin-top:5px;" type="text" name="username" value="<?php echo htmlentities($results->username); ?>" class="form-control" required>
                                <div class="error1" id="usernameErr"></div>


                        <?php
                        }
                    }
                        ?>
                        <br>
                        <br>
                        <div class="row" style="margin-top:0">
                            <div class="col-md-12">
                                <a href="admin_panel.php" style="color: white; text-decoration: none; background-color: #007bff; border: none; padding: 7px; border-radius: 5px; font-family: montserrat;">Back</a>
                                <input type="submit" name="update" style="background-color: #379237 ; border-style: none;font-family: montserrat; padding: 6px; border-radius: 5px; color: white;" value="Update">

                            </div>
                        </div>
                            </form>
                </div>

</body>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<script type="text/javascript">
    function restrictAlphabets(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57))
            return true;
        else
            return false;
    }
</script>


<div style="padding-bottom: 10px; margin-top: 140px; margin-bottom: -180px;" class="copyright-part">
    <p>&copy 2023 <span>SearchSerpent</span> All Rights Reserved</p>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

</body>

</html>