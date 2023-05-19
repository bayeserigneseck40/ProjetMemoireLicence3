
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    img{
        width:10%;
    }
    </style>
</head>
<body>
    
<?php

include 'connect_BD.php';
if(isset($_GET['code'])){
    $voir=$_GET['code'];
    $sql1="SELECT* from medicaments Natural join image";
    $stmt=$connect->prepare($sql1);
    $stmt->bindParam(':coder',$voir);
    $stmt->execute();
       while($row=$stmt->fetch()){
           if($row['id_medicament']==$voir){
               $e=$row['description'];
                 $a=$row['url'];
              echo "<img src='$a'/> \t\t\t";
             }
            }
            echo"<br/>";
            echo"<p>$e</p>";
            echo"<br/>";
         
            
        }
        else
echo "echec";




?>
</body>
</html>
