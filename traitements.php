<?php

$medicament=$_POST['medicament'];
include 'connect_BD.php';
$sql="SELECT prix from medicaments where id_medicament=$medicament";
$result=$connect->query($sql);
if($result){
    while($row=$result->fetch()){
        $prix=$row['prix'];
        echo json_encode($prix);
    }
}






?>