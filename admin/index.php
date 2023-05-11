<?php
session_start();
$conn = mysqli_connect('sql202.epizy.com', 'epiz_33766646', 'VdVPgo6knnpO', 'epiz_33766646_pdocrud') or die('connection failed');

try {
  require_once 'dbconfig.php';
  if (isset($_POST['login'])) {

    if (empty($_POST['username']) || empty($_POST['password'])) {

      $message = "All fields are required";
    } else {

      $sql = "SELECT * FROM tbladmin WHERE username =:username AND password=:password";
      $userrow = $dbh->prepare($sql);
      $userrow->execute(
        array(
          'username' => $_POST['username'],
          'password' => $_POST['password']
        )
      );
      $count = $userrow->rowCount();
      if ($count > 0) {
        foreach ($userrow as $result)
          ;
        $_SESSION['userid'] = $result['id'];
        header('location: admin_panel.php');
      } else {
        $message = "Wrong username or password.";
      }
    }
  }
} catch (\Throwable $error) {
  $message->$error->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - SearchSerpent</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />


  <style>
    body {
      /* xenomorph gone */
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div style="border: none;" class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="images/logo.png" height="30px" width="120px">
        <h2>Sign In as Administrator</h2>
      </div>
      <div class="card-body">
        <center>
          <font color="red">
            <?php
            if (isset($message)) {
              echo $message;
            }
            ?>
          </font>
        </center>
        <br>
        <form method="POST">
          <div>
            <input style="width: 320px;" type="text" required name="username" placeholder="Username">
            <br>
            <p></p>
          </div>
          <div>
            <div><input style="width: 320px;" type="password" required name="password" id="id_password"
                placeholder="Password"><i style="margin-left: -30px;" class="far fa-eye" id="togglePassword"></i></div>
            <br>

          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-4">
              <button style="background-color: black; border: none;" type="submit" name="login"
                class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>



        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>

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
</body>

</html>