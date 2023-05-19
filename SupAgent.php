<?php
include 'connect_BD.php';
if(isset($_GET['code'])){
  $b=$_GET['code'];
$req4="DELETE FROM  personnes  WHERE id_personne=:cod";
  $stmt=$connect->prepare($req4);
  $stmt->bindParam(':cod',$b,PDO::PARAM_INT);
  $stmt->execute();
  echo"suppression reussi";
  header('location:Agent.php');
}
  ?>
