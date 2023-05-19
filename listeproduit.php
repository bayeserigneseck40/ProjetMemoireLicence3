<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    a{
      color:black;
    }
  </style>
  <title>Document</title>
</head>
<body>
<?php
  $connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
  // echo"connection etablie";

if(isset($_GET['nom']) && isset($_GET['cat'])){
    $n=$_GET['nom'];
    $cat=$_GET['cat'];
    $req="SELECT * from medicaments join categorie on id_categorie=num_categorie where nom_categorie='$cat' and nom like '%$n%' ";
    $res=$connect->query($req);
    if($res){
        echo"<table>";
      if($res->rowCount()>0){
        while($r=$res->fetch()){

          $nom=$r['nom'];
          $id=$r['id_medicament'];

        echo"<tr>";
        echo"<td>";
            ?>
          <a href="detailsCommande.php?code=<?php echo $id; ?>"><?php echo $nom; ?></a>
          <?php
        echo"<br/>";
        echo"</td>";
        echo"</tr>";
        }
    }
    echo"</table>";
}

}

?>
</body>
</html>
