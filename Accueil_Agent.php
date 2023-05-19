<?php
session_start();
if(!$_SESSION['user_agent']){
  header("location:accueil_princip.php");
}
$connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
  </style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <style>
       nav{
           width:60%;
       }
       img{
         width:100%;
       }
       h1{
         text-align:center;
         font-style:italic;

       }
       h1 span{
        font-family:'Times New Roman', Times, serif;
       }
       
   </style>
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

<body>
  <?php
// include "diapo.php";

?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="#"><span>Pharmacie en Ligne</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav id="navbar" class="navbar">
          <ul>
          <li><a class="nav-link scrollto active" href="Accueil_Agent.php">accueil</a></li>
            <li><a class="nav-link scrollto" href="venteAgent.php">Ventes</a></li>
            <li><a class="nav-link scrollto" href="commandeAgent.php">Commande</a></li>
            <li><a class="nav-link scrollto" href="indexStatAgent.php">Statistiques</a></li>
            <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
          </ul>
          
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Bienvenu dans votre Pharmacie en Ligne</h1>
      <h2></h2>
      
    </div>
  </section>
 
  <?php
   include "formTourCont.php";
   $user_id=$_SESSION['user_agent'];
   $_SESSION['formC']=$user_id;
    $sql="SELECT * from agents join pharmacies on id_pharmacie=num_pharmacie WHERE id_agent=$user_id ";
    $result=$connect->query($sql);
    if($row=$result->fetch()){
   ?>
   <div class="shadow-lg p-3 mb-5 bg-white rounded"> <h1> <?php echo $row['nom']; ?> Pharmacie</h1></div>
     
    

      <?php
      

    }
    include "footer.php";
?>

