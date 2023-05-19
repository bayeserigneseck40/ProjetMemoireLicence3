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
    <style>
        body{
            background-color: #18d26e;
            margin-top:4%;
        }
    #blok{
        display:inline-block;
        width:40%;
        margin-left:6%;
      
    }
    #taille{
        width:200%;
    }
   li{
       list-style:none;
       font-family:'Times New Roman', Times, serif
   }
   h3{
       font-weight:bold;
        font-style:italic;
        font-family:'Times New Roman', Times, serif
        
   }
   p{
       font-style:italic;
       font-size:20px;
       font-family:'Times New Roman', Times, serif
   }
   h6{
       font-style:italic;
       font-size:15px;
       font-family:'Times New Roman', Times, serif
   }
    </style>
</head>
<body>
    <?php
    include "connect_BD.php";
    if(isset($_GET['code'])){
        $code=$_GET['code'];
        $dhc=date('Y-m-d');
    $sql="select * from pharmacies where ville='$code'";
    $res=$connect->query($sql);
    while($ligne=$res->fetch()){
        $id_ph=$ligne['num_pharmacie'];
      
        $req="SELECT  nom,Docteur,date_debut,date_fin,telephone,adresse,pharmacies.num_pharmacie from panneau_tour natural join pharmacies where num_pharmacie=$id_ph AND date_fin>'$dhc' LIMIT 1";
        $result=$connect->query($req);
        if($result){
            ?>
            
                <?php
            while($row=$result->fetch()){
                ?>
                <div id="blok">
               <?php
                 ?>

                 
<body class="bg-lignt">
    <div class="container">
        <div class="row d-flex justify-content-canter" >
            <div class="col-md-12 mt-6 pt-5" >
                <div class="row 2-depth-3" id="taille"  >
               
                    <div class="col-sm-6 bg-white rounded-right"  > 
                        <h3 class="mt-3 text-center"  style="color: SeaGreen;">Pharmacie <?php echo $row['nom']; ?></h3>
                        <hr class="badge-primarty mt-0 w-25">
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Pharmacien:</p>
                            <h6 class="text-muted"><?php echo $row['Docteur'] ;?></h6>
                        </div>
                        <div class="col-sm-6">
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
                            <li><a href="gardemap.php?code=<?php echo $row['num_pharmacie']; ?>"><h6 class="text-muted"><?php echo $row['adresse']; ?></h6></a></li>   
                        </div>
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
    }




?>


</body>
</html>  