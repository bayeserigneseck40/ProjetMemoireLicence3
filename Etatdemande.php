<?php
//require_once('Accueil_Admin.php');
include 'MenuAdmin.php';
include "connect_BD.php";

if(isset($_POST['acept'])){

     
    $b=$_POST['acept'];
    $req4="UPDATE  personnes SET Etat_Demande='Acceptee'  WHERE id_personne=:cod";
    $stmt=$connect->prepare($req4);
    $stmt->bindParam(':cod',$b,PDO::PARAM_INT);
    $stmt->execute();
    if($stmt){
    }
  }
  if(isset($_POST['refu'])){

     
    $b=$_POST['refu'];
    $req4="UPDATE  personnes SET Etat_Demande='Attente'  WHERE id_personne=:cod";
    $stmt=$connect->prepare($req4);
    $stmt->bindParam(':cod',$b,PDO::PARAM_INT);
    $stmt->execute();
    if($stmt){
    }
  }

  if(isset($_POST['sup'])){ 
  $b=$_POST['sup'];
  $req4="DELETE FROM  gerants  WHERE num_gerant=:cod";
  $stmt=$connect->prepare($req4);
  $stmt->bindParam(':cod',$b,PDO::PARAM_INT);
  $stmt->execute();
  if($stmt){
    $req4="DELETE FROM  personnes  WHERE id_personne=:cod";
    $stmt=$connect->prepare($req4);
    $stmt->bindParam(':cod',$b,PDO::PARAM_INT);
    $stmt->execute();
    if($stmt){
    }

  }
 
 

 
   } 
 


?>
<!DOCTYPE html>
<html>
<head>
    <style>
       div h1{
            text-align:center;
            font-style:italic;
            font-weight:bold;
            font-family:'Times New Roman', Times, serif;
        }
        #admin{
          margin-top:8%;
        }
        #foot{
          margin-top:30%;
        }
        td p{
            font-size:18px;
            font-family:'Times New Roman', Times, serif;
          
        }   
        h1 span{
          font-family:'Times New Roman', Times, serif;
        }
        th p{
            font-size:15px;
            font-weight:bold;
        }
        body{
          background-image:url("drug2.jpg");
          background-repeat:no-repeat;
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
</head>
<body >
  <div id="admin">
<div class="container">
<div class="shadow-lg p-3 mb-5 bg-white rounded"> <h1  style="color: SeaGreen;">Liste des Gerants de pharmacies</h1></div>
  <table class="table table-bordered white" >
     <thead>
      <tr>
        <th><p>Prenom</p></th>
        <th><p>Nom</p></th>
        <th><p>Adresse</p></th>
        <th><p>Email</p></th>
        <th><p>Role</p></th>
        <th><p>Date inscription</p>
        <th><p>suppression</p></th>
        <th><p>Validation</p></th>
      </tr>
    </thead>
    <?php
    $connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
    $sql="SELECT * FROM personnes where role='gerant' Order by date_ins desc";
    $result=$connect->query($sql);
    if($result){
        while($row=$result->fetch()){
          $numero=$row['id_personne'];
            $prenom=$row['prenom'];
            $nom=$row['nom'];
            $adresse=$row['adresse'];
            $email=$row['email'];
            $role=$row['role'];
            $date=$row['date_ins'];
            $edit_state=$row['Etat_Demande'];


            echo"<tr class='table-primary'>";
            echo"<td><p>$prenom</p></td>";
           echo"<td><p>$nom</p></td>";
           echo" <td><p>$adresse</p></td>";
           echo"<td><p>$email</p></td>";
           echo"<td><p>$role</p></td>";
           echo" <td><p>$date</p></td>";
        //    echo"<td><p>$Etat</p></td>";
       
      
           ?>
           <form method="post" hidden action=""> 
           <td><button type="submit" name="sup" value="<?php echo $numero; ?>" onclick="return confirm(' ETES VOUS SURE DE VOULOIR SUPPRIMER ?')" class="btn btn-warning"><p>Supprimer</p></button></td>         
           <?php if ($edit_state == 'Attente'): ?>
           <td><button type="submit" name="acept" value="<?php echo $numero; ?>" onclick="return confirm('ETES VOUS SURE DE VOULOIR VALIDER ?')" class="btn btn-success"><p>Valider</p></button></td>         
           <?php else: ?>
            <td><button type="submit" name="refu" value="<?php echo $numero; ?>" onclick="return confirm('ETES VOUS SURE DE VOULOIR BLOQUER ?')" class="btn btn-danger"><p>Bloquer</p></button></td>         
            <?php endif ?>

        </form> 
        <?php
      

 
        //    echo"<div class='container'>";
        //    echo"<td> <a href='supUser.php?code=$numero'>
        //    <span class='glyphicon glyphicon-remove'></span>
        //     </a></td>";
        //     echo"<td> <a href='modifier.php?code=$numero'>
        //     <span class='glyphicon glyphicon-pencil'></span>
        //      </a></td>";
        //    echo" </div>";
        //   echo"</tr>"; 

        }
    }

?>
 
    </tbody>
  </table>
</div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
