<?php
session_start();
 include "menuAg.php";
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
    <link href="stylephoto.css" rel="stylesheet">
   <style>
        h1{
            text-align:center;
            font-style:italic;
            font-family:Georgia;
            opacity:1.5;
            text-shadow : 3px 2px 5px silver;
          
        }
        #titre{
          border:0px solid black;
          background-color:white;
        }
        #contenu{
          margin-top:7%;
  
        }
        body{
          background-image:url("shield.jpg");
        }
        .lien{
          border:0px solid black;
          background-color:green;
        }
        td a{
          color:black;
          font-size:12px;
        }
        td a:hover{
          color:orange;
          font-size:12px;
        }
        td p{
          font-size:15px;
        }
        th p{
          font-size:10px;
        }
        th{
          font-size:20px;
          font-style:italic;
          font-weight:bold;
        }
   </style>
</head>
<body>

<div id="contenu">  
       <div class="container">
       <div class="shadow-lg p-3 mb-5 bg-white rounded"><h1 id="titre">Commandes en attente de validation  </h1></div>
         <table class="table table-striped">
           <thead>
             <tr>
               <th><p>id_Commande</p></th>
               <th><p>Commandeur</p></th>
               <!-- <th>email</th>
               <th>phone</th> -->
               <th><p>Adresse</P></th>
               <th><p>Medicament</p></th>
               <th><p>Mode de Payement</p></th>
               <th><p>Montant a payer</p></th>
               <th><p>Validatiom</P></th>
               <th><p>Annulation</p></th>
             </tr>
           </thead>

      <?php
      $id=$_SESSION['num_pharma'];
       include("connect_BD.php");
       $sql="select *from orders where num_pharmacie=$id and etat=0";
       $result=$connect->query($sql);
       if($result){
           while($row=$result->fetch()){
               $id=$row['id'];
               $nom=$row['name'];
               $pmode=$row['pmode'];
               $products=$row['products'];
               $amount_paid=$row['amount_paid'];
               $email=$row['email'];
               $phone=$row['phone'];
               $adress=$row['address'];
      $sql="select id_personne from personnes where email='$email'";
      $res=$connect->query($sql);
        $ligne=$res->fetch();
        $code=$ligne['id_personne'];
           
       
               echo"<tr class='table-primary'>";
               echo"<td><p>$id</p></td>";
              echo"<td><a href='PROFILEUSER.php?code=$code'><p>$nom</p></a></td>";
              // echo"<td>$email</td>";
              // echo"<td>$phone</td>";
              echo"<td><p>$adress</p></td>";
              echo"<td><p>$products</p></td>";
              echo" <td><p>$pmode</p></td>";
              echo"<td><p>$amount_paid</p></td>";
              echo"<div class='container'>"; 
              ?>
              <form method="post" action="">
            
                <td><button type="submit" name="val" value="<?php echo $id; ?>" onclick="return confirm('etes vous sure de vouloir valider la commande?')" class="btn btn-success">Valider</button></td>
               <td><button type="submit" name="anul" value="<?php echo $id; ?>" onclick="return confirm('etes vous sure de vouloir annuler la commande?')" class="btn btn-warning">Annuler</button></td> 
           </form>
               <!-- <td><a class='lien' href='TraiterCommande.php?code=<?php echo $id; ?>' onclick="return confirm('etes vous sure de vouloir valider la commande?')">Valider</a></td> -->
              <!-- <td><a class='lien' href='TraiterCommande.php?codeAn=<?php echo $id; ?>' onclick="return confirm('etes vous sure de vouloir annuler la commande?')">Annuler</a></td> --> 
                  </div>
               </div>
             </tr>
   <?php
          }
       }
   
if(isset($_POST['val'])){
  $code=$_POST['val'];
   echo $code;
    $sql="UPDATE orders set etat=1 where id=$code";
    $result=$connect->query($sql);
    if($result){
      $destination="$email";
      $sujet="Infos sur la commande";
      $message="bonjour Nous Vous informons que votre commande est bien pris en compte 
      un agent va prendre contact avec vous pour les details de la livraison merci pour la confiance";
      $headers="from:bayeserigneseck40@gmail.com";
      mail($destination,$sujet,$message,$headers);   
    

    }
  
}
if(isset($_POST['anul'])){
$code=$_POST['anul'];
$sql="UPDATE orders set etat=-1 where id=$code";
$result=$connect->query($sql);
if($result){
  $destination="$email";
  $sujet="Infos sur la commande";
  $message="Nous Vous informons que votre commande ne peut pas etre pris en charge pour le moment 
  pour des raisons qui vous sera communique ulterieurement merci pour la confiance ";
  $headers="from:bayeserigneseck40@gmail.com";
  mail($destination,$sujet,$message,$headers);   

}
}
?>
</body>
<?php
// include "footer.php";

?>
</html>