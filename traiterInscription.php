<?php



session_start(); 
// if(isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid']))
// {
// 	header("location:index.php");
// }
// else{
  $connect=new PDO("mysql:host=localhost;port=3306;dbname=pharmacieenligne","baye","seck");
  if($connect){
  }
   if (isset($_POST['nom']) && isset($_POST['prenom']) && 
   isset($_POST['login']) && isset($_POST['pwd'])
    && isset($_POST['email']) && 
    isset($_POST['adresse']) &&  isset($_POST['role']) && isset($_POST['sexe']))
   {
     
       $nom=$_POST['nom'];
       $prenom=$_POST['prenom'];
       $login=$_POST['login'];
       $email=$_POST['email'];
       $password=$_POST['pwd'];
       $adresse=$_POST['adresse'];
       $role=$_POST['role'];
       $sexe=$_POST['sexe'];
       $dhc=date('Y-m-d H:i:s');
  
  
       echo $nom,$prenom,$login,$adresse,$password,$email,$dhc,$sexe;
         $req="INSERT INTO personnes(nom,prenom,adresse,email,login,password,role,date_ins,sexe)values('$nom','$prenom','$adresse','$email','$login','$password','$role','$dhc','$sexe')";
         $stmt=$connect->query($req);
         if($stmt){
           echo "inscription reussi";
         }
          $id=$connect->lastInsertId();
          $_SESSION['id']=$id;
          $req2="select* from personnes where id_personne=$id";
          $resu=$connect->query($req2);
          while($row=$resu->fetch()){
          if($row['role']=="gerant"){
            $sql1="INSERT INTO gerants(num_gerant)VALUES($id)";
            $result1=$connect->query($sql1);
            if($result1){
              header("location:pharmacie.php");
            }
            
          }
        }
        //  $req="select* from personnes where id_personne=$id";
        //  $res=$connect->query($req);
        //  while($row=$res->fetch()){
        //    if($row['role']=='client'){
        //      $sql="INSERT INTO clients(num_client)VALUES($id)";
        //      $resul=$connect->query($sql);
        //    }
        //  }
  }

?>