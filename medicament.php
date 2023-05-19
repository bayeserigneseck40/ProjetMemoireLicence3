<?php include 'menuph.php';    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <style>
        #contenu{
            width:60%;
            margin-left:43%;
            margin-top :-42%;
          
         
        }
        #section{
            background-color:#18d26e;
        }
        #gly{
            margin-left:100%;
            margin-top :0%;
        }
        img{
            width:15%;
        }
        #cont{
            margin-top :10%;

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

<?php
include 'connect_BD.php';
// include 'fonctions_fichiers.php';
 if(isset($_POST['nom'])&&isset($_POST['des'])&&isset($_POST['pos'])&&isset($_POST['cat'])
 &&isset($_POST['prix']) &&isset($_POST['qte'])){
 $nom=$_POST['nom'];
 $description=$_POST['des'];
 $posologie=$_POST['pos'];
 $categorie=$_POST['cat'];
 $prix=$_POST['prix'];
 $quantite=$_POST['qte'];

echo $nom,$description,$posologie,$categorie,$prix;
  

  $sql="INSERT INTO medicaments(nom,description,posologie,id_categorie,prix)VALUES('$nom','$description','$posologie',$categorie,$prix)";
 $result=$connect->query($sql);
 if($result){
   echo"insertion reussi";
 }
 $code=$connect->lastInsertId();
 echo $code;


  $cptphotos=count($_FILES['photo']['name']);
  for($i=0;$i<$cptphotos;$i++){
  $extensions_ok = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

  $extension_fichier = strtolower( substr(strrchr($_FILES['photo']['name'][$i], '.'),1));
  if ( in_array($extension_fichier, $extensions_ok) )
       {
          echo "<p>Extension correcte du fichier</p>"; 
       }

     $dhc=date("dmy_his",time());
     $fic="mesphotos/".$dhc."_".$_FILES['photo']['name'][$i];
     $result=move_uploaded_file($_FILES['photo']['tmp_name'][$i],$fic);
     if($result){
     echo "<p>transfert du fichier reussi</p>";
     }

     $url="mesphotos/".$dhc."_".$_FILES['photo']['name'][$i];
    
     echo $url,$code;

    

     $req1="INSERT INTO image(url,id_medicament)VALUES('$url',$code)";
     $stmt=$connect->query($req1);
     if($stmt){
         echo"insertion image reussi";
     }
    //  $stmt->bindParam(':url',$url);
    //  $stmt->bindParam(':id_medicament',$code);
    //  $stmt->execute() ;         


}
$num_ph=2;
$req2="INSERT INTO stock(num_pharmacie,id_medicament,quantiteStock)VALUES($num_ph,$code,$quantite)";
$res=$connect->query($req2);
if($res){
    echo "insertion reussi";
}
 }



?>
<?php  include 'formul.php' ?>
<?php


?>
  <div id="contenu">
    <div class="container">
    	<center><h2>Stock Medicaments</h2></center>
        <div class="row">
            <div class="col-10 offset-1">
                <h6>Add New Medicaments</h6>
                <form action="test.php" method="POST" onsubmit="app.Add()">
                <div class="container">
                    <input type="search" id="add-name" name="search" class="form-control" placeholder="Rechercher un medicament">
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

                <!-- <table class="table" style="color: #fff;"> -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Posologie</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">prix</th>
                            <th scope="col">photo</th>
                            <th scope="col">supprimer</th>
                            <th scope="col">Signaler</th>
                        </tr>
                    </thead>
                    <tbody id="kota">
                        <?php
                    // include 'connect_BD.php';
$req="SELECT* FROM  medicaments LIMIT 10";
$resul=$connect->query($req);
if($resul){
    while($row=$resul->fetch()){
        $numero=$row['id_medicament'];
         $nom=$row['nom'];
        $description=$row['description'];
        $posologie=$row['posologie'];
        $categorie=$row['id_categorie'];
        $prix=$row['prix'];

        $reqim="SELECT url from image where id_medicament=$numero";
       $resIn=$connect->query($reqim);
       if($resIn){
        $l=$resIn->fetch();
        $im=$l[0];
         //$ID=$l['id'];
  }


        echo"<tr class='table-primary'>";
      
       echo"<td>$nom</td>";
       echo" <td>$description</td>";
       echo"<td>$posologie</td>";
       echo"<td>$categorie</td>";
       echo" <td id='prix'>$prix</td>";
       echo"<td><a href='detailsmedoc.php?code=$numero'><img src='$im'/></td>";
    //    echo"<td><form method='post' action=''>";
    //    echo "<input type='hidden' name='ajout' value='$numero' />";
    //    echo "<input type='submit' name='ajouter' id='btn1' value='accepter'/>";
    //   echo "</form></td>";
       echo"<div class='container'>";
       echo"<td><a href='supprimer.php?code=$numero'>
       <span class='glyphicon glyphicon-remove'></span>
       
        </a></td>";
        echo"<td> <a href='perempt.php?code=$numero'>
        <span class='glyphicon glyphicon-thumbs-down'></span>
         </a></td>";
       echo" </div>";
      echo"</tr>";

    }
}
?>

                    </tbody>
                </table>
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