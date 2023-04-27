<?php
session_start();
session_destroy();
header("location: admin_sign_in.php");
