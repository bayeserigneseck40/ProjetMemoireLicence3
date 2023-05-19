<?php
//require_once('login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <style>
       nav{
            width:100%; 
           border:1px solid blue;
           /* margin-left:-20%; */
           margin-right:0%;
       }
       a:hover{
         background-color:#18d26e;
         font-style:italic;
         font-weight:bold;
       }
       #search{
           margin-left:3%;
           margin-top:30%;
       }
    #btn{
        margin-left:105%;
        margin-top:10%;
    }
       
   </style>
  <title>Pharmacie en Ligne</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
   <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
   <link href="stylephoto.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v4.3.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<!-- 
 <body  style="background-color: #18d26e; color: gray;">  -->
<!-- <body  style="background-image: url('imph.PNG'); color: gray;"> -->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><span>Pharmacie en Ligne</span></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav id="navbar" class="navbar">
          <ul>
            <li>
            <li><a class="nav-link scrollto active" href="Accueil_cli.php">accueil</a></li>
            <!-- <li><a class="nav-link scrollto" href="medcin.php">medicaments</a></li> -->
          
            <li><a class="nav-link scrollto" href="indexMap.php">Inscription</a></li>
            <li><a class="nav-link scrollto" href="contact.php">Connexion</a></li>
            <form action="" method="post">
              <input type="search" name="email"><input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Rechercher ">
            </form>
          
           </ul>
                </li>
         

      </div>
    </div>
  </header>
 