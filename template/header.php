<?php
include 'mimin/koneksi.php';
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <title>Colorlib Villa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700"
    rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <header class="site-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4 site-logo" data-aos="fade"><a href="index.php"><em>Villa</em></a></div>
        <div class="col-8">


          <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <!-- END menu-toggle -->

          <div class="site-navbar js-site-navbar">
            <nav role="navigation">
              <div class="container">
                <div class="row full-height align-items-center">
                  <div class="col-md-6">
                    <ul class="list-unstyled menu">
                      <li><a href="index.php">Home</a></li>
                      <?php
                        if(empty($_SESSION['id_member'])){
                          echo"<li><a href='login/'>login</a></li>";
                        }else{
                          echo"<li><a href='member.php'>Member</a></li>";
                        }
                      ?>
                      <li><a href="about.php">About</a></li>
                      <li><a href="blog.php">Blog</a></li>
                      <li><a href="contact.php">Contact</a></li>
                      <?php
                        if(empty($_SESSION['id_member'])){
                        }else{
                          echo"<li><a href='logout.php'>Logout</a></li>";
                        }
                      ?>
                    </ul>
                  </div>
                  <div class="col-md-6 extra-info">
                    <div class="row">
                      <div class="col-md-6 mb-5">
                        <h3>Contact Info</h3>
                        <p>98 West 21th Street, Suite 721 <br> New York NY 10016</p>
                        <p>info@yourdomain.com</p>
                        <p>(+1) 435 3533</p>

                      </div>
                      <div class="col-md-6">
                        <h3>Connect With Us</h3>
                        <ul class="list-unstyled">
                          <li><a href="#">Twitter</a></li>
                          <li><a href="#">Facebook</a></li>
                          <li><a href="#">Instagram</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- END head -->