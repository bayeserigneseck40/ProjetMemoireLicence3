<!DOCTYPE html>
<html lang="en">

<head>
 	<title>inscription form</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">	
	<!-- <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">	 -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="Style3.css">
	<style>
		#email{
			margin-left:17%;
		}
		#sexe{
			margin-left:20%;

		}
		#sub{
			margin-left: 15%;
		}
		body{
			background-image: linear-gradient(-90deg,#18d26e, #54c283); 
		}
		h1{
			font-family:'Times New Roman', Times, serif;
		}
		p{
			font-family:'Times New Roman', Times, serif;
		}
		#conn{
			border:0px solid black;
			width:30%;
			margin-left:50%;
		}
		#contenu{
			background-color:white;
			width:70%;
		}
		#text{
			border:1px solid black;
		}
		#texte{
			border:1px solid black;
		}
		label{
			font-family:'Times New Roman', Times, serif;
		}

	</style>

</head>

<body >	



<div class="container  mt-4 shadow-lg" id="contenu">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<h1 class="text-center mt-5 font-weight-bold" style="color: SeaGreen;">Rejoignez-nous maintenant!</h1>
			<hr class="bg-white">
			<!-- <h6 class="text-center">Please write your feedback below:</h6>
			<h3 class="mt-4">How do you rate your overall experience?</h3> -->

			<form method="post" action="traiterInscription.php">
				<label class="radio-inline"><input type="radio"  checked name="role" value="client">Client</label>
				<label class="radio-inline"><input type="radio" name="role" value="gerant">Gerant</label>
				<!-- <label class="radio-inline"><input type="radio" name="experience" value="bad">Good</label> -->

			</div>
			</div>		
			
			<div class="row">
				<div class="col-md-2"></div>
				<label class="col-md-4">Nom<br>
					<input type="text" id="text" name="nom" required="" placeholder="Entrer votre nom"></label>
					<label class="col-md-4">Prenom*<br>

						<input type="text" id="text" required="" name="prenom" placeholder="Entrer votre Prenom"></label>

					 <label id="email"  class="col-md-4">Email*<br>
					  <input type="text" id="text" required="" name="email" placeholder="Entrer votre email"></label>
			</div>

			<div class="row">
				<div class="col-md-2"></div>
				<label class="col-md-4">Login<br>
					<input type="mail" id="text" required="" name="login" placeholder="Entrer votre Login"></label>

					<label class="col-md-4">Mot de passe<br>
					<input type="password" name="pwd" id="text" required="" placeholder="Entrer votre mot de passe"></label>
			</div>

			<div class="row">
				<div class="col-md-2"></div>
				<label class="col-md-8">Adresse<br>
					<input type="text"  name="adresse" id="text" required=""  placeholder="Entrer votre Adresse"></label>
			</div>
			
			<div class="row">
				<div class="col-md-2"></div>
				<div id="sexe" class="col-md-8">
					<label class="radio-inline"><input type="radio" name="sexe" checked value="masculin">Masculin</label>
				<label class="radio-inline"><input type="radio" name="sexe" value="feminin">Feminin</label>
					
			</div>
		</div>

						<div class="row" >
				<div class="col-md-2"  id="sub">
				<button class="btn btn-success" type="submit" style="width: 200%; position: absolute; margin-left: 2%;">Soumettre</button>
			</div>
		</div>
		
			</form>
			<div id="conn" class="input-field col s12">
    <p class="margin center medium-small sign-up">Vous avez déja un compte?<a href="login2.php">se connecter</a></p>
          </div>
		  </div>
</div>

</body>
<script>
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
			mdp: {
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
</html>  