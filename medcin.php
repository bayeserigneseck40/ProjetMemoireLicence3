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
        .rup{
            background-color:red;
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
    	<center><h2>Stock Medicaments</h2></center>
        <div class="row">
            <div class="col-10 offset-1">
                <form action="" method="POST" onsubmit="app.Add()">
                <div class="container">
                    <input type="search" id="add-name" name="search" class="form-control" placeholder="Rechercher un medicament ou une categorie">
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

                <table class="table" style="color: #fff;">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Posologie</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">prix</th>
                            <th scope="col">photo</th>
                            <th scope="col">Ajouter</th>
                        </tr>
                    </thead>
                    <tbody id="kota">
                        <?php
                    // include 'connect_BD.php';
$req="SELECT* FROM  (medicaments join categorie on id_categorie=num_categorie) natural join stock order by nom_categorie";
$resul=$connect->query($req);
if($resul){
    while($row=$resul->fetch()){
        $numero=$row['id_medicament'];
      $nom=$row['nom'];
        $description=$row['description'];
        $posologie=$row['posologie'];
        $categorie=$row['nom_categorie'];
        $prix=$row['prix'];
        $Etat=$row['etat'];

        $reqim="SELECT url from image where id_medicament=$numero";
       $resIn=$connect->query($reqim);
       if($resIn){
        $l=$resIn->fetch();
        $im=$l[0];
         //$ID=$l['id'];
  }
  if($Etat=='rupture'){

 
    


        echo"<tr class='rup' class='table-primary'>";
      
       echo"<td>$nom</td>";
       echo" <td>$description</td>";
       echo"<td>$posologie</td>";
       echo"<td>$categorie</td>";
       echo" <td>$prix</td>";
       echo"<td><a href='detailsmedoc.php?code=$numero'><img src='$im'/></td>";
    //    echo"<td><form method='post' action=''>";
    //    echo "<input type='hidden' name='ajout' value='$numero' />";
    //    echo "<input type='submit' name='ajouter' id='btn1' value='accepter'/>";
    //   echo "</form></td>";
       echo"<div class='container'>";
    //    echo"<td><a href='#?code=$numero'>
    //    <span class='glyphicon glyphicon-remove'></span>
    //     </a></td>";
       echo'<td><input class="btn btn-primary" type="submit" value="Ajouter au panier"></td>';
       echo" </div>";
      echo"</tr>";

    }
    else{
        echo"<tr class='table-primary'>";
      
        echo"<td>$nom</td>";
        echo" <td>$description</td>";
        echo"<td>$posologie</td>";
        echo"<td>$categorie</td>";
        echo" <td>$prix</td>";
        echo"<td><a href='detailsmedoc.php?code=$numero'><img src='$im'/></td>";
     //    echo"<td><form method='post' action=''>";
     //    echo "<input type='hidden' name='ajout' value='$numero' />";
     //    echo "<input type='submit' name='ajouter' id='btn1' value='accepter'/>";
     //   echo "</form></td>";
        echo"<div class='container'>";
     //    echo"<td><a href='#?code=$numero'>
     //    <span class='glyphicon glyphicon-remove'></span>
     //     </a></td>";
        echo'<td><input class="btn btn-primary" type="submit" value="Ajouter au panier"></td>';
        echo" </div>";
       echo"</tr>";

    }
}
}
?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
</div>
</body>
<script src="./js/script.js"></script>

<!-- CDN Bootstrap Js V5.0 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>