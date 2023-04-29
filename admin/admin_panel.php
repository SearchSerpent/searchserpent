<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home - SearchSerpent</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />


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
          require_once('navbar.php');
          ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav">


          </ul>
        </div>
      </div>
    </nav>


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <h3 class="card-title"><b>List of Accounts</b></h3>


          <div style="color: white;" class="card-tools">
            <a style="background-color: #007bff; border-style: none; color: white;" class="btn btn-tool" href="message.php">
              <font color: White>View Messages</font>
            </a>


          </div>
        </div>
        <div style="font-family: montserrat; font-size: 14px;" class="card-body">
          <table class="table" id="example1">
            <thead>

              <th style="font-family: montserrat; font-size: 14px;">ID No. </th>
              <th style="font-family: montserrat; font-size: 14px;">Photo</th>
              <th style="font-family: montserrat; font-size: 14px;">Name</th>
              <th style="font-family: montserrat; font-size: 14px;">Username</th>
              <th style="font-family: montserrat; font-size: 14px;">Email </th>
              <th style="font-family: montserrat; font-size: 14px;">Actions</th>
            </thead>
            <tbody>
              <?php
              $conn = mysqli_connect('sql202.epizy.com', 'epiz_33766646', 'VdVPgo6knnpO', 'epiz_33766646_pdocrud') or die('connection failed');
              $sql = "SELECT * FROM tblusers";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);

              if (isset($_GET['delete'])) {
                $delete_id = $_GET['delete'];
                mysqli_query($conn, "DELETE FROM `tblusers` WHERE id = '$delete_id'") or die('query failed');
              }

              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {
              ?>
                  <tr>

                    <td><?php echo htmlentities($result->id); ?></td>
                    <td><img src="<?php echo htmlentities(!empty($result->Photo)) ? 'upload/' . htmlentities($result->Photo) : 'upload/Default.jpg'; ?>" class="img-circle" width="50" height="50"></td>
                    <td style="text-transform: capitalize;"><?php echo htmlentities($result->FirstName . ' ' . $result->LastName); ?></td>
                    <td><?php echo htmlentities($result->username); ?></td>
                    <td><?php echo htmlentities($result->EmailId); ?></td>

                    <td>
                      <a style="color: white; background-color: #379237; border: none;" href="update.php?id=<?php echo htmlentities($result->id); ?>" class="btn btn-primary btn-sm"><span class="fas fa-edit"></span></a>
                      <a style="color: white; background-color: #DF2E38; border: none;" href="admin_panel.php?delete=<?php echo htmlentities($result->id);  ?>" onclick="return confirm('delete this user?');" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></a>
                    </td>
                  </tr>

              <?php
                  $cnt++;
                }
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <div style="padding-bottom: 10px; margin-top: 140px; margin-bottom: -140px;" class="copyright-part">
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

  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</body>

</html>