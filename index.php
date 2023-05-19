<?php
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
       nav{
           width:80%;
           border:0px solid blue;
           margin-left:10%;
       }
       #hero{
          /* height:900px; */
       }
       #autoc{
          width:20%;
         margin-left:67%;

       }
       h2
       {
        font-family:'Times New Roman', Times, serif;
        text-align:center;
       }
       h1{
        font-family:'Times New Roman', Times, serif;
        text-align:center;
      
       }
       li{
        list-style:none;
        font-family:'Times New Roman', Times, serif;
       }
       a{
        font-family:'Times New Roman', Times, serif;
       }
        
       
      
   </style>

  <!-- =======================================================
  * Template Name: Bethany - v4.3.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="index.html"><span>Pharmacie en Ligne</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="Accueil_princip.php">Acceuil</a></li>
            <li><a class="nav-link scrollto" href="login2.php">Connexion</a></li>
            <li><a class="nav-link scrollto" href="inscript.php">Inscription</a></li>
           <li><form method="post" action="">
        <input style="margin-left:70px;" type="text" placeholder="Entrer votre recherche..." id="sea" name="search"  />
        <button id="rechercher" style="background-color:#006400; color:white;">Rechercher</button>
      </form></li> 
          </ul> 
          <i class="bi bi-list mobile-nav-toggle"></i>
                 
       
        </nav>   
      
      </div>
      <div class="shadow-lg p-3 mb-5 bg-white rounded" id="autoc">
        <p>ce medicament est disponible à:</p>
      </div>
    </div>
  
  </header>
  
  <section style="background-image: url(astou2.jpg);" id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1 style="color:#006400;">Dalal Ak Diamm Ci Sen Pharmacie</h1>
      <h2 style="color:#006400;">Vous pouvez rechercher la dispnibilté d'un médicament ou les pharmacies de gardes de votre Ville</h2>
      
    </div>

         

  </section><!-- End Hero -->
  </div>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Bienvenu dans votre Pharmacie en Ligne</h1>
      <h2></h2>
      
    </div>
  </section>
  <script>
    
  var autoc=document.getElementById('autoc');
     var sear=document.getElementById('sea');
         autoc.style.visibility='hidden';
         sear.addEventListener("keyup",function(e){
     // autoc.innerHtML=nom.value;
       //autoc.style.visibility='visible';
       var nt=sear.value;
       var xhr=new XMLHttpRequest();
       var url="traitementprincip.php";
       xhr.open('POST',url);
       xhr.setRequestHeader("Content-Type",

       "application/x-www-form-urlencoded");
        xhr.send("nom="+nt);
        xhr.onreadystatechange=function(){
          if(xhr.readyState==4 && xhr.status==200);{
          autoc.innerHTML=xhr.responseText;

          autoc.style.visibility='visible';
          }
        }
      },false);
      var autoc=document.getElementById('autoc');
     var rechercher=document.getElementById('rechercher');
         autoc.style.visibility='hidden';
         rechercher.addEventListener("mouseover",function(e){
     // autoc.innerHtML=nom.value;
       //autoc.style.visibility='visible';
       var nt=sear.value;
       var xhr=new XMLHttpRequest();
       var url="traitementprincipal.php";
       xhr.open('POST',url);
       xhr.setRequestHeader("Content-Type",

       "application/x-www-form-urlencoded");
        xhr.send("nom="+nt);
        xhr.onreadystatechange=function(){
          if(xhr.readyState==4 && xhr.status==200);{
          autoc.innerHTML=xhr.responseText;

          autoc.style.visibility='visible';
          }
        }
      },false);
        
        
  </script>
