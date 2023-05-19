<?php

include "connect_BD.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['search'])){
        $search=$_POST['search'];
        $sql="select id_medicament from medicaments where nom like '$search'";
        $result=$connect->query($sql);
        if($row=$result->fetch()){
            $id=$row['id_medicament'];
            echo $id;

            header("location:detailsCommande.php?code=$id");
        }
    }






?>
</body>
</html>