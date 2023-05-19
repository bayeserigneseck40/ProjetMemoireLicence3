<?php
 session_start();
// creationDuPanier();
//require_once('login.php');
if(!$_SESSION['user_cli']){
  header("location:accueil_princip.php");
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <style>
       nav{
           /* width:60%; */
           border:1px solid blue;
           margin-left:0%;
       }
    #contenu{
      /* background-image:url('pharma.JPG');  */
              background-color:white;
    }
       a:hover{
         background-color:#18d26e;
         font-style:italic;
         font-weight:bold;
        font-size:larger;
        text-decoration:none;
       }
       li a{
         font-style:italic;
       }
       #dal{
         margin-top:-5%;
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
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    <!-- <script src="CalculDistanceAjax.js">
    </script> -->
      
</head>

 <body  style="background-color: #18d26e; color: gray;"> 
 
<!-- <body  style="background-image: url('imph.PNG'); color: gray;"> -->
<div id="contenu">
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
          <li><select name="medicament" id='val' onchange="change()">
          <option value=""><p>Pharmacies</p><option>
          <?php
          	$user_id=$_SESSION['user_cli'];
       include 'connect_BD.php';
       $req="SELECT distinct name,pharmacies.num_pharmacie from pharmacies natural join pharmacies_proche where id_personne=	$user_id order by distance limit 4 ";
       $result=$connect->query($req);
       if($result){
           while($row=$result->fetch()){
                   $nom=$row['name'];
                   $numero=$row['num_pharmacie'];
                   echo  "<option value='$numero'><p>$nom</p><option>"; 
                 
               }
            }
        ?>
        </select></li>
            <li><a class="nav-link scrollto active" href="Accueil_cli.php">accueil</a></li>
            <!-- <li><a class="nav-link scrollto" href="medcin.php">medicaments</a></li> -->
            <li id="submit" ><a id="click" class="nav-link scrollto" href="searchgardeph.php">Pharmacies de Gardes</a></li>
            <li><a class="nav-link scrollto" href="historiques.php">Historiques</a></li>
            <li><a class="nav-link scrollto" href="indexMap.php">Map</a></li>
            <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
          
           </ul>
            <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a> -->
              <ul> 
                <!-- <li><a href="#">Drop Down 1</a></li> -->
                <li class="dropdown"><a href="#"><span>Categorie</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="mediFatigue.php">Fatigue</a></li>
                    <li><a href="mediRhume.php">Rhume et Etat grippal</a></li>
                    <li><a href="mediDouleur.php">Douleur et Fievre</a></li>
                    <li><a href="mediTrouble.php">Trouble digestif</a></li>
                    <li><a href="mediAntipara.php">Antiparasitaires</a></li>
                  </ul>
                </li>
                <!-- <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li> -->
              </ul>
            </li>
            
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->
  
  <?php include 'products.php'; ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Bienvenu dans votre Pharmacie en Ligne</h1>
      <h2></h2>
      
    </div>
      <!-- <script src="CalculDistanceAjax.js">
        </script> -->
        <script src="ControleSelectph.js"></script>

        <!-- jQuery Library -->


  </section><!-- End Hero --
  </div>
  <?php include 'footer.php'; ?>
 
    