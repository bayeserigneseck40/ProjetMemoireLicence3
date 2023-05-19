<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #para{
            font-size:20px;
            font-style:italic;
            background-color:red;
            font-weight:bold;
        }
    </style>
</head>
<body>
<?php

include 'connect_BD.php';
if(isset($_GET['valeur'])&&isset($_GET['medoc'])){
    $val=$_GET['valeur'];
    $medoc=$_GET['medoc'];
    $sql="SELECT* from stock where id_medicament=$medoc";
    $res=$connect->query($sql);
    if($ligne=$res->fetch()){
          if($ligne['quantiteStock']<$val){
            echo '<div class="alert alert-danger alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>La quantité saisie est indisponible pour le moment!</strong>
          </div>';
            //   echo"<p id='para'>la quantite saisie n'est pas disponible</p>";

          }
    }
}
             



?>
</body>
</html>