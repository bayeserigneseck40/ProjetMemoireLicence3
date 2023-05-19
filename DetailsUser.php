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
 include "connect_BD.php";
    if(isset($_GET['code'])){
        $code=$_GET['code'];
        $sql="select * from personnes where id_personne=$code";
        $res=$connect->query($sql);
        if($res){
            $ligne=$res->fetch();
            echo $ligne['nom'];
        }
    }


?>
    
</body>
</html>