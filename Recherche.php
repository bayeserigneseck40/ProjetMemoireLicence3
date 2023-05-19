<?php include 'menucli.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css"> 
    <style>
        /* #contenu{
            width:50%;
            margin-left:43%;
            margin-top :-50%;
        }
        #gly{
            margin-left:100%;
            margin-top :-9%;
        } */
        img{
            width:15%;
        }
        #menu{
            margin-top:8%;
        }
        h1{
            font-style:italic;
            font-weight:bold;
        }
        
    </style>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- CDN Bootstrap CSS V5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> CRUD Javascript</title>
</head>


<body style="background-color: #18d26e; color: gray;">
<div id="menu">

<?php
include 'connect_BD.php';
if(isset($_POST['search'])){
    $nom=$_POST['search'];
    $sql="SELECT* from medicaments join categorie where id_categorie=num_categorie";
    $res=$connect->query($sql);
    if($res){
        while($row=$res->fetch()){
            if($nom==$row['nom']){
                echo $nom;
            }
            elseif($nom==$row['nom_categorie']){
                echo $nom;

            }
            // else{
            //     echo "pas de resultat pour recherche";
            // }

        }
        
    }
}

?>

  <div id="contenu">
    <div class="container">
    	<center><h1>
 Indiquez vos critères de recherche</h1></center>
        <div class="row">
            <div class="col-10 offset-1">
                <form action="" method="POST" onsubmit="app.Add()">
                <div class="container">
                    <input type="search" id="add-name" name="search" class="form-control" placeholder="Entrer une ville">
                    <input Type="submit" class="btn btn-info btn-lg" value="search"/>
                <!-- <a id= "gly" href="test.php" class="btn btn-info btn-lg">
                   <span  class="glyphicon glyphicon-search"></span>
                   </a>    -->
                </div>
                </form>
                <?php
               
                ?>

                <!-- <div id="spoiler" role="aria-hidden">
                    <h6>Edit Here</h6>
                    <form action="javascript:void(0);" method="POST" id="saveEdit">
                        <input type="text" id="edit-name" class="form-control">
                    </form>
                </div> -->

                <p id="counter"></p>

           


</div>
</div>
</body>


</html>