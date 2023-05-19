<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li{
            list-style:none;
            font-family:'Times New Roman', Times, serif
        }
    </style>
</head>
<body>
<?php

$connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
// echo"connection etablie";

if(isset($_POST['nom'])){
  $n=$_POST['nom'];
$sql="SELECT* from regions where nom like'%$n%'";
$resul=$connect->query($sql);
if($resul){
    ?>
    <!-- <div id="shadow" class="shadow-lg p-3 mb-5 bg-white rounded"> <h1>Selectionner votre departement</h1></div>   -->
    <?php
    while($row=$resul->fetch()){
         $id=$row['id'];
         $req="select * from departements where region_id=$id";
         $result=$connect->query($req);
         if($result){
             while($ligne=$result->fetch()){
                 
                 ?>
                 
                <li id="li"> <a href="AllvileVisiteur.php?ville=<?php echo $ligne['id'] ;?>"><?php echo $ligne['nom']; ?></a></li>
                   <br/>
            <?php
                }
            }
        }
    }
}
?>
    
</body>
</html>
