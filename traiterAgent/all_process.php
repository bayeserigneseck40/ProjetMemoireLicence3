<?php
session_start();
include_once 'connect_BD.php';
$nom = "";
$adresse = "";
$prenom = "";
$email = "";
$login = "";
$id = 0;
$edit_state = false;

if (isset($_POST['save'])) {
  $prenom = $_POST['nom'];
  $prenom = $_POST['nom'];
  $addresse = $_POST['adresse'];
  $email = $_POST['email'];
  $login = $_POST['login'];

 $sql = "INSERT INTO personnes (nom,prenom,address,email,login) VALUES ('$nom','$prenom',$addresse','$email','$login')";

 if ($result=$connect->query($sql)) { 
   $_SESSION['message'] = "Donnees Enregistrees avec Succes";
    header("Location: Agent.php");
   } 
  //  else {
  //   // mysqli_close($conn);
  //  }
   
}

// For updating records

if (isset($_POST['update'])) {
   $id = $_POST['id'];
  $nom = $_POST['nom'];
  $addresse = $_POST['adresse'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $login = $_POST['login'];

  $sql="UPDATE personnes SET nom='$nom', adresse='$addresse', prenom='$prenom',email='$email',login='$login' WHERE id_personne=$id";
 $result=$connect->query($sql);
  $_SESSION['message'] = "Data Updated Successfully";
  header('location: Agent.php');
}

// For deleteing records

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  echo $id;
  $sql="DELETE FROM personnes WHERE id_personne=$id";
  $result=$connect->query($sql);
  $_SESSION['message'] = " Données supprimées avec succès";
   header('location:Agent.php');
  }
?>