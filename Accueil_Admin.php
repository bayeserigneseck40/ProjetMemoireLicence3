<?php
session_start();
if(!$_SESSION['user_id']){
  header("location:login.php");
}
//require_once('login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pharmacie en Ligne</title>
  
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />


  <link href="stylephoto.css" rel="stylesheet">
  <style>
    nav{
      border:0px solid blue;
      margin-right:15%;
    }
    body{
      background-image:url("closeup1.jpg");
    }
    #cont{
          margin-top:10%;
    }
    h1{
      font-style:italic;
      font-family:'Times New Roman', Times, serif;
      text-align:center
    }
    h1 span{
      font-family:'Times New Roman', Times, serif;
    }
    li a{
      font-family:'Times New Roman', Times, serif;
    }
  </style>

 
</head>

<body>

 
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="#"><span>Pharmacie en Ligne</span></a></h1>
        
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="Accueil_Admin.php">accueil</a></li>
            <li><a class="nav-link scrollto" href="costmers.php">Clients</a></li>
           
           
            <li><a class="nav-link scrollto" href="Etatdemande.php">Gerants</a></li>
          
            <li><a class="nav-link scrollto" href="contacts.php">Contact</a></li>
          
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

      </div>
      <div class="container" id="cont">
            
            <div class="jumbotron">
                <h1 style="color: SeaGreen;">Dalal Ak Diame Ci Sen Pharmacie!</h1>
                <h1 style="color: SeaGreen;">Administrer votre site</h1>
                <!-- <p>We have the best medicaments for you. No need to hunt around, we have all in one place.</p> -->
                
            </div>
             
        </div>
      
    </div>
 
  </header>



  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Bienvenu dans votre Pharmacie en Ligne</h1>
      <h2></h2>
      
    </div>
  </section>