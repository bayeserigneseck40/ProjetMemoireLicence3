<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   include 'connect_BD.php';
   if(isset($_GET['code'])){
     $b=$_GET['code'];
     $req4="UPDATE  personnes SET Etat_Demande='Acceptee'  WHERE id_personne=:cod";
     $stmt=$connect->prepare($req4);
     $stmt->bindParam(':cod',$b,PDO::PARAM_INT);
     $stmt->execute();
     echo"suppression reussi";
     header('location:costmers.php');
   }
     ?>
   



?>
    
</body>
</html>