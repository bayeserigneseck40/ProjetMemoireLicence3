<?php
session_start();

include 'form.php';
include 'connect_BD.php';
$id=$_SESSION['id'];
// echo $id;
// if(isset($_POST['nom'])&&isset($_POST['adr'])&&isset($_POST['depart'])&&isset($_POST['desc'])){
    $nom=$_POST['nom'];
    $adr=$_POST['adr']; 
    $departement=$_POST['depart'];
    $desc=$_POST['desc'];
    echo $nom,$adr; 

    $sql="INSERT INTO pharmacies(nom,adresse,num_gerant,description,ville)VALUES('$nom','$adr',$id,'$desc','$departement')";
    $result=$connect->query($sql);
    
    if($result){
    //     header("location:login.php");
    // 
    $code=$connect->lastInsertId();
    $_SESSION['coord']=$code;


  $cptphotos=count($_FILES['photo']['name']);
   for($i=0;$i<$cptphotos;$i++){
   $extensions_ok = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

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


    

      $req1="INSERT INTO imageph(url,num_pharmacie)VALUES('$url',$code)";
      $stmt=$connect->query($req1);
      if($stmt){
          if($stmt){
            header("location:login.php");
          }
        // 
     }
              

 }
}




// }





?>
