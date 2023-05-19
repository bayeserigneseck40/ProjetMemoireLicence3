<?php
include "menuph.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
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
            /* background-color: #18d26e; */
            background-image: linear-gradient(-90deg, #18d26e, #54c283); 
        }
        #container{
            border:0px solid black;
            margin-left:15%;
        }
        p{
          
            font-family:'Times New Roman', Times, serif;
            font-size:20px;
        }
        h6{
            
            font-family:'Times New Roman', Times, serif;
        }
        h3{
            
            font-family:'Times New Roman', Times, serif;
        }
    </style>
</head>


<?php


include "connect_BD.php";
    if(isset($_GET['code'])){
        $code=$_GET['code'];
        $sql="select * from personnes join orders on personnes.email=orders.email  where id_personne=$code";
        $res=$connect->query($sql);
        if($res){
            $ligne=$res->fetch();
          
    




?>
<body class="bg-lignt">
    <div class="container" >
        <div class="row d-flex justify-content-canter" >
            <div class="col-md-10 mt-5 pt-5">
                <div class="row 2-depth-3" id="container">
                    <div class="col-sm-4 bg-info rounded-left"  >
                        <div class="cart-block text-center text-white"  >
                            <i class="fas fa-user-tie fa-7x mt-5" style="color:green"></i>
                            <h2 class="font-weight-bold mt-4"><?php echo $ligne['nom'] ;?></h2>
                            <p><?php $ligne['prenom']; ?></p>
                            <i class="far fa-edit fa-2x mb-4"></i>

                        </div>

                    </div>
                    <div class="col-sm-8 bg-white rounded-right" >
                        <h3 class="mt-3 text-center">Information Client</h3>
                        <hr class="badge-primarty mt-0 w-25">
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Email:</p>
                            <h6 class="text-muted"><?php echo $ligne['email'] ;?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Phone:</p>
                            <h6 class="text-muted"><?php echo $ligne['phone'] ;?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Nom:</p>
                            <h6 class="text-muted"><?php echo $ligne['nom'] ;?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Prenom:</p>
                            <h6 class="text-muted"><?php echo $ligne['prenom'] ;?></h6>
                        </div>
                    </div>
                    <!-- <h4 class="mt-3">Projects</h4>
                    <hr class="bg-primary"> -->
                    <!-- <div class="row">
                    <div class="col-sm-6">
                            <p class="font-weight-bold">Recent</p>
                            <h6 class="text-muted">School web</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Most Viwed</p>
                            <h6 class="text-muted">Dinoter Husa</h6>
                        </div>

                    </div> -->
                    <hr class="bg-primary">
                    <ul class="list-unstyled d-flex justify-content-center mt-4">
                        <li><a href="#"><i class="fab fa-facebook px-4 h4 text-info"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube px-4 h4 text-info"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter px-4 h4 text-info"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div> 
    <?php

}
}
?>
</body>
<?php
include "footer.php";
?>
</html>