<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB FOR SPECIAL NEED</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./Admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./Admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./Admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./Admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./Admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./Admin/plugins/summernote/summernote-bs4.min.css">
  <!-- bootsrap CSS -->
  <link rel="stylesheet" href="./Admin/Bootsrap/bootstrap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./Admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./Admin/dist/css/adminlte.min.css" >
  <!-- my css -->
  <title>AdminLTE 3 | Registration Page</title>
  <link rel="stylesheet" href="./modified-css/main.css">

</head>
<body>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" href="./contact.php"><Caption>Contact</Caption></a>
        </li> 
        <li class="nav-item">
          <?php if($_SERVER['REQUEST_URI'] == '/Daudi/index.php'|| $_SERVER['REQUEST_URI'] == '/Daudi/*'){ echo $_SERVER['REQUEST_URI'];?>
              <a class="nav-link" href="#" id="admin"><Caption>Admin</Caption></a>
          <?php } ?>
        </li>
      </ul>
      
    </div>
  </div>
</nav>



  <!-- <div class="container">
    <nav class=" navbar navbar-expand navbar-white navbar-light">
       Left navbar links 
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./index.php" class="nav-link">Home</a>
        </li>
      </ul>
       Right navbar links 
      <ul class="navbar-nav ml-auto">
         Navbar Search 
          <li class="nav-item">
              <a href="./contact.php" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
              <a href="./Admin/pages/examples/login.php" class="nav-link">Admin</a>
          </li>
      </ul>
    </nav> -->

  
