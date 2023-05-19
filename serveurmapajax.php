
<?php

session_start();
$connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
if(isset($_GET['nom']) && isset($_GET['prenom'])){
    $n=$_GET['nom'];
    $pn=$_GET['prenom'];
    $id=$_SESSION['coord'];
    echo $id;
    $sql="select * from pharmacies where num_pharmacie=$id";
    $result=$connect->query($sql);
    if($ligne=$result->fetch()){
        $nom=$ligne['nom'];
        $adresse=$ligne['adresse'];
        $type='pharmacie';
    $req="INSERT into pharmacies_proche (name,address,type,lat,lng,num_pharmacie) values('$nom','$adresse','$type',$n,$pn,$id-1)";
    $res=$connect->query($req);
    if($res){
        header("Location:login.php");
     echo "insertion reussi";

}

    }
}
echo "<br/>";


   
?>