
 <?php 
 session_start();
   include 'menuph.php';   
  ?> 
<!DOCTYPE html>
<html>
<head>
    <style>
         h1{  
            text-align:center;
            font-style:italic;
            font-family:Georgia;
            opacity:1.5;
            text-shadow : 3px 2px 5px silver
          
        }
         #titre{
          border:0px solid black;
           margin-top:7%;
           background-color:white;
           height:60px;
           width:90%;
           margin-left:5%;
           border-radius:20px 10px 20px 10px;
         
         

        } 
        #contenu{
          border:1px solid white;
            width:60%;
             margin-left:38%; 
             margin-top: -32.5%; 
             background-color:white;
             border-left-width:80px;

       
        } 
        td a{
          text-decoration:none;
          color:black;
        }
         #cont{
          margin-top:6%;
        } 
         #form{
          margin-left:10%;
          /* margin-top:80%; */
        } 
        #blok{
          border:1px solid black;
          padding-top:-20%;
        }
        td p{
          font-size:15px;
          font-family:'Times New Roman', Times, serif
        }
        strong{
          font-size:20px;
          font-family:'Times New Roman', Times, serif;
        }
        th p{
          font-size:15px;
          font-style:italic;
          font-family:'Times New Roman', Times, serif
        }
      #alt{
        border:1px solid blue;
        margin-top:-30%;
      }
    </style>
<title>Cours Complet Bootstrap 4</title>
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
<script src="jquery-3.6.0.min.js"></script>
</head>
<body 	style="background-image: linear-gradient(-90deg, #18d26e, #54c283);" >
<?php
$id_pharmacie=$_SESSION['num_pharmacie'];
include 'connect_BD.php';
 if(isset($_POST['medicament'])&&isset($_POST['qte'])&&isset($_POST['prixU'])&&isset($_POST['prixT'])){
  $medicament=$_POST['medicament'];
  $quantite=$_POST['qte'];
  $prix=$_POST['prixU'];
  $prixT=$_POST['prixT'];

  // $prixU=$_POST['prixU'];
  $dhc=date('Y-m-d');
  // echo $medicament,$quantite,$prix,$prixT;

  // $sql1="select prix from medicaments where id_medicament=$medicament";
  // $res=$connect->query($sql1);
  // if($res){
  //   while($row=$res->fetch()){
  //     $prixU=$row['prix'];
  //   }
  // }
  
$sql2="SELECT quantiteStock from medicaments Natural join stock where id_medicament=$medicament";
$resul=$connect->query($sql2);
if($resul){
  while($row=$resul->fetch()){
    $qte=$row['quantiteStock'];
  }
  if($quantite<=$qte){
    $sql="INSERT INTO ventes(date_vente,Quantite,prixU,id_medicament,prixT,num_pharmacie)VALUES('$dhc',$quantite,$prix,$medicament,$prixT,$id_pharmacie)";
  $result=$connect->query($sql);
  if($result){
    $reste=$qte-$quantite;

    $sql3="UPDATE stock set quantiteStock=$reste where id_medicament=$medicament";
    $resu=$connect->query($sql3);
    if($resu){
//       echo '<div class="alert alert-danger alert-dismissible mt-2" id="alt">
//   <button type="button" class="close" data-dismiss="alert">&times;</button>
//   <strong>Vente Enrgistrée avec succes!</strong>
// </div>';
    }
    
  }
  // else{
    
  // }


  }
}
  
 }




 ?>

 <!-- <div id="titre">
        <h1>Liste des Ventes</h1>
 </div> -->
      
    <?php
     include 'formvente.php';
     ?>
    
  <div id="contenu">  
<div class="container">

  <table class="table table-striped">
    <thead>
      <tr>
        <th><p>Numero Vente</p></th>
        <th><p>Date</p></th>
        <th><p>Medicaments</p></th>
        <th><p>Quantite</p></th>
        <th><p>PrixU</p></th>
        <!-- <th>Prix total</th> -->
        <th><p>Supprimer</p></th>
      </tr>
    </thead>
    <?php
    $connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
    $sql="SELECT * FROM ventes join medicaments on ventes.id_medicament=medicaments.id_medicament  where ventes.num_pharmacie=$id_pharmacie order by date_vente DESC";
    $result=$connect->query($sql);
    if($result){
        while($row=$result->fetch()){
          $code=$row['id_medicament'];
            $id_vente=$row['id_vente'];
            $date=$row['date_vente'];
            $medic=$row['nom'];
            $quantite=$row['Quantite'];
            $prixU=$row['prixU'];
         

            echo"<tr class='table-primary'>";
            echo"<td><p>$id_vente</p></td>";
           echo"<td><p>$date</p></td>";
           echo" <td><a href='detailsCommandePh.php?code=$code'><p>$medic</p></a></td>";
           echo"<td><p>$quantite</p></td>";
           echo"<td><p>$prixU</p></td>";
           echo"<div class='container'>";
           ?>
            <form method="post" hidden action=""> 
           <td><button type="submit" name="sup" value="<?php echo $id_vente; ?>" onclick="return confirm('etes vous sure de vouloir valider la commande?')" class="btn btn-warning">Supprimer</button></td>         
            </form> 
           <!-- echo"<td> <a href='supVente.php?code=$id_vente' onclick='return confirm('etes vous sure de vouloir supprimer cette vente?');'>
           <span class='glyphicon glyphicon-remove'></span>
            </a>";
           echo" </div>"; -->
           <?php
          echo"</tr>";

        }
    }
    echo "  </table>";
    if(isset($_POST['sup'])){
      $id_vente=$_POST['sup'];
      
  $req4="DELETE FROM  ventes  WHERE id_vente=:cod";
  $stmt=$connect->prepare($req4);
  $stmt->bindParam(':cod',$id_vente,PDO::PARAM_INT);
  $stmt->execute();
  echo '<div class="alert alert-danger alert-dismissible mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Médicament supprimer sur la liste des ventes!</strong>
</div>';
}
  // header('location:vente.php');

 
  

?>
</div>
<?php
if(isset($_GET['pr'])){
}


?>
<script>
       var q=document.getElementById('qte');
   q.addEventListener('change',function(){
    var prix=document.getElementById('prixU').value;
    var prT=document.getElementById('prixT');
    var quant=document.getElementById('qte').value;
  prT.value=prix*quant;
   },false);
 

</script>

 
    </tbody>

</div>

</body>
</html>
