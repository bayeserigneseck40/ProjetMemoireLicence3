<?php
include "connect_BD.php";

if(isset($_GET['code'])){
    $code=$_GET['code'];
    $sql="UPDATE orders set etat=1 where id=$code";
    $result=$connect->query($sql);
    if($result){
        header("Location:commande.php");

    }
}

if(isset($_GET['codeAn'])){
    $code=$_GET['codeAn'];
    $sql="UPDATE orders set etat=-1 where id=$code";
    $result=$connect->query($sql);
    if($result){
        header("Location:commande.php");
        
    }
}


?>