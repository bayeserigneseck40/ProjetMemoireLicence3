<?php
 
include 'all_process_ajout_medi.php';
  include "menuAg.php";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    
    $result = $connect->query("SELECT * FROM (medicaments natural join image natural join stock) join categorie on id_categorie=num_categorie WHERE id_medicament=$id");
    $ligne=$result->fetch();
    
    
    $id_medicament = $ligne['id_medicament'];
    $nom = $ligne['nom'];
    $description=$ligne['description'];
    $posologie = $ligne['posologie'];
    $id_categorie = $ligne['nom_categorie'];
    $prix = $ligne['prix'];
    $url = $ligne['url'];
    $quantite=$ligne['quantiteStock'];
    
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <style>
    body{
      /* background-image:url("medicine.jpg"); */
      background-image: linear-gradient(-90deg, #1e596b, #54c283); 
    }
    th{
      border:1px solid black;
      width:5%;
    }
    img{
      width:80%;
    }
    .rup{
      background-color:red;
    }
    table{
      width:80%;
    }
  </style>
  <title>VENTES</title>
</head>
<body>
<center>
  <?php if (isset($_SESSION['message'])):?>
    <div class="message">
      <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']); 
      ?>
    </div>
  <?php endif ?>
  <h1>Ajouter des medicaments</h1>
   <form class="form-inline" method="POST" action="all_process_ajout_medi.php" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?php echo $id_medicament; ?>">
     <input type="text" name="nom" placeholder="Entrer le nom" value="<?php echo $nom; ?>">
     <textarea type="text" name="description" placeholder="Entrer la description" value="<?php echo $description; ?>"></textarea>
     <input type="text" name="posologie" placeholder="Entrer la posologie" value="<?php echo $posologie; ?>">
     <input type="number" name="categorie" placeholder="Entrer La categorie" value="<?php echo $id_categorie; ?>">
     <input type="number" name="quantite" placeholder="Entrer la quantite" value="<?php echo $quantite; ?>"> 
     <input type="number" name="prix" placeholder="Entrer le prix" value="<?php echo $prix; ?>">
     <input type="file" name="photo[]" placeholder="Entrer l'url" value="<?php echo $url; ?>"> 
     <input type="file" name="photodesc[]" placeholder="Entrer l'url" value="<?php echo $url; ?>"> 
  <?php if ($edit_state == false): ?>
  <button class="btn" type="submit" name="save" >Enregistrer</button>
<?php else: ?>
  <button class="btn" type="submit" name="update" >Changer</button>
<?php endif ?>
     
   </form>

<table>
  <tr>
    <th>Nom</th>
    <th>Posologie</th>
    <th>Categorie</th>
    <th>PrixU</th>
    <th>Photo</th>
    <th>QuantiteStock</th>
    <th>Modifier</th>
    <th>Supprimer</th>
  </tr>
  <?php
// $req="SELECT * FROM medicaments natural join image natural join stock order by nom ";
// $resul=$connect->query($req);
  $req="SELECT* FROM  (medicaments join categorie on id_categorie=num_categorie)  join stock on medicaments.id_medicament=stock.id_medicament order by nom_categorie,nom";
  $resul=$connect->query($req);
if($resul){
    while($row=$resul->fetch()){
      $numero=$row['id_medicament'];
      $quantite=$row['quantiteStock'];
      
      $reqim="SELECT url from image where id_medicament=$numero";
      $resIn=$connect->query($reqim);
      if($resIn){
       $l=$resIn->fetch();
       $im=$l[0];
        //$ID=$l['id'];
      }

      if($quantite<=5){
     
  ?>
  <tr class='rup'>
  <?php 
  // echo $i; 
  ?>
  <!-- <td></td> -->
  <td><?php echo $row["nom"]; ?></td>
  <td><?php echo $row["posologie"]; ?></td>
  <td><?php echo $row["nom_categorie"]; ?></td>
  <td><?php echo $row["prix"]; ?></td>
  <td><a href="detailsmedoc.php?code=<?php echo $row['id_medicament']?>"><img src="<?php echo $im; ?>" ></a></td>
  <td><?php echo $row["quantiteStock"]; ?></td>
  <td><a href="Ajout_medicament.php?edit=<?php echo $row["id_medicament"]; ?>" class="edit_btn">Modifier</a></td>
  <td><a href="all_process_ajout_medi.php?delete=<?php echo $row["id_medicament"]; ?>" class="del_btn">Supprimer</a></td>
  </tr>
  <?php
  // $i++;
      }
      else{
        ?>
        <td><?php echo $row["nom"]; ?></td>
        <td><?php echo $row["posologie"]; ?></td>
        <td><?php echo $row["nom_categorie"]; ?></td>
        <td><?php echo $row["prix"]; ?></td>
        <td><a href="detailsmedoc.php?code=<?php echo $row['id_medicament']?>"><img src="<?php echo $im; ?>" ></a></td>
        <td><?php echo $row["quantiteStock"]; ?></td>
        <td><a href="Ajout_medicament.php?edit=<?php echo $row["id_medicament"]; ?>" onclick="return confirm('etes vous sure de vouloir modifier?');" class="edit_btn">Modifier</a></td>
        <td><a href="all_process_ajout_medi.php?delete=<?php echo $row["id_medicament"]; ?>" onclick="return confirm('etes vous sure de vouloir supprimer?');" class="del_btn">Supprimer</a></td>
        </tr>
        <?php

      }
}
}
  ?>
</table>

</center>
<?php 
 include "footer.php";
?>


</body>
</html>