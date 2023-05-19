<?php
include 'all_process.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    
    $result = $connect->query("SELECT * FROM personnes WHERE id_personne=$id");
    $ligne=$result->fetch();
    
    
    $nom = $ligne['nom'];
    $prenom = $ligne['prenom'];
    $adresse=$ligne['adresse'];
    $email = $ligne['email'];
    $login = $ligne['login'];
    
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Crud Operation In PHP</title>
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
  <h1>Ajouter des agents</h1>
   <form class="form-inline" method="POST" action="all_process.php">
     <input type="hidden" name="id" value="<?php echo $id; ?>">
     <input type="text" name="nom" placeholder="Entrer le nom" value="<?php echo $nom; ?>">
     <input type="text" name="prenom" placeholder="Entrer votre prenom" value="<?php echo $prenom; ?>">
     <input type="text" name="addresse" placeholder="Entrer L'addresse" value="<?php echo $adresse; ?>">
     <input type="text" name="login" placeholder="Entrer login" value="<?php echo $login; ?>">
     <input type="text" name="email" placeholder="Entrer l'email" value="<?php echo $email; ?>">
  <?php if ($edit_state == false): ?>
  <button class="btn" type="submit" name="save" >Enregistrer</button>
<?php else: ?>
  <button class="btn" type="submit" name="update" >Changer</button>
<?php endif ?>
     
   </form>

<table>
  <tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Address</th>
    <th>email</th>
    <th>login</th>
  </tr>
  <?php
$req="SELECT* FROM personnes where role='Agent' ";
$resul=$connect->query($req);
if($resul){
    while($row=$resul->fetch()){
     
  ?>
  <tr>
  <?php 
  // echo $i; 
  ?>
  <!-- <td></td> -->
  <td><?php echo $row["nom"]; ?></td>
  <td><?php echo $row["prenom"]; ?></td>
  <td><?php echo $row["adresse"]; ?></td>
  <td><?php echo $row["email"]; ?></td>
  <td><?php echo $row["login"]; ?></td>
  <td><a href="Agent.php?edit=<?php echo $row["id_personne"]; ?>" class="edit_btn">Modifier</a></td>
  <td><a href="all_process.php?delete=<?php echo $row["id_personne"]; ?>" class="del_btn">Supprimer</a></td>
  </tr>
  <?php
  // $i++;
}
}
  ?>
</table>

</center>


</body>
</html>