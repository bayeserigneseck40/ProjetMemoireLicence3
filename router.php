<?php
session_start();
// //include '../includes/connect.php';
$success=false;
$username = $_POST['username'];
$password = $_POST['password'];
 $connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");

  $sql=("SELECT * FROM personnes WHERE login='$username' AND password='$password'  AND role='Administrateur'");
  $result=$connect->query($sql);
    while($row = $result->fetch())
 {
 	$success = true;
	$user_id = $row['id_personne'];
	$name = $row['nom'];
 	$role= $row['role'];
 }
 if($success == true)
 {	
	
	$_SESSION['admin_sid']=session_id();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['role'] = $role;
	$_SESSION['name'] = $name;
 	header("location:Accueil_Admin.php");
 }
 else
 { 	$req= ("SELECT * FROM personnes  join pharmacies on personnes.id_personne=pharmacies.num_gerant WHERE login='$username' AND password='$password' AND role Like'%gerant%'");
 	$result=$connect->query($req);
     while($row = $result->fetch())
 	{
 	$success = true;
 	$user_id = $row['id_personne'];
 	$name = $row['nom'];
 	$role= $row['role'];
	$num_pharmacie=$row['num_pharmacie'];	
	}
	if($success == true)
 	{
		
 		$_SESSION['customer_sid']=session_id();
 		$_SESSION['user_id'] = $user_id;
 		$_SESSION['role'] = $role;
 		$_SESSION['name'] = $name;
		$_SESSION['num_pharmacie']=$num_pharmacie;		
			
 		header("location:Accueil_ph.php");
}
else
 { 	$req= ("SELECT * FROM personnes join agents on personnes.id_personne=agents.id_agent  WHERE login='$username' AND password='$password' AND role Like'%agent%'");
 	$result=$connect->query($req);
     while($row = $result->fetch())
 	{
 	$success = true;
 	$user_id = $row['id_personne'];
 	$name = $row['nom'];
 	$role= $row['role'];
	$num_pharmacie=$row['id_pharmacie'];	
	}
	if($success == true)
 	{
		
 		$_SESSION['customer_sid']=session_id();
 		$_SESSION['user_agent'] = $user_id;
 		$_SESSION['role'] = $role;
 		$_SESSION['name'] = $name;
		$_SESSION['num_pharmacie']=$num_pharmacie;		
			
 		header("location:Accueil_Agent.php");
}
 	else
 	{
		$req= ("SELECT * FROM personnes WHERE login='$username' AND password='$password' AND role Like'%client%'");
		$result=$connect->query($req);
		while($row = $result->fetch())
		{
		$success = true;
		$user_id = $row['id_personne'];
		$name = $row['nom'];
		$role= $row['role'];
		$email=$row['email'];
		
	   }
	   if($success == true)
		{
		   
			$_SESSION['customer_sid']=session_id();
			$_SESSION['user_cli'] = $user_id;
			$_SESSION['role'] = $role;
			$_SESSION['name'] = $name;
			$_SESSION['email'] = $email;
					
			header("location:Accueil_cli.php");
   }
   
   else{
	   header("location:login2.php");
   }
}
 }
}
?>