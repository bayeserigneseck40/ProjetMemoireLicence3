<?php
session_start();
include_once 'connect_BD.php';
// $nom = "";
// $posologie = "";
// $categorie = "";
// $prix = "";
// $quantite = "";
// $id = 0;
// $edit_state = false;

// if (isset($_POST['save'])) {
//   $nom = $_POST['nom'];
//   $posologie = $_POST['posologie'];
//   $categorie = $_POST['categorie'];
//   $prix = $_POST['prix'];
//   $quantite = $_POST['quantiteStock'];

//  $sql = "INSERT INTO medicaments (nom,posologie,categorie,prix,quantite) VALUES ('$nom','$posologie',$categorie','$prix','$quantite')";
//  if ($result=$connect->query($sql)) { 
//    $_SESSION['message'] = "Donnees Enregistrees avec Succes";
//     header("Location: Ajout_medicament.php");
//    } 
 
   
// }

// For updating records

// if (isset($_POST['update'])) {
//    $id = $_POST['id'];
//    $nom = $_POST['nom'];
//   $posologie = $_POST['posologie'];
//   $categorie = $_POST['categorie'];
//   $prix = $_POST['prix'];
//   $quantite = $_POST['quantite'];
//   echo $id, $nom,$posologie,$categorie, $prix, $quantite;
//   $sql="UPDATE medicaments natural join stock SET nom='$nom', posologie='$posologie', id_categorie=$categorie,prix=$prix,quantiteStock=$quantite WHERE id_medicament=$id";
//  $result=$connect->query($sql);
//   $_SESSION['message'] = "Data Updated Successfully";
//   header('location:Ajout_medicament.php');
// }

// For deleteing records

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql="DELETE FROM orders  WHERE id=$id";
  $result=$connect->query($sql);
  $_SESSION['message'] = " Données supprimées avec succès";
   header('location:historiques.php');
  }
?>