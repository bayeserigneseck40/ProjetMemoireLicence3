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
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $addresse = $_POST['adresse'];
  $email = $_POST['email'];
  $login = $_POST['login'];
  $role=$_POST['role'];
  $password=$_POST['password'];
  $id_pharmacie=$_SESSION['num_pharmacie'];

  echo $addresse;


 $sql = "INSERT INTO personnes (nom,prenom,adresse,email,login,password,role) VALUES ('$nom','$prenom','$addresse','$email','$login','$password','$role')";
 if ($result=$connect->query($sql)) { 
     $id=$connect->lastInsertId();
     $req="INSERT into agents(id_agent,id_pharmacie)values($id,$id_pharmacie)";
     $res=$connect->query($req);
   $_SESSION['message'] = "Donnees Enregistrees avec Succes";
   $destination="$email";
   $sujet="vos parametres de connexion";
   $message="votre login est:$login et votre mots de pass est $password";
   $headers="from:bayeserigneseck40@gmail.com";
   mail($destination,$sujet,$message,$headers);   
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