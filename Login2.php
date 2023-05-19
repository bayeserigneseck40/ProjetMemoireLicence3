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
  //  if (isset($_POST['nom']) && isset($_POST['prenom']) && 
  //  isset($_POST['login']) && isset($_POST['pwd'])
  //   && isset($_POST['email']) && 
  //   isset($_POST['adresse']) &&  isset($_POST['role']))
  //  {
     
  //      $nom=$_POST['nom'];
  //      $prenom=$_POST['prenom'];
  //      $login=$_POST['login'];
  //      $email=$_POST['email'];
  //      $password=$_POST['pwd'];
  //      $adresse=$_POST['adresse'];
  //      $role=$_POST['role'];
  //      $dhc=date('Y-m-d H:i:s');
  
  
  //      echo $nom,$prenom,$login,$adresse,$password,$email,$dhc;
  //        $req="INSERT INTO personnes(nom,prenom,adresse,email,login,password,role,date_ins)values('$nom','$prenom','$adresse','$email','$login','$password','$role','$dhc')";
  //        $stmt=$connect->query($req);
  //        if($stmt){
  //          echo "inscription reussi";
  //        }
  //         $id=$connect->lastInsertId();
  //         $_SESSION['id']=$id;
  //         $req2="select* from personnes where id_personne=$id";
  //         $resu=$connect->query($req2);
  //         while($row=$resu->fetch()){
  //         if($row['role']=="gerant"){
  //           $sql1="INSERT INTO gerants(num_gerant)VALUES($id)";
  //           $result1=$connect->query($sql1);
  //           if($result1){
  //             header("location:pharmacie.php");
  //           }
            
  //         }
  //       }
        //  $req="select* from personnes where id_personne=$id";
        //  $res=$connect->query($req);
        //  while($row=$res->fetch()){
        //    if($row['role']=='client'){
        //      $sql="INSERT INTO clients(num_client)VALUES($id)";
        //      $resul=$connect->query($sql);
        //    }
        //  }
  // }

  if(isset($_POST['username'])&&isset($_POST['mdp'])&&isset($_POST['cmdp'])){

    $username=$_POST['username'];
    $mdp=$_POST['mdp'];
    $cmdp=$_POST['cmdp'];
    
$sql="UPDATE personnes set password='$mdp' where login='$username'";
$result=$connect->query($sql);
if($result){
    header("location:login.php");
}

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Pharmacie en Ligne</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

    <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
  body{
    background-color:#18d26e;
  }
  h4{
    font-family:'Times New Roman', Times, serif;
  }
  label{
    font-family:'Times New Roman', Times, serif;
    font-size:20px;
  }
   div p{
    font-family:'Times New Roman', Times, serif;
    font-size:20px;
  }
  p a{
    font-family:'Times New Roman', Times, serif;
    font-size:20px;
  }
  </style> 
</head>

<body >
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="formValidate" id="formValidate" method="post" action="router.php" novalidate="novalidate" class="col s12">
        <div class="row">
          <div class="input-field col s12 center">
            <h4 style="color: SeaGreen;">Se connecter</h4>
             <p class="center">Rejoignez-nous maintenant!</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email  prefix"></i>
            <input name="username" id="username" type="text" required  data-error=".errorTxt1">
            <label for="username" class="center-align">Login</label>
      <div class="errorTxt1"></div>     
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="password" id="mdp" type="password" required  data-error=".errorTxt1">
            <label for="mdp" class="center-align"> mot de passe</label>
			<div class="errorTxt2"></div>			
          </div>
        </div>
        <!-- <P><div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="cmdp" id="cmdp" type="password" required data-error=".errorTxt2">
            <label for="nom" class="center-align">Confirmer mot de passe</label>
			<div class="errorTxt3"></div>			
          </div> -->
          <!-- <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi mdi-home "></i>
            <input name="sexe" id="role" type="radio" value="m" data-error=".errorTxt4">
            <label for="adres">Masculin</label>
		     	<div class="errorTxt4"></div>		
        </div></p>
         </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi mdi-home "></i>
            <input name="sexe" id="role" value="f" type="radio" data-error=".errorTxt4">
            <label for="adres">Feminin</label>
		     	<div class="errorTxt4"></div>			
          </div>
           </div> 
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person prefix"></i>
            <input name="login" id="login" type="text"  data-error=".errorTxt1">
            <label for="login" class="center-align">Login</label>
      <div class="errorTxt4"></div>     
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="pwd" id="password" type="password" data-error=".errorTxt3">
            <label for="password">Mot de passe</label>
			<div class="errorTxt3"></div>			
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi mdi-home "></i>
            <input name="adresse" id="adres" type="text" data-error=".errorTxt4">
            <label for="adres">Adresse</label>
			<div class="errorTxt4"></div>			
          </div>
          <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi mdi-home "></i>
            <input name="role" id="role" type="radio" value="gerant" data-error=".errorTxt4">
            <label for="adres">Gerant</label>
		     	<div class="errorTxt4"></div>			
          </div>
          <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi mdi-home "></i>
            <input name="role" id="role" value="client" type="radio" data-error=".errorTxt4">
            <label for="adres">Client</label>
		     	<div class="errorTxt4"></div>			
          </div>
        </div>		 -->
        <div class="row">
          <div class="input-field col s12">
			<a href="javascript:void(0);" onclick="document.getElementById('formValidate').submit();" class="btn waves-effect waves-light col s12">soumettre</a>
          </div>
          <div class="input-field col s12">
            <p class="margin medium-small"><a href="inscript.php">Inscrire Maintenant!</a>
            <p class="margin center medium-small sign-up">Vous avez déja un compte? <a href="inscription.php">mot de passe oublié</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
     <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
     
      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5
            },
            name: {
                required: true,
                minlength: 5				
            },
			password: {
				required: true,
				minlength: 5
			},
            phone: {
				required: true,
				minlength: 4
			},
        },
        messages: {
            username: {
                required: "Enter username",
                minlength: "Minimum 5 characters are required."
            },
            name: {
                required: "Enter name",
                minlength: "Minimum 5 characters are required."
            },
			mdp: {
				required: "Enter password",
				minlength: "Minimum 5 characters are required."
			},
            phone:{
				required: "Specify contact number.",
				minlength: "Minimum 4 characters are required."
			},		
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });


    </script>
</body>
</html>
<?php
?>