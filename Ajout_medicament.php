<?php
 
include 'all_process_ajout_medi.php';
  include "menuph.php";
$id_pharma=	$_SESSION['num_pharmacie'];
 if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    echo $id;
    
    $result = $connect->query("SELECT * FROM (medicaments M join stock S on M.id_medicament=S.id_medicament) join categorie C on M.id_categorie=C.num_categorie join image I on M.id_medicament=I.id_medicament where M.id_medicament=$id and S.num_pharmacie=$id_pharma");
    $ligne=$result->fetch();
    $id_medicament = $ligne['id_medicament'];
    $nom = $ligne['nom'];
    $description=$ligne['description'];
    $posologie = $ligne['posologie'];
    $id_categorie = $ligne['nom_categorie'];
    $prix = $ligne['prix'];
     $url = $ligne['url'];
    $quantite=$ligne['quantiteStock'];
    // echo $id_medicament,$nom,$description,$posologie,$id_categorie;
    
   }
 
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <style>
    body{
      /* background-image:url("medicine.jpg"); */
      background-image: linear-gradient(-90deg, #18d26e, #54c283); 
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
    td p{
      font-family:'Times New Roman', Times, serif;
    }
    th p{
      font-family:'Times New Roman', Times, serif;
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
     <input name="description" placeholder="Entrer la description" value="<?php echo $description; ?>">
     <input type="text" name="posologie" placeholder="Entrer la posologie" value="<?php echo $posologie; ?>">
     <!-- <input type="number" name="categorie" placeholder="Entrer La categorie" value="<?php echo $id_categorie; ?>"> -->
      <select name="categorie" id='val'>
      <option value=""><p>Categorie</p><option>
      <?php
       include 'connect_BD.php';
       $req="SELECT* from categorie  order by nom_categorie";
       $result=$connect->query($req);
       if($result){
           while($row=$result->fetch()){
                   $nom=$row['nom_categorie'];
                   $numero=$row['num_categorie'];
                   echo  "<option value='$numero'><p>$nom</p><option>"; 
               }
            }
        ?>
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
    <th><p>Nom</p></th>
    <th><p>Posologie</p></th>
    <th><p>Categorie</p></th>
    <th><p>PrixU</p></th>
    <th><p>Photo</p></th>
    <th><p>QuantiteStock</p></th>
    <th><p>Modifier</p></th>
    <th><p>Supprimer</p></th>
  </tr>
  <?php
// $req="SELECT * FROM medicaments natural join image natural join stock order by nom ";
// $resul=$connect->query($req);
  $req="SELECT* FROM  (medicaments join categorie on id_categorie=num_categorie)  join stock on medicaments.id_medicament=stock.id_medicament where Stock.num_pharmacie=$id_pharma order by nom_categorie,nom";
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
  <td><p><?php echo $row["nom"]; ?></p></td>
  <td><p><?php echo $row["posologie"]; ?></P></td>
  <td><p><?php echo $row["nom_categorie"]; ?></p></td>
  <td><p><?php echo $row["prix"]; ?></p></td>
  <td><a href="detailsmedoc.php?code=<?php echo $row['id_medicament']?>"><img src="<?php echo $im; ?>" ></a></td>
  <td><p><?php echo $row["quantiteStock"]; ?></p></td>
  <td><a href="Ajout_medicament.php?edit=<?php echo $row["id_medicament"]; ?>" class="edit_btn">Modifier</a></td>
  <td><a href="all_process_ajout_medi.php?delete=<?php echo $row["id_medicament"]; ?>" class="del_btn">Supprimer</a></td>
  </tr>
  <?php
  // $i++;
      }
      else{
        ?>
        <td><p><?php echo $row["nom"]; ?></p></td>
        <td><p><?php echo $row["posologie"]; ?></p></td>
        <td><p><?php echo $row["nom_categorie"]; ?></p></td>
        <td><p><?php echo $row["prix"]; ?></p></td>
        <td><a href="detailsCommandePh.php?code=<?php echo $row['id_medicament']?>"><img src="<?php echo $im; ?>" ></a></td>
        <td><p><?php echo $row["quantiteStock"]; ?></p></td>
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