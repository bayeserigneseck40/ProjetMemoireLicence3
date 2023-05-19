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
    li{
      list-style:none;
      font-family:'Times New Roman', Times, serif
    }
    p{
      font-family:'Times New Roman', Times, serif;
      color:SeaGreen;
    }
  </style>
  <title>Document</title>
</head>
<body>
<?php
  $connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
  // echo"connection etablie";

if(isset($_POST['nom'])){
    $n=$_POST['nom'];
    $req="select nom,id_medicament from medicaments where nom like '%$n%' ";
    $res=$connect->query($req);
    echo "<p>ce medicament est disponible à la pharmacie:</p>";
        while($r=$res->fetch()){
          $nom=$r['nom'];
          $id=$r['id_medicament'];
          $sql="SELECT DISTINCT nom,S.num_pharmacie from stock S join pharmacies P on S.num_pharmacie=P.num_pharmacie where S.id_medicament=$id";
          $result=$connect->query($sql);
          if($result->rowCount()>0){
          
        while($ligne=$result->fetch()){
            $nom=$ligne['nom'];
            $numero=$ligne['num_pharmacie'];
            echo"<tr>";
        echo"<td>";
            ?>
          <li><a href="detailspharmacie.php?code=<?php echo $numero; ?>"><?php echo $nom; ?></a></li>
          <?php
        echo"<br/>";
        
        echo"</td>";
        echo"</tr>";
     }
     echo"</table>";


        }
      
        }
        
    }       
  

?>
</body>
</html>
