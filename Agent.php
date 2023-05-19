<?php

include 'all_process.php';
include "menuph.php";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    
    $result = $connect->query("SELECT * FROM personnes WHERE id_personne=$id");
    $ligne=$result->fetch();
    
    
    $nom = $ligne['nom'];
    $prenom = $ligne['prenom'];
    $adresse=$ligne['adresse'];
    $email = $ligne['email'];
    $login = $ligne['login'];

   
    
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <title>Crud Operation In PHP</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body{
      /* background-image:url("medicine.jpg"); */
      /* background-image:url("doctor-at.jpg"); */
      background-image: linear-gradient(-90deg, #18d26e, #54c283); 
    }
    img{
      width:80%;
    }
    #tabAgent{
      margin-top:5%;
    }
      #vent{
      text-align:center;
            font-style:italic;
            font-family:Georgia;
            opacity:1.5;
            text-shadow : 3px 2px 5px silver;
            border:0px solid black;
            background-color:white;
            width:90%;
            margin-top:8%;
            border-radius:10px 20px 10px 20px ;
            
    }  
    td p{
      font-family:'Times New Roman', Times, serif
    }
    h1{
      font-family:'Times New Roman', Times, serif
    }
    th p{
      font-family:'Times New Roman', Times, serif
    }
    th{
      border:1px solid black;
    }
   
  
  </style>
</head>
<body>
<center>
 
<div id="tabAgent">
<h1 id="vent" style="color: SeaGreen;">Vos Agents</h1>

<table>
  <tr>
    <th><p>Nom</p></th>
    <th><p>Prenom</p></th>
    <th><p>Address</p></th>
    <th><p>Email</p></th>
    <th><p>Login</p></th>
    <th><p>Modifier</p></th>
    <th><p>Supprimer</p></th>
  </tr>
  <?php
  $id_pharmacie=$_SESSION['num_pharmacie'];
$req="SELECT* FROM personnes join agents on personnes.id_personne=agents.id_agent where role='Agent' and id_pharmacie=$id_pharmacie order by nom ";
$resul=$connect->query($req);
if($resul){
    while($row=$resul->fetch()){
     
  ?>
  <tr>
  <?php 
  // echo $i; 
  ?>
  <!-- <td></td> -->
  <td><p><?php echo $row["nom"]; ?></p></td>
  <td><p><?php echo $row["prenom"]; ?></p></td>
  <td><p><?php echo $row["adresse"]; ?></p></td>
  <td><p><?php echo $row["email"]; ?></P></td>
  <td><p><?php echo $row["login"]; ?></p></td>
   <td ><a id="mdp" href="Agent.php?edit=<?php echo $row["id_personne"]; ?>" onclick="return confirm('etes vous sure de vouloir modifier?');" class="edit_btn">Modifier</a></td>
  <td ><a href="all_process.php?delete=<?php echo $row["id_personne"]; ?>" onclick="return confirm('etes vous sure de vouloir supprimer?');" class="del_btn">Supprimer</a></td>
  </tr>
  <?php
  // $i++;
}
}
  ?>
</table>
</div>
<?php if (isset($_SESSION['message'])):?>
    <div class="message">
      <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']); 
      ?>
    </div>
  <?php endif ?>
   <form id='fag' class="form-inline" method="POST" action="all_process.php">
     <input type="hidden" name="id" value="<?php echo $id; ?>">
     <input type="text" name="nom" required placeholder="Entrer le nom" value="<?php echo $nom; ?>">
     <input type="text" name="prenom" placeholder="Entrer votre prenom" value="<?php echo $prenom; ?>">
     <input type="text" name="adresse" placeholder="Entrer L'addresse" value="<?php echo $adresse; ?>">
     <input type="text" name="login" placeholder="Entrer login" value="<?php echo $login; ?>">
     <input type="text" name="email" placeholder="Entrer l'email" value="<?php echo $email; ?>">
     <input type="hidden" name="password" id="code" placeholder="Entrer le password" value="">
     <input type="hidden" name="role" placeholder="Entrer l'email" value="Agent">
  <?php if ($edit_state == false): ?>
  <button class="btn" id="btn1" type="submit" name="save" >Enregistrer</button>
<?php else: ?>
  <button class="btn" type="submit" name="update" >Changer</button>
<?php endif ?>
     
   </form>
</center>
<?php 
include "footer.php";
?>

</body>
<script>

function makeid(){
    var text="";
    var possible="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890#@&$";
    for(var i=0;i<7;i++){
        text+=possible.charAt(Math.floor(Math.random()*possible.length));
    }
    return text;
}
var cod=document.getElementById('code');
var fag=document.getElementById('fag');
fag.addEventListener("submit",function(e){
  alert('Debut envoi');
    cod.value=makeid();
    alert('Fin envoi');
   
    
},false)

var cod=document.getElementById('code');
var mdp=document.getElementById('mdp');
mdp.addEventListener("click",function(){
  cod.style.visibility="hidden";
},false);

// var elt=document.getElementsByTagName("a");
// var n=elt.length;
// var i=0;
// for(i=0;i<n;i++){
//   elt[i].addEventListener('click',function(){
//     Swal.fire({
//   position: 'top-end',
//   icon: 'success',
//   title: 'Your work has been saved',
//   showConfirmButton: false,
//   timer: 3000
// })

 
// })
var btn=document.getElementById("btn1");
btn.addEventListener("click",function(){
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title:'Donner Enregistrer avec Succes',
  showConfirmButton: false,
  timer: 1500
});


},false);


</script>
</html>