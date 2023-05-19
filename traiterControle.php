<?php

//  session_start();


?>
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
    // $id=$_SESSION['formC'];
    // $idp=$_SESSION['formT'];
    include "connect_BD.php";
    $doctor = "";
$date_debut = "";
$date_fin = "";
$telephone = "";

$edit_state = false;
   
if (isset($_POST['save'])) {
    $id_phar=$_POST['id'];
       $doctor=$_POST['doctor'];
       $date_debut=$_POST['date_debut'];
       $date_fin=$_POST['date_fin'];
       $telephone=$_POST['telephone'];

      $req="select * from pharmacies where num_gerant=$id_phar";
      $res=$connect->query($req);
      if($ligne=$res->fetch()){
          $id_ph=$ligne['num_pharmacie'];
      }
      echo $date_debut,$date_fin;
     $sql="INSERT into panneau_tour(Docteur,date_debut,date_fin,num_pharmacie,telephone)values('$doctor','$date_debut','$date_fin',$id_ph,'$telephone')";
     $result=$connect->query($sql);
     if($result){
     header("Location:Accueil_ph.php");
    
     echo "insertion reussi";
    }

   }
   if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $doctor = $_POST['doctor'];
   $date_debut = $_POST['date_debut'];
   $date_fin = $_POST['date_fin'];
   $telephone = $_POST['telephone'];

   $sql="UPDATE panneau_tour  SET Docteur='$doctor', date_debut='$date_debut', date_fin='$date_fin',telephone='$telephone' WHERE id_panneau=$id";
  $result=$connect->query($sql);
   header('location:Accueil_ph.php');
 }


?>
    
</body>
</html>