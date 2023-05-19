<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
 crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
<meta charset='utf-8'>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <title>commandes</title>
   <style>
        h1{
            text-align:center;
        }
   </style>
</head>
<body  style="background-color: #18d26e;">

<div id="contenu">  
       <div class="container">
         <h1>Vos historiques de commandes </h1>
         <table class="table table-striped">
           <thead>
             <tr>
               <th>id_Commande</th>
               <th>Commandeur</th>
               <th>Mode de Payement</th>
               <th>Medicament</th>
               <th>Montant a payer</th>
               <!-- <th>Prix total</th> -->
               <th>Supprimer</th>
             </tr>
           </thead>

      <?php
       include("connect_BD.php");
       $sql="select *from orders ";
       $result=$connect->query($sql);
       if($result){
           while($row=$result->fetch()){
               $id=$row['id'];
               $nom=$row['name'];
               $pmode=$row['pmode'];
               $products=$row['products'];
               $amount_paid=$row['amount_paid'];
           
       
               echo"<tr class='table-primary'>";
               echo"<td>$id</td>";
              echo"<td>$nom</td>";
              echo" <td>$pmode</td>";
              echo"<td>$products</td>";
              echo"<td>$amount_paid</td>";
              echo"<div class='container'>";
              echo"<td> <a href='supVente.php?'>
              <span class='glyphicon glyphicon-remove'></span>
               </a>";
              echo" </div>";
             echo"</tr>";
   
           }
       }
   

 
     


?>
</body>
</html>