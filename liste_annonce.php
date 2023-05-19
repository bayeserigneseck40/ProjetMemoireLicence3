<?php
 session_start();
 $connect=new PDO("mysql:host=localhost;port=3306;dbname=messagerie","demba","astou1998");

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="messagerie.css?t=<?php echo time();?>">
    <title>Pharmacie_en_ligne</title>
</head>
<header>	
</header>
 <body>
<!-- <section id="secami">-->
 
<?php
     $connect=new PDO("mysql:host=localhost;port=3306;dbname=messagerie","astoufalla","Khelcom1998");
     if($connect){
           echo'je suis connecté';
         }
       
           $sql="SELECT * FROM annonces NATURAL join pharmacies";
           $res=$connect->query($sql);
           if($res)
           {

              while($lign=$res->fetch()){ 
                echo $lign['date_annonce'];
                echo $lign['contenu'];
                echo $lign['type'];
                echo $lign['nom'];
                echo $lign['adresse'];
                echo '<img src="'.$lign['url'].'"/>';
                

                 
              }
     }
?>
 
 </body>

</html>