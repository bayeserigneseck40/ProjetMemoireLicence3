
<?php
session_start();
 include "menucli.php";
 include "connect_BD.php";
// include 'all_process_ajout_medi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <title>VENTES</title>
  <style>
       /* table{
       
          margin:auto;
       
      }
      th{
        border:1px solid black;
      }
      td{
        border:1px solid black;
       
      }
      #shadow{
        border:0px solid black;
        width:120%;
       
      
      }
      #sh{
        border:1px solid black;
        margin-top:6%;
        background-image: linear-gradient(-90deg, #1e596b, #54c283); 
        
      } */
      li{
        list-style:none;
        font-family:'Times New Roman', Times, serif
      }
      td p{
        font-family:'Times New Roman', Times, serif;
      }
      th p{
        font-family:'Times New Roman', Times, serif;
      }
     li a{
                 color: SeaGreen;
                 text-decoration:none;
     }

  </style>
  
</head>
<body  >
<center>
  <?php if (isset($_SESSION['message'])):?>
    <div class="message">
      <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']); 
      ?>
    </div>
  <?php endif ?>
  <div class="container">
       <!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h1 id="titre">Commandes en attente de validation  </h1></div> -->
         <table class="table table-striped">
           <thead>
             <tr>
               <th><p>Nom</p></th>
               <th><p>Mode de Payement</p></th>
               <th><p>Medicaments</p></th>
               <th><p>Email</p></th>
               <th><p>Adresse</p></th>
               <th><p>Montant total</p></th>
               <th><p>Supprimer<p></th>
              
             </tr>
           </thead>

  <?php
  $email=$_SESSION['email'];
 $sql="select *from orders where email='$email' and etat=1";
 $result=$connect->query($sql);
 if($result){
  while($row=$result->fetch()){
  ?>
 

		    <div class="form-group mt-3 mb-3" >
				

				<tr>	
					<!-- <td></td> -->
					<td><p><?php echo $row["name"]; ?></p></td>
					<td><p><?php echo $row["pmode"]; ?></p></td>
					<td><a href="detailsmedoc.php?codemedoc=<?php echo $row["id"]; ?>">
          <?php 
            $prods= explode(',',$row["products"]);
            echo"<ul>";
              foreach($prods as $prod){

             
                   $medocs=explode('(',$prod);
                   foreach($medocs as $medoc )
                   {               
                $sql="select * from medicaments where nom like '$medoc'";
                $res=$connect->query($sql);
                $ligne=$res->fetch();
                $code=$ligne['id_medicament'];
                echo "<li><a href='detailsCommande.php?code=$code'>$medoc</a></li>" ;
            echo"</ul>";

          }
          }

          ?></a></td>
					<td><p><?php echo $row["email"]; ?></p></td>
					<td><p><?php echo $row["address"]; ?></p></td>
					<td><p><?php echo $row["amount_paid"]; ?></p></td>
          <form method="post" action="">
            
            <td><button type="submit" name="supp" value="<?php echo $row['id'] ?>" onclick="return confirm('etes vous sure de vouloir valider la commande?')" class="btn btn-warning">Supprimer</button></td>
           
       </form>
					<!-- <td><a href="all_process_sup_commande.php?delete=<?php echo $row["id"]; ?>" class="del_btn">Supprimer</a></td> -->
				</tr>

		
		   
  <?php
  if (isset($_POST['supp'])) {
    $id = $_POST['supp'];
    $sql="DELETE FROM orders  WHERE id=$id";
    $result=$connect->query($sql);
    $_SESSION['message'] = " Données supprimées avec succès";
    //  header('location:historiques.php');
    }
}
 }

  ?>
</table>

</center>

<?php  
include "footer.php";
?>
</body>
</html>