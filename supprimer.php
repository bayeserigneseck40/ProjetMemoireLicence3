<?php
include 'connect_BD.php';
if(isset($_GET['code'])){
  $b=$_GET['code'];
 $sql3="DELETE FROM  image  WHERE id_medicament=:cd";
  $stmt=$connect->prepare($sql3);
  $stmt->bindParam(':cd',$b,PDO::PARAM_INT);
  $stmt->execute();

  $req4="DELETE FROM  medicaments  WHERE id_medicament=:cod";
  $stmt=$connect->prepare($req4);
  $stmt->bindParam(':cod',$b,PDO::PARAM_INT);
  $stmt->execute();
  echo"suppression reussi";
  header('location:medicament.php');

 
   } 

   ?>
  