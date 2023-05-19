<?php
session_start();
include_once 'connect_BD.php';
$nom = "";
$posologie = "";
$categorie = "";
$prix = "";
$quantite = "";
$description = "";
$id = 0;
$edit_state = false;
$id_pharma=	$_SESSION['num_pharmacie'];
if (isset($_POST['save'])) {
  $nom = $_POST['nom'];
  $posologie = $_POST['posologie'];
  $categorie = $_POST['categorie'];
  $prix = $_POST['prix'];
  $quantite = $_POST['quantite'];
  $description = $_POST['description'];

   echo $nom,$posologie,$categorie,$prix,$quantite,$description;
  $req="SELECT nom from medicaments natural join stock   where num_pharmacie=$id_pharma and nom='$nom'";
  $resu=$connect->query($req);
  if($resu->rowCount()>0){
    $_SESSION['message'] = "ce medicaments exist deja";   
    header("Location:Ajout_medicament.php"); 
  }
  else {
   
 $sql = "INSERT INTO medicaments (nom,description,posologie,id_categorie,prix) VALUES ('$nom','$description','$posologie',$categorie,$prix)";
 if ($result=$connect->query($sql)) { 
   $_SESSION['message'] = "Donnees Enregistrees avec Succes";
    // header("Location: Ajout_medicament.php");
   } 

   $code=$connect->lastInsertId();


  $cptphotos=count($_FILES['photo']['name']);
  for($i=0;$i<$cptphotos;$i++){
  $extensions_ok = array( 'jpg' , 'jpeg' , 'gif' , 'png','pdf' );

  $extension_fichier = strtolower( substr(strrchr($_FILES['photo']['name'][$i], '.'),1));
  if ( in_array($extension_fichier, $extensions_ok) )
       {
          echo "<p>Extension correcte du fichier</p>"; 
       }

     $dhc=date("dmy_his",time());
     $fic="mesphotos/".$dhc."_".$_FILES['photo']['name'][$i];
     $result=move_uploaded_file($_FILES['photo']['tmp_name'][$i],$fic);
     if($result){
     echo "<p>transfert du fichier reussi</p>";
     }

     $url="mesphotos/".$dhc."_".$_FILES['photo']['name'][$i];
    
     echo $url,$code;

    

     $req1="INSERT INTO image(url,id_medicament)VALUES('$url',$code)";
     $stmt=$connect->query($req1);
     if($stmt){
         echo"insertion image reussi";
     }
    //  $stmt->bindParam(':url',$url);
    //  $stmt->bindParam(':id_medicament',$code);
    //  $stmt->execute() ;         


}
$req2="INSERT INTO stock(num_pharmacie,id_medicament,quantiteStock)VALUES($id_pharma,$code,$quantite)";
$res=$connect->query($req2);
if($res){
    echo "insertion reussi";
}


$cptphotos=count($_FILES['photodesc']['name']);
for($i=0;$i<$cptphotos;$i++){
$extensions_ok = array( 'jpg' , 'jpeg' , 'gif' , 'png','pdf' );

$extension_fichier = strtolower( substr(strrchr($_FILES['photodesc']['name'][$i], '.'),1));
if ( in_array($extension_fichier, $extensions_ok) )
     {
        echo "<p>Extension correcte du fichier</p>"; 
     }

   $dhc=date("dmy_his",time());
   $fic="mesphotos/".$dhc."_".$_FILES['photodesc']['name'][$i];
   $result=move_uploaded_file($_FILES['photodesc']['tmp_name'][$i],$fic);
   if($result){
   echo "<p>transfert du fichier reussi</p>";
   }

   $url2="mesphotos/".$dhc."_".$_FILES['photodesc']['name'][$i];

   $req2="INSERT INTO imagedesc(url,id_medicament)VALUES('$url2',$code)";
   $stmt2=$connect->query($req2);
   if($stmt2){
       echo"insertion image reussi";
       header("Location:Ajout_medicament.php"); 
  
 }
}

 
}   
}

// For updating records
$num_pharmacie=$_SESSION['num_pharmacie'];
if (isset($_POST['update'])) {
   $id = $_POST['id'];
   $nom = $_POST['nom'];
  $posologie = $_POST['posologie'];
  $categorie = $_POST['categorie'];
  $prix = $_POST['prix'];
  $quantite = $_POST['quantite'];
  // echo $id, $nom,$posologie,$categorie, $prix, $quantite;
  $sql="UPDATE medicaments join stock on medicaments.id_medicament=stock.id_medicament SET nom='$nom', posologie='$posologie',prix=$prix,quantiteStock=$quantite WHERE stock.id_medicament=$id and stock.num_pharmacie=$num_pharmacie";
 $result=$connect->query($sql);
 if($result){


  $_SESSION['message'] = "Data Updated Successfully";
     header('location:Ajout_medicament.php');
}
}

// For deleteing records

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql="DELETE FROM  image WHERE id_medicament=$id";
  $result=$connect->query($sql);
  $sql1="DELETE FROM  stock WHERE id_medicament=$id";
  $result1=$connect->query($sql1);
  $sql2="DELETE FROM medicaments  WHERE id_medicament=$id";
  $result2=$connect->query($sql2);
  $_SESSION['message'] = " Données supprimées avec succès";
   header('location:Ajout_medicament.php');
  }
?>