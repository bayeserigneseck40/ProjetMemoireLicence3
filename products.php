<?php
// session_start();
// session_start();
// include "includes/common.php";

// if (!isset($_SESSION['email'])) {
//     header('location: index.php');
// }
?> 
<!DOCTYPE html>

<html>
    <head>
               
        <meta charset="UTF-8">
        <title>Lifestyle Store | Products</title>
         <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
         <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
          <!-- <link rel="stylesheet" href="css/style.css"/> -->
          <style>
              .inline{
                  border:0px solid blue;
                  width:20%;
                  display:inline-block;
                  height:28%;

                 
              }
              #rech{
                    width:60%;
           
              }
              /* img{
                  width:20% ;
              } */
        .thumbnail{
            border:0px solid green;
            height:90%;
        }
        h4{
            border:0px solid green;
            background-color:white;
            width:100%;
            height:20%;
            font-style:italic;
            color:SeaGreen;
            font-family:'Times New Roman', Times, serif
        }
        h1{
            /* background-color: #18d26e; */
            font-family:'Times New Roman', Times, serif
        }
        h4 a{
            color: SeaGreen;
            font-size:20px;
        }
      /* .sec2{
          border:0px solid blue;
          margin-top:-10%;

      } */
      #search{
          width:50%;
         
      }
              </style>
    </head>
    <body>
        <!-- <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        ?> -->
        
        <br><br><br><br><br>
        <div id="dal" class="container">
            
            <div class="jumbotron">
                <h1 style="color: SeaGreen;"> Dalal Ak Diame Ci Sen Pharmacie!</h1>
                <!-- <p>We have the best medicaments for you. No need to hunt around, we have all in one place.</p> -->
                
            </div>
             
        </div>
        <nav class="navbar navbar-expand-sm bg-white navbar-white">
            <form id="rech"  class="form-inline" method="post" action="trouvemedoc.php">
            <!-- <input class="form-control mr-sm-2" name="cat" type="hidden" value="Fatigue"> -->
              <input class="form-control mr-sm-2" name="search" type="search" id="search"  required placeholder="Rechercher un medicament">
              <button class="btn btn-success" type="submit">cliquez</button>
            </form>
        </nav>
        
            <section class="sec1">
                <center>
                <h4><a   href="mediFatigue.php">Catégorie de médicaments pour la Fatigue</a><h4>  
    </center>
                
                      <?php
        // include 'includes/header.php';
        include 'connect_BD.php';
        include 'FatigueAcc.php';

       



        ?> 
     
                <center>
                  <h4><a href="mediDouleur.php">Catégorie de médicaments pour les Douleurs et la Fievre</a><h4>  
    </center>
                
                      <?php
        // include 'includes/header.php';
        include 'connect_BD.php';
        include 'DouleurAcc.php';
       
       



        ?> 
             
                <center>
                <h4><a href="mediAntipara.php">Catégorie de médicaments Antiparasitaires</a><h4>   
    </center>
                
                      <?php
        // include 'includes/header.php';
        include 'connect_BD.php';
        include 'AntiparaAcc.php';
       



        ?> 
                <center>
                <h4><a href="mediRhume.php">Catégorie de médicaments pour la Rhume et l'Etat grippal</a><h4> 
    </center>
                
                      <?php
        // include 'includes/header.php';
        include 'connect_BD.php';
        include 'RhumeAcc.php';
       

        ?> 
                <center>
                <h4><a href="mediTrouble.php">Catégorie de médicaments pour les Troubles digestifs</a><h4> 
    </center>
                
                      <?php
        // include 'includes/header.php';
        include 'connect_BD.php';
        include 'TroubleAcc.php';
      



        ?> 
       <!-- <footer class="fo">
           <div class="container">
               <center>
                   <p>Copyright <small>&copy;</small> Lifestyle Store | All Rights Reserved</p>
               </center>
           </div>
           
           
       </footer> -->
        
        
    </body>
</html>
