
<?php
	session_start();
	require 'config.php';
	if(isset($_SESSION['ph'])){
		$id=$_SESSION['ph'];
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=
			, initial-scale=1.0">
			<title>Document</title>
			<style>
				strong{
					font-family:'Times New Roman', Times, serif;
					font-size:18px;
				}
			</style>
		</head>
		<body>
			
		</body>
		</html>
		<?php

	

	// Ajouter des produits dans le tableau du panier
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $connect->query("SELECT product_code FROM cart WHERE product_code='$pcode'");
	
	  $r = $stmt->fetch();
	  $code = $r['product_code'] ?? '';

	  $sql="select quantiteStock from stock where id_medicament=$pcode";
	  $result=$connect->query($sql);
	      if($ligne=$result->fetch()){

		
	   if($ligne['quantiteStock']>=$pqty){

	  
	  if (!$code) {
		  $sql="SELECT * from cart";
		  $result=$connect->query($sql);
		  if($result->rowCount()>0){
			  $ligne=$result->fetch();
			  $numero=$ligne['num_pharmacie'];
			  if($numero==$id){

		
	    $query = $connect->query("INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code,num_pharmacie) VALUES ('$pname','$pprice','$pimage','$pqty','$total_price','$pcode',$id)");
	   

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Article ajouté à votre panier!</strong>
						</div>';
					}
					else{
						echo '<div class="alert alert-danger alert-dismissible mt-2">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Vous ne pouvez pas commander dans deux pharmacies differentes il faut vider votre panier!</strong>
					  </div>';
					}
				
					}
					else{
						$query = $connect->query("INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code,num_pharmacie) VALUES ('$pname','$pprice','$pimage','$pqty','$total_price','$pcode',$id)");
	   

						echo '<div class="alert alert-success alert-dismissible mt-2">
										  <button type="button" class="close" data-dismiss="alert">&times;</button>
										  <strong>Article ajouté à votre panier!</strong>
										</div>';
					}
		 
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Article déjà ajouté à votre panier!</strong>
						</div>';
	  }
	}
	else {
		
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Cette quantite est indisponible pour le moment pour ce medicament!</strong>
						</div>';
	}
}
}
	// Obtenez le nombre d'articles disponibles dans le tableau du panier
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $connect->query('SELECT * FROM cart');
	
	  $rows = $stmt->fetch();


	
	}

	// Supprimer des articles individuels du panier
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $connect->query("DELETE FROM cart WHERE id='$id' ");
	

	  $_SESSION['showAlert'] = 'bloquer';
	  $_SESSION['message'] = 'Article retiré du panier!';
	  header('location:cart.php');
	}

	// Supprimer tous les articles à la fois du panier
	if (isset($_GET['clear'])) {
	  $stmt = $connect->query('DELETE FROM cart');
	//   $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Tous les articles supprimés du panier!';
	  header('location:cart.php');
	}

	// Définir le prix total du produit dans le tableau du panier
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;
	 $sql="UPDATE cart SET qty=$qty, total_price=$tprice WHERE id=$pid";
	  $stmt = $connect->query($sql);
	//   $stmt->bind_param('isi',$qty,$tprice,$pid);
	//   $stmt->execute();

	//   $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	//   $stmt->bind_param('isi',$qty,$tprice,$pid);
	//   $stmt->execute();
	}

	// Commander et enregistrer les informations client dans le tableau des commandes
	if (isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['email'])&& isset($_POST['products'])
	&& isset($_POST['grand_total'])&& isset($_POST['address'])&& isset($_POST['pmode'])) {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $pmode = $_POST['pmode'];
	  $phto = $_FILES['photo']['name'];
	  $etat=0;
	 

	//   $id=$_SESSION['ph'];

	  $data = '';
	  	  
         

	  $stmt = $connect->query("INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid,num_pharmacie,etat)VALUES('$name','$email','$phone','$address','$pmode','$products','$grand_total',$id,$etat)");
	  $code=$connect->lastInsertId();
	  $sql="select * from cart";
		  $res=$connect->query($sql);
		 
		  echo $code;
		  while($row=$res->fetch()){
			  $id=$row['product_code'];
			  $qty=$row['qty'];
			  echo $qty;
			  $sql1="UPDATE stock set quantiteStock=quantiteStock-$qty where id_medicament=$id ";
			  $result=$connect->query($sql1);
		  }
		  $cptphotos=count($_FILES['photo']['name']);
		  for($i=0;$i<$cptphotos;$i++){
		  $extensions_ok = array( 'jpg' , 'jpeg' , 'gif' , 'png','pdf' );
		
		  $extension_fichier = strtolower( substr(strrchr($_FILES['photo']['name'][$i], '.'),1));
		  if ( in_array($extension_fichier, $extensions_ok) )
			   {
				  echo "<p>Extension correcte du fichier</p>"; 
			   }
		
			 $dhc=date("dmy_his",time());
			 $fic="mesphotos/".$dhc."_".$_FILES['photo']['name'][$i];
			 $result=move_uploaded_file($_FILES['photo']['tmp_name'][$i],$fic);
			 if($result){
			 echo "<p>transfert du fichier reussi</p>";
			 }
		
			 $url="mesphotos/".$dhc."_".$_FILES['photo']['name'][$i];
			 echo $code;
		
			 $req1="INSERT INTO ordonnance(url,num_commande)VALUES('$url',$code)";
			 $stmt=$connect->query($req1);
			 if($stmt){
				 echo"insertion image reussi";

			 }
			 header("Location:checkout.php");
			}
				
	  $stmt2 = $connect->prepare('DELETE FROM cart');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Merci beaucoup!</h1>
								<h2 class="text-success">Votre commande passée avec succès!</h2>
								<h4 class="bg-danger text-light rounded p-2">Medicaments achetés : ' . $products . '</h4>
								<h4>votre nom : ' . $name . '</h4>
								<h4>Votre e-mail : ' . $email . '</h4>
								<h4>Ton téléphone : ' . $phone . '</h4>
								<h4>Montant total payé: ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;




}
}
?>