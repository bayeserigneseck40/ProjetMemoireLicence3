<?php
//require_once('Accueil_Admin.php');

?>
<!DOCTYPE html>
<html>
<head>
    <style>
         h1{
            text-align:center;
        }
        /* #contenu{
            width:54%;
            margin-left: 46%;
            margin-top: -28%;
        }  */
        img{
          width:20%;
        }
      
    </style>
<title>Cours Complet Bootstrap 4</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
 crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
<meta charset='utf-8'>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body  style="background-color: #18d26e; color: gray;">

<?php
include 'connect_BD.php';
//  if(isset($_POST['medicament'])&&isset($_POST['qte'])&&isset($_POST['prixU'])){
//   $medicament=$_POST['medicament'];
//   $quantite=$_POST['qte'];
//   $prixU=$_POST['prixU'];
//   $dhc=date('Y-m-d');

//   echo $medicament,$quantite,$prixU,$dhc;
  

//   $sql="INSERT INTO ventes(date_vente,Quantite,prixU,id_medicament)VALUES($dhc,$quantite,$prixU,$medicament)";
//   $result=$connect->query($sql);
//   if($result){
//     echo"insertion reussi";
//   }

//  }




?>
  <div id="contenu">  
<div class="container">
  <h1>Liste des medicaments en peremption</h1>
  <!-- <table class="table"> -->
  <table class="table table-striped">
    <thead>
      <tr>
      <th scope="col">numero</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Posologie</th>
      <th scope="col">prix</th>
      <th scope="col">Quantite</th>
      <th scope="col">photo</th>
      <th scope="col">Signaler</th>
      </tr>
    </thead>
    <?php
    $sql="SELECT * FROM medicaments NATURAL JOIN  stock ";
    $result=$connect->query($sql);
    if($result){
        while($row=$result->fetch()){
          $numero=$row['id_medicament'];
         $nom=$row['nom'];
        $description=$row['description'];
        $posologie=$row['posologie'];
        $categorie=$row['id_categorie'];
        $prix=$row['prix'];
        $quantite=$row['quantiteStock'];


        $reqim="SELECT url from image where id_medicament=$numero";
        $resIn=$connect->query($reqim);
        if($resIn){
         $l=$resIn->fetch();
         $im=$l[0];
          //$ID=$l['id'];
        }


            echo"<tr class='table-primary'>";
            echo"<td>$numero</td>";
           echo"<td>$nom</td>";
           echo" <td>$description</td>";
           echo"<td>$posologie</td>";
           echo"<td>$prix</td>";
           echo"<td>$quantite</td>";
           echo"<td><a href='detail.php?code=$numero'><img src='$im'/></td>";
           echo"<div class='container'>";
           echo"<td> <a href='supVente.php?code=$numero'>
           <span class='glyphicon glyphicon-thumbs-down'></span>
            </a>";
           echo" </div>";
          echo"</tr>";

        }
    }

?>
 
    </tbody>
  </table>
</div>
</div>
</body>
</html>
