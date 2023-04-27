<?php
require_once("session.php");
require_once("dbconfig.php");

if (isset($_POST['insert'])) {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $emailid = $_POST['emailid'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];

    $sql = "INSERT INTO tblusers(FirstName, LastName,EmailId,ContactNumber,Address) VALUES(:fn,:ln,:eml,:cno,:adrss)";
    $query = $dbh->prepare($sql);

    $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    $query->bindParam(':ln', $lname, PDO::PARAM_STR);
    $query->bindParam(':eml', $emailid, PDO::PARAM_STR);
    $query->bindParam(':cno', $contactno, PDO::PARAM_STR);
    $query->bindParam(':adrss', $address, PDO::PARAM_STR);

    $query->execute();

    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    } else {
        echo "<script>alert('Something wrong with the insertion of the records');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    }
}
?>


<html>

<head>
    <title>
        PHP CRUD Operation using PDO Extension
    </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Regtistration</h3>
            </div>
        </div>
        <hr />
        <form name="insertrecord" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <b>First Name</b>
                    <input type="text" name="firstname" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <b>Last Name</b>
                    <input type="text" name="lastname" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <b>Email Address</b>
                    <input type="text" name="emailid" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <b>Contact Number</b>
                    <input type="text" name="contactno" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <b>Address</b>
                    <textarea type="text" name="address" class="form-control" required></textarea>
                </div>
            </div>

            <div class="row" style="margin-top:1%">
                <div class="col-md-12">
                    <input type="submit" name="insert" class="btn btn-success" value="submit">
                    <a href="dashboard.php" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>