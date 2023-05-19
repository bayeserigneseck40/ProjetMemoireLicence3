<?php

include "menucli.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    body{
        /* background-image:url("istockphoto.jpg");
        background-repeat:no-repeat; */
        background-image: linear-gradient(-90deg, #18d26e;, #54c283); 
    }
    li a{
        text-decoration:none;
        font-family:'Times New Roman', Times, serif
    }
    h1{
        text-align:center;
            font-style:italic;
            font-family:Georgia;
            opacity:1.5;
            text-shadow : 3px 2px 5px silver;
            font-family:'Times New Roman', Times, serif;
    }
    #shadow{
        margin-top:7%;
    }
    #taille{
        border:0px solid black;
        margin-left:28%;
    }
  li{
      list-style:none;
      font-family:'Times New Roman', Times, serif
  }

 
    
</style>
<body>
    
<?php
include 'connect_BD.php';
if(isset($_GET['ville'])){
    $ville_id=$_GET['ville'];
  
        ?>
        <div id="shadow" class="shadow-lg p-3 mb-5 bg-white rounded"> <h1 style="color: SeaGreen;">Selectionner votre ville</h1></div>  
        <?php
      
             $req="select * from arrondissements where departement_id=$ville_id";
             $result=$connect->query($req);
             if($result){
                 while($ligne=$result->fetch()){
                     
                     ?>
                     
                  
                              
<body class="bg-lignt">
    <div class="container" id="container">
        <div class="row d-flex justify-content-canter" >
            <div class="col-md-12 mt-6 pt-5" >
                <div class="row 2-depth-3" id="taille"  >
               
                    <div class="col-sm-6 bg-white rounded-right"  > 
                        <h3 class="mt-3 text-center"></h3>
                        <hr class="badge-primarty mt-0 w-25">
                        <div class="col-sm-6">
                            <p class="font-weight-bold"></p>
                            <h6 class="text-muted"><li id="li"><a href="detailsgarde.php?code=<?php echo $ligne['nom'] ;?>"><?php echo $ligne['nom']; ?></a></li></h6>
                        </div> 
                         <!-- <div class="col-sm-6">
                            <p class="font-weight-bold">Date Debut:</p>
                            <h6 class="text-muted"><?php echo $row['date_debut']; ?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Date Fin:</p>
                            <h6 class="text-muted"><?php echo $row['date_fin'];?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Telephone:</p>
                            <h6 class="text-muted"><?php echo $row['telephone']; ?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Adresse:</p>
                            <h6 class="text-muted"><?php echo $row['adresse']; ?></h6>
                        </div>  -->
                     </div>

                    <hr class="bg-primary">
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

</body>
                       
                   
        <?php
          
    ?>
    
