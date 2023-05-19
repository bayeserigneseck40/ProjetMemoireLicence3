<?php include 'menucli.php'; ?>
<!-- <?php
// include "includes/common.php";

// if (!isset($_SESSION['email'])) {
//     header('location: index.php');
// }
?> -->
<!DOCTYPE html>

<html>
    <head>
               
        <meta charset="UTF-8">
        <title>Lifestyle Store | Products</title>
         <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!-- <link rel="stylesheet" href="css/style.css"/> -->
          <style>
              .inline{
                  border:0px solid blue;
                  width:22%;
                  display:inline-block;
                  height:30%;
                  background-color:red;

                 
              }
              .inlin{
                border:0px solid blue;
                  width:22%;
                  display:inline-block;
                  height:30%;
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
            height:15%;
            font-style:italic;
        }
        #contenu{
            background-image:url('istockphoto.JPG');
        }
        #rech{
            margin-left:75%;
           
        }
        /* img{
                  width: 150px;
              } */
        
      /* .sec2{
          border:0px solid blue;
          margin-top:-10%;

      } */
              </style>
    </head>
    <body>
        <div id="contenu">
        <!-- <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        ?> -->
        
        <br><br><br><br><br>
        <div class="container">
            
            <div class="jumbotron">
                <h1>Dalal Ak Diame Sen Pharmacie!</h1>
                <!-- <p>We have the best medicaments for you. No need to hunt around, we have all in one place.</p> -->
                
            </div>
             
        </div>
        <nav class="navbar navbar-expand-sm bg-white navbar-white">
            <form id="rech"  class="form-inline" action="test.php">
            <input class="form-control mr-sm-2" name="cat" type="hidden" value="Douleur et Fievre">
              <input class="form-control mr-sm-2" name="search" type="text"  required placeholder="Rechercher">
              <button class="btn btn-success" type="submit">cliquez</button>
            </form>
        </nav>

            <section class="sec1">
                <center>
                <h4><a href="Douleur.php">Categorie de medicaments pour les Douleurs et la Fievre</a><h4>  
    </center>
                
                      <?php
        // include 'includes/header.php';
        include 'connect_BD.php';
        $sql="SELECT* FROM (medicaments join categorie on id_categorie=num_categorie) natural join stock where nom_categorie='Douleur et Fievre' order by nom";
        $result=$connect->query($sql);
        if($result){
            while($row=$result->fetch()){
                $numero=$row['id_medicament'];
                $nom=$row['nom'];
                $prix=$row['prix'];
                $etat=$row['etat'];

           $reqim="SELECT url from image where id_medicament=$numero";
           $resIn=$connect->query($reqim);
           if($resIn){
           $l=$resIn->fetch();
            $im=$l[0];
         //$ID=$l['id'];
           }
           if($etat=='rupture'){

          


            // 
        ?> 
                <div  class="inline">
                  <div  class="container"> 
                  <div  class="row text-center">
                   <div class="col-md-3 col-sm-6"> 
                        <div  class="thumbnail">  
                          <img src="<?php echo $im?>" alt="Responsive image">
                          <div  class="caption">
                              <h3><?php echo $nom ?></h3>
                              <p><?php echo $prix?></p>
                               <?php  echo "\t" ?>       
                
                             <button type="submit" class="btn btn-primary btn-block">Ajouter au panier</button>
                          </div>
                      </div>
                  </div>
             </div>
     </div>
</div>
       
                  <?php 
            }

            else{
                ?>
                <div  class="inlin">
                <div  class="container"> 
                <div class="row text-center">
                 <div class="col-md-3 col-sm-6"> 
                      <div  class="thumbnail">  
                        <img src="<?php echo $im?>" alt="Responsive image">
                        <div class="caption">
                            <h3><?php echo $nom ?></h3>
                            <p><?php echo $prix?></p>
                             <?php  echo "\t" ?>       
              
                           <button type="submit" class="btn btn-primary btn-block">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
           </div>
   </div>
</div>
<?php

            }
        }
    }
					
                                ?>
                                 </section>
    </div>
    </body>
<script src="./js/script.js"></script>

<!-- CDN Bootstrap Js V5.0 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>