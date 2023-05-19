<?php
//require_once('Accueil_Admin.php');
include 'MenuAdmin.php';

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
            font-family:'Times New Roman', Times, serif
          
        }
        h1 span{
          font-family:'Times New Roman', Times, serif;
        }
        th p{
            font-size:15px;
            font-weight:bold;
            font-style:italic;
      
        }
        th{
          border:1px solid black;
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
<body>
  <div id="admin">
<div class="container">
<div class="shadow-lg p-3 mb-5 bg-white rounded"> <h1  style="color: SeaGreen;">Liste des Clients et Agents de pharmacies</h1></div>

  <!-- <table class="table"> -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th><p>Prenom</P></th>
        <th><p>Nom</P></th>
        <th><p>Adresse</P></th>
        <th><p>Email</P></th>
        <th><p>Role</P></th>
        <th><p>Date inscription</P></th>
        <th><P>supprimer</p></th>
      </tr>
    </thead>
    <?php
    $connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
    $sql="SELECT * FROM personnes where role='client' || role='agent' Order by role and Etat_Demande";
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
            $Etat=$row['Etat_Demande'];


            echo"<tr class='table-primary'>";
            echo"<td><p>$prenom</P></td>";
           echo"<td><p>$nom</p></td>";
           echo" <td><p>$adresse</p></td>";
           echo"<td><p>$email</p></td>";
           echo"<td><p>$role</p></td>";
           echo" <td><p>$date</p></td>";
           ?>
           
           <form method="post" hidden action=""> 
           <td><button type="submit" name="sup" value="<?php echo $numero; ?>" onclick="return confirm('etes vous sure de vouloir supprimer?')" class="btn btn-warning"><p>Supprimer</P></button></td>         
            </form> 
           <?php
           
          //  echo"<div class='container'>";
          //  echo"<td> <a href='supUser.php?code=$numero'>
          //  <span class='glyphicon glyphicon-remove'></span>
          //   </a></td>";
           
          //  echo" </div>";
          echo"</tr>";

        }
    }
    
  if(isset($_POST['sup'])){ 
    $b=$_POST['sup'];
    $req4="DELETE FROM  personnes  WHERE id_personne=:cod";
    $stmt=$connect->prepare($req4);
    $stmt->bindParam(':cod',$b,PDO::PARAM_INT);
    $stmt->execute();
  }

?>
 
    </tbody>
  </table>
</div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
