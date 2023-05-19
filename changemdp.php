<?php
include "connect_BD.php";
if(isset($_POST['username'])&&isset($_POST['mdp'])&&isset($_POST['cmdp'])){

    $username=$_POST['username'];
    $mdp=$_POST['mdp'];
    $cmdp=$_POST['cmdp'];
    
$sql="UPDATE personnes set password='$mdp' where login='$username'";
$result=$connect->query($sql);
if($result){
    header("location:login.php");
}

}



?>