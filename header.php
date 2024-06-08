<?php
  ob_start();
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Delivery</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 15px 0;
  }

  table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
  }

  table th:first-child, table td:first-child {
    width: 50px;
  }

  th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #ddd;
  }
  .card-deck {
    display: flex;
    justify-content: space-between;
  }
  .card {
      flex: 1 0 20%; /* Grow, shrink, basis */
      margin: 1em;
  }
  .card .card-body h5 {
    color: white;
  }
  .container {
    padding-top: 50px;
  }
  #chart-container {
    width: 400px;
    height: 400px;
    margin: auto;
  }
  canvas {
    width: 100% !important;
    height: 100% !important;
  }
  </style>
</head>

<body>

  <header id="header" class="header-custom header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      
      <i class="i-custom bi bi-list toggle-sidebar-btn"></i>
      <a href="index.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Delivery</span>
      </a>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets\img\user_avatar.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Profile</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <?php
                $un = $_SESSION['username'];
                echo "<h6>$un</h6>";
                $au = $_SESSION['auth'];
                if($au == 2){
                  echo "<span>Admin</span>";
                } else{
                  echo "<span>User</span>";
                }
              ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>
  </header>