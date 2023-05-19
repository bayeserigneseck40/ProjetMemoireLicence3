<?php
session_start();
include "connect_BD.php";
include "get_distance.php";
//   if(isset($_GET['prenom']) && isset($_GET['nom'])){
    $lat1=$_GET['prenom'];
    $lng1=$_GET['nom'];
    // $id=$_SESSION['user_id'];
    $id=2;

    // $sql="SELECT* from pharmacies_proche where $id in(select distinct  id_personne from pharmacies_proche)";
    $sql="select * from pharmacies_proche where id_personne=$id";
    $result=$connect->query($sql);
    if($result->rowCount()>0){
        $sql="select * from pharmacies_proche";
        $result=$connect->query($sql);
        while($ligne=$result->fetch()){
            $lat2=$ligne['lat'];
            $lng2=$ligne['lng'];
          
            $distance=get_distance_m($lat1,$lng1,$lat2,$lng2);
            $req="UPDATE pharmacies_proche SET distance='$distance' where lat=$lat2 and lng=$lng2 and id_personne=$id";
            $res=$connect->query($req);
            echo $distance;
    
    
         }
     }
     else{
        $req="select * from pharmacies_proche";
        $res=$connect->query($req);
        while($ligne=$res->fetch()){
            $lat2=$ligne['lat'];
            $lng2=$ligne['lng'];
            $num_pharmacie=$ligne['num_pharmacie'];
            $type="pharmacie";
            $name=$ligne['name'];
            $address=$ligne['address'];
            echo $lat2,$lng2,$num_pharmacie,$type,$name,$address,$id;
            echo"<br/>";
            $distance=get_distance_m($lat1,$lng1,$lat2,$lng2);
            echo $distance;
            $sql1=" INSERT Into pharmacies_proche(name,address,type,lat,lng,num_pharmacie,distance,id_personne)VALUES('$name','$address','$type',$lat2,$lng2, $num_pharmacie,'$distance',$id)";
            $result1=$connect->query($sql1);
            if($result1){
                echo "insertion reussi";
            }
            // $req="UPDATE pharmacies_proche SET distance='$distance' where lat=$lat2 and lng=$lng2 and id_personne=$id";
            // $res=$connect->query($req);
      
    

     }

    }
//   }

   






?>