<?php
//require_once('login.php');
session_start();
if(!$_SESSION['num_pharmacie']){
  header("Location:accueil_princip.php");
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
           border:0px solid blue;
           margin-right:10%;
       }
       img{
         width:100%;
       }
       h1{
         text-align:center;
         font-style:italic;
         font-family:'Times New Roman', Times, serif;

       }
       li{
        font-family:'Times New Roman', Times, serif;
       }
       li a:hover{
         font-size:15px;
         background-color:#18d26e;
         font-style:italic;
         font-weight:bold;
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

 
  <link href="stylephoto.css" rel="stylesheet">


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
            <li><a class="nav-link scrollto active" href="Accueil_ph.php">accueil</a></li>
            <li><a class="nav-link scrollto" href="Ajout_medicament.php">medicaments</a></li>
            <!-- <li><a class="nav-link scrollto" href="medcin.php">medicaments en peremption</a></li> -->
            <li><a class="nav-link scrollto" href="Agent.php">Agents</a></li>
            <li><a class="nav-link scrollto" href="vente.php">Ventes</a></li>
            <li><a class="nav-link scrollto" href="commande.php">commandes</a></li>
            <li><a class="nav-link scrollto" href="indexStat.php">Statistiques</a></li>
            <li><a class="nav-link scrollto" href="#">Contact</a></li>
            <!-- <li><a class="nav-link scrollto" href="Deconnexion.php">Deconnexon</a></li> -->
          
          </ul>
           
            
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

      </div>
    </div>
  </header>

  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Bienvenu dans votre Pharmacie en Ligne</h1>
      <h2></h2>
      
    </div>
  </section>
 
  <?php
   include "formTourCont.php";
   $user_id=$_SESSION['user_id'];
    if($user_id!=null){
   $_SESSION['formC']=$user_id;
}
    $sql="SELECT * from imageph natural join pharmacies WHERE num_gerant=$user_id ";
    $result=$connect->query($sql);
    if($row=$result->fetch()){
      $img=$row['url'];
   ?>
   <div class="shadow-lg p-3 mb-5 bg-white rounded"> <h1 style="color: SeaGreen";> <?php echo $row['nom']; ?> Pharmacie</h1></div>
     
      <!-- <img src="<?php echo $img ?>" /> -->

      <?php
      

    }
    include "footer.php";
?>

