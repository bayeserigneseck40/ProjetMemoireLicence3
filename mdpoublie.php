<?php  
// session_start(); 
// if(isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid']))
// {
// 	header("location:index.php");
// }
// // else{
// include "searchgardeph.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Login</title>

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
   <!-- <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">  -->
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
<style>
  #submit{
   margin-left:25%;
   width:60%;
 
  }
  #login-page{
    width:80%;
  }
  #mdpoublie{
    border:0px solid black;
    margin:auto;
  }
</style>
</head>


<body class="green">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form method="post" action="Changemdp.php" class="login-form" id="form">
        <div class="row">
          <div class="input-field col s12 center">
            <p class="center login-form-text">Changer votre mot de passe</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="username" id="username" placeholder="Entrer votre login" type="text">
            <label for="username" class="center-align"></label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="mdp" id="mdp" placeholder="Entrer un mot de passe" type="password">
            <label for="password"></label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="cmdp" id="cmdp" placeholder="confirmer votre mot de passe" type="password">
            <label for="password"></label>
          </div>
        </div>
        <div class="row">
        <button type="submit" id="submit" class="btn btn-success">Envoyer</button>
          <!-- <input type="submit"  value="Login"> -->
			<!-- <a href="javascript:void(0);"  onclick="document.getElementById('form').submit();" class="btn waves-effect waves-light col s12">Login</a> -->
          </div>
		  		
        </div>

        <div id="conn" class="input-field col s12">
            <p class="margin center medium-small sign-up">Vous avez déja un compte? <a href="login.php">se connecter</a></p>
          </div>
      </form>
    </div>
  </div>
  <div id="h1"></div>


<script>
    var mdp=document.getElementById("mdp");
    var cmdp=document.getElementById("cmdp");
       cmdp.addEventListener("blur",function(){
           if(cmdp.value!=mdp.value){
               alert("les mots de passe ne correspondent pas!");
               cmdp.value="";
               mdp.value="";
           }
       })
</script>
 
</body>
</html>
<?php
?>