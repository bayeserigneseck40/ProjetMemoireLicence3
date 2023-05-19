<?php 
  // session_start();

?>
<!DOCTYPE html>  
<html>  
<head>  
<title>Feedback page</title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous"> 
<style>
  h1{
    
    font-family:'Times New Roman', Times, serif;
  }
  label {
    color: SeaGreen;
    font-family:'Times New Roman', Times, serif;
    font-size:20px;
  }
  td p{
    font-family:'Times New Roman', Times, serif;
    font-size:20px;
    color:white;
    background-color:SeaGreen;
    margin-left:100%;
    text-decoration:none;
  }
</style>
</head>
<body style="background-image: url(feedbacke.png);background-size:cover;"> 
<?php
  $id=$_SESSION['formC'];
  // $_SESSION['formT']=$id;
include "connect_BD.php";
include 'traiterControle.php';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    
    $result = $connect->query("SELECT * FROM panneau_tour WHERE id_panneau=$id");
    $ligne=$result->fetch();
    
    $id= $ligne['id_panneau'];
    $doctor = $ligne['Docteur'];
    $date_debut = $ligne['date_debut'];
    $date_fin=$ligne['date_fin'];
    $telephone = $ligne['telephone'];

  

   
    
  }
?>

<table>
  <tr>
  <?php


$req="SELECT* FROM pharmacies where num_gerant=$id";
$resul=$connect->query($req);
if($resul){
    if($row=$resul->fetch()){
		$id_ph=$row['num_pharmacie'];
		$sql="select * from panneau_tour where num_pharmacie=$id_ph";
		$res=$connect->query($sql);
		if($ligne=$res->fetch()){

	
     
  ?>
  <tr>
  <?php 
  // echo $i; 
  ?>

  <td ><a id="mdp" href="Accueil_ph.php?edit=<?php echo $ligne["id_panneau"]; ?>" onclick="return confirm('etes vous sure de vouloir modifier?');" class="edit_btn"><P>Modifier</P></a></td>
  </tr>
  <?php
  // $i++;
}	
}
}
  ?>
</table>
 <div class="container mt-4 shadow-lg">
   <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6"> 
        <h1 class="text-white" >Panneau de Tour de Garde</h1>
        <!-- <p class="text-white">We would love to hear your thoughts, concerns or problem with anything so we can improve!</p> -->
        <hr>
		<form method="post" action="traiterControle.php">
		    
		
		    <input type="hidden" name="id" class="form-control " placeholder="Entrer le nom du docteur" required="" value="<?php echo $id; ?>">
		    <div class="form-group mt-3 mb-3" >
		    	<label class="form-label">Pharmacien</label>
		    	<input type="text" name="doctor" class="form-control " placeholder="Entrer le nom du pharmacien" required="" value="<?php echo $doctor; ?>">
		  	</div>
		  	<div class="form-group mb-2">
		    	<label  class="form-label">Date debut</label>
		    	<input type="date" id="date_debut" name="date_debut" class="form-control" required="" value="<?php echo $date_debut; ?>">
		  	</div>
			  <div class="form-group mb-2">
		    	<label  class="form-label">Date fin</label>
		    	<input type="date" name="date_fin" id="date_fin" class="form-control" required="" value="<?php echo $date_fin; ?>">
		  	</div>
		    <div class="form-group mb-2">
		    	<label  class="form-label">Telephone:</label>
		    	<input type="tel" name="telephone" id="tel" class="form-control" placeholder="+221772400000" required="" value="<?php echo $telephone; ?>">
		  	</div>
			  <?php if ($edit_state == false): ?>
		  	<button type="submit" name="save" class="btn btn-success">Enregistrer</button>
			  <?php else: ?>
			  <button type="submit" name="update" class="btn btn-success">Changer</button>
			  <?php endif ?>
		</form>
      </div>
    </div>
  </div>
  <script>
    var date_debut=document.getElementById("date_debut");
    var date_fin=document.getElementById("date_fin");
    var tel=document.getElementById("tel");


         var n=date_debut.value;
         var p=date_fin.value;
         date_fin.addEventListener("blur",function(){
           if(date_debut.value>=date_fin.value){
             date_debut.value="";
             date_fin.value="";
           }
         },false);
         tel.addEventListener("blur",function(){
        
         })
    
    var phone=document.getElementById("tel");
    var phoneno = /^\+?([0-9]{3})\)?[]?([0-9]{9})$/;
    phone.addEventListener("blur",function(){

  
  if(phone.value.match(phoneno)) {
    return true;
  }  
  else {  
    alert("VOTRE NUMERO EST INCORRECT");
    phone.value="";
    return false;
  }
},false);
  </script>

 </body>  
</html>

