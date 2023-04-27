<!-- Navbar -->


<!-- Right navbar links -->
<div style="color: black; text-align: right; margin-top: -50px;">
  <!-- Messages Dropdown Menu -->

  <a class="nav-link" data-toggle="dropdown" href="#">

    <p style="color: black; margin: auto; font-size: 16px;"><?php echo htmlentities($userresult->admin_name); ?> <i style="margin-bottom: 10px;" class="far fa-user"></i></p>
  </a>
  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <a href="logout.php" class="dropdown-item">
      <!-- Message Start -->
      <div class="media">
        <div class="media-body">
          <h4 style="font-family: montserrat;" class="dropdown-item-title">
            Sign-out
            <span class="float-right text-sm text-danger"><i class="fas fa-home"></i></span>
            </h3>
        </div>
      </div>
      <!-- Message End -->
    </a>
  </div>

</div>

<!-- /.navbar -->